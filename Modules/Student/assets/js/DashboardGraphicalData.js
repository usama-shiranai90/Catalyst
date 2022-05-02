// Mock Data Set.
/*
const colors = ['#016ADD', '#0183FB', '#4DBFFE']
ploArray = [24, 55, 99.9, 52, 72, 57, 0, 0, 0, 18, 51, 38]; // fetch from server.
let semesterResultArray = [2.35, 3.52, 3.8, 3.9, 3.4];  // fetch from server
*/

const colors = ['#016ADD', '#0183FB', '#4DBFFE', '#FF0000', '#02DFDE', '#acc426'];
let semesterResultArray = ploArray = [];

const registerCourseSection = document.getElementById('registerCourseDivID');
const courseCLOTable = document.getElementById('courseTableID');
// const selectedCourseCLOTableBody = document.getElementById('courseTableBodyID');

$(document).ready(function () {

    loadStudentGraphs()
    setRegisterCoursesDashboard();

    let clickedIndex = 0;
    $(document).on('click', "img[data-reg-course='ico']", function (event) {
        event.stopPropagation();
        clickedIndex = parseInt($(event.target).closest('.student-profile-header-text').attr("id").match(/\d+/)[0]); //  daregcor-2-> 2 , ID ma sa integer.
        $(this).attr("src", "../../Assets/Images/bottom-arrow.svg");

        // console.log($(event.target).closest('.student-profile-header-text'), clickedIndex)
        $("tbody[id^='courseTableBodyID']").each(function (index, node) {
            const bodyID = parseInt($(node).attr("id").match(/\d+/)[0]);
            const courseDivID = document.getElementById("daregcor-" + bodyID);
            if (bodyID === clickedIndex) {
                $(courseDivID).removeClass().addClass("sm:px-6 sm:w-auto sm:justify-center cursor-pointer inline-flex justify-center items-center py-5 w-1/2 rounded-t border-b-2 border-indigo-500 text-black tracking-wide leading-none student-profile-header-text my-0 font-medium text-base")
                if ($(node).hasClass("hidden"))
                    $(node).toggle("hidden").animate({'background-color': 'green'}, "slow");
            } else {
                $(node).attr("class", "").addClass("hidden").removeAttr("style")
                $(courseDivID).removeClass().addClass("sm:px-6 sm:w-auto sm:justify-center cursor-pointer inline-flex justify-center items-center py-3 w-1/2 rounded-t border-b-2 text-gray-400 tracking-normal leading-none student-profile-header-text my-0 transform transition ease-out duration-300 hover:scale-100 hover:-translate-y-0 hover:translate-x-0 hover:text-black hover:font-normal hover:border-black font-medium text-base")
                $(courseDivID).children(":first-child").children(":last-child").attr("src", "../../Assets/Images/left-arrow.svg");
            }
        });
    });
});


function loadStudentGraphs() {

    // Student Radial Bar Chart For Accumulated CGPA.
    if (hasPreviousGPA) {
        let radialChart = new ApexCharts(document.querySelector("#studentCGPA_ProgressCircle"), createCgpRadialChartStructure(CumulativeGradePointAverageObject.CGPA));
        radialChart.render();
    } else
        new ApexCharts(document.querySelector("#studentCGPA_ProgressCircle"), createCgpRadialChartStructure(0)).render();


    // Student Semester Wise GPA Line Bar Chart.
    if (studentSemesterGpaArray !== null) {
        new ApexCharts(document.querySelector("#studentCurrenGPAProgress"), createSemesterGpaLineChartStructure(studentSemesterGpaArray)).render();
    } else
        new ApexCharts(document.querySelector("#studentCurrenGPAProgress"), createSemesterGpaLineChartStructure([])).render();


    // PLO Chart.
    if (programLearningOutcomeList !== null)
        new ApexCharts(document.querySelector("#studentCurrentPLOProgress"), createOverallPLOLinearChartStructure(programLearningOutcomeList)).render();
    else
        new ApexCharts(document.querySelector("#studentCurrentPLOProgress"), createOverallPLOLinearChartStructure([])).render();
}


/** TABLE: Registered Course along with Respective CLO's. */
function setRegisterCoursesDashboard() {
    if (courseWithCLOArray != null) {
        let $withH = `sm:px-6 sm:w-auto sm:justify-center cursor-pointer inline-flex justify-center items-center py-3 w-1/2
                      rounded-t border-b-2 border-indigo-500 text-black tracking-wide leading-none student-profile-header-text my-0 font-medium text-base`;
        let withoutH = `sm:px-6 sm:w-auto sm:justify-center cursor-pointer inline-flex justify-center items-center py-3 w-1/2
                        rounded-t border-b-2 text-gray-400 tracking-normal leading-none student-profile-header-text my-0 transform transition ease-out duration-300
                        hover:scale-100 hover:-translate-y-0 hover:translate-x-0 hover:text-black hover:font-normal hover:border-black font-medium text-base`;
        for (let i = 0; i < courseWithCLOArray.length; i++) {
            let courseDiv = '';
            if (i !== 0) {
                courseDiv = `<div class="${withoutH}" id="daregcor-${(i + 1)}">
                                    <div class="flex flex-row justify-around items-center min-w-full">
                                        <label class="px-5">${courseWithCLOArray[i].courseName}</label>
                                        <img class="w-5" alt="" src="../../Assets/Images/bottom-arrow.svg" data-reg-course="ico">
                                    </div>
                                </div>`
            } else {
                courseDiv = `<div class="${$withH}"  id="daregcor-${(i + 1)}"> 
                                    <div class="flex flex-row justify-around items-center min-w-full">
                                        <label class="px-5">${courseWithCLOArray[i].courseName}</label>
                                        <img class="w-5" alt="" src="../../Assets/Images/left-arrow.svg" data-reg-course="ico">
                                    </div>
                                </div>`
            }
            $(registerCourseSection).append(courseDiv);
            setOutcomeDescription(i)
        }
    }
}

function setOutcomeDescription(index) {
    let tableBody = document.createElement("tbody");
    tableBody.setAttribute("id", "courseTableBodyID-" + (index + 1))

    if ((index) !== 0) {
        tableBody.setAttribute("class", "hidden");
    }

    for (let i = 0; i < courseWithCLOArray[index].CourseCLOList.length; i++) {
        const outcomeRow = `<tr class="text-center text-sm font-base tracking-tight">
                                    <td class="px-4 py-3">${courseWithCLOArray[index].CourseCLOList[i].cloName}</td>
                                    <td class="px-4 py-3 ">${courseWithCLOArray[index].CourseCLOList[i].description}
                                    </td>
                                </tr>`;
        $(tableBody).append(outcomeRow);
    }
    $(courseCLOTable).append(tableBody)
}


/** Apex Chart Graph Plotting with Structure... */
function createCgpRadialChartStructure(currentCGPA, message = "CGPA") {
    return {
        series: [valueToPercent(currentCGPA)],
        chart: {
            height: 180,
            type: 'radialBar',
            toolbar: {show: false}
        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 225,
                hollow: {
                    margin: 0,
                    size: '70%',
                    background: '#fff',
                    image: undefined,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    position: 'front',
                    dropShadow: {
                        enabled: true,
                        top: 20,
                        left: 10,
                        blur: 10,
                        opacity: 0.24
                    }
                },
                track: {
                    background: '#89DEFD',
                    strokeWidth: '100%',
                    margin: 0, // margin is in pixels
                    dropShadow: {
                        enabled: true,
                        top: 2,
                        left: 0,
                        blur: 4,
                        opacity: 0.15
                    }
                },

                dataLabels: {   // will set data inside the radial.
                    show: true,
                    name: {
                        offsetY: -10,
                        show: true,
                        color: '#011D6F',
                        fontSize: '24px'
                    },
                    value: {
                        formatter: function (val) {
                            return currentCGPA;
                        },
                        color: '#242632',
                        fontSize: '30px',
                        show: true,
                    }
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#0180F7', "#01409B", "#0259C2"],
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        stroke: {
            lineCap: 'round'
        },
        labels: [message]
    };
}

function createOverallPLOLinearChartStructure(ploArrayList) {
    /*  // ploArrayList = [{"score": 24, "plodescription": "xxxxxxxxxxxxxxxxxx"}, {"score": 24, "plodescription": "xxxxxxxxxxxxxxxxxx"},]; // fetch from server.
           ploArrayList = [24, 55, 99.9, 52, 72, 57, 0, 0, 0, 18, 51, 38];
    */

    let ploAverageScoreList = [];
    let ploNameList = [];
    if (ploArrayList.length > 0) {
        ploArrayList.forEach(function (value, index) {
            ploAverageScoreList.push(value.percentage);
            ploNameList.push(extractFirstNumeric(value.ploName));
        });

    }

    return {
        series: [{
            name: 'PLO',
            data: ploAverageScoreList,  // data we fetch from php of students overall PLOs score.
        }],
        chart: {
            height: 400,
            type: 'bar',
            stacked: true,
            tooltip: {
                /*  enabled: true,
                  custom: function ({series, seriesIndex, dataPointIndex, w}) {
                      var data = w.globals.initialSeries[seriesIndex].data[dataPointIndex];
                      console.log(series, seriesIndex, dataPointIndex, w , data);
                      // return '<ul>' +
                      //     '<li><b>PLO</b>: ' + data.x + '</li>' +
                      //     '</ul>';
                  },*/
            }
        },
        noData: {
            text: "No Program Learning Outcome List Found."
        },
        colors: [
            function ({value, seriesIndex, w}) {
                if (value < 50)
                    return colors[3]
                else
                    return colors[1]
            }
        ],
        plotOptions: {
            bar: {
                borderRadius: 6,
                columnWidth: '30%',
                distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false,
        },
        title: {
            text: 'Outcome Based Chart',
            floating: true,
            enabled: true,
            style: {
                colors: ['#111']
            },
            background: {
                enabled: true,
                foreColor: '#fff',
                borderWidth: 0
            },
            offsetX: 15
        },
        subtitle: {
            text: 'Following graph shows current status of PLO covered so far.',
            offsetX: 15,
            offsetY: 22
        },
        xaxis: {
            min: 1,
            max: ploArrayList.size,
            categories: ploNameList ,
            // [['1'], ['2'], ['3'], ['4'], ['5'], ['6'], ['7'], ['8'], ['9'], ['10'], ['11'], ['12']]
            labels: {
                enabled: true,
                style: {colors: ['#111']},
                background: {enabled: true, foreColor: '#fff', borderWidth: 0},
            },
            title: {
                text: "Program Learning Outcome",
                offsetX: 0,
                offsetY: 0,
                style: {
                    fontSize: '11px',
                    fontWeight: 800,
                    cssClass: 'apexcharts-xaxis-title',
                },
            },
        },
        yaxis: {
            min: 0,
            max: 100,
            title: {
                text: "Percentage",
                offsetX: 0,
                offsetY: 0,
                style: {
                    fontSize: '11px',
                    fontWeight: 800,
                    cssClass: 'apexcharts-xaxis-title',
                },
            }
        }
    };
}

function createSemesterGpaLineChartStructure(semesterGPAArray) { //
    let totalSemester = [];
    semesterGPAArray.forEach(function (value, index) {
        totalSemester.push((index + 1)) // [1,2,3,4.......]
    });

    return {
        series: [{
            name: "Semester No ", data: semesterGPAArray,
        }],
        chart: {
            height: 400,
            type: 'bar',
            stacked: true,
            offsetY: 15,
            events: {
                click: function (chart, w, e) {
                    console.log(chart, w, e);
                }
            },
            dataLabels: {
                enabled: false
            },
            /*toolbar: {
                tools: {
                    // download: '<img src="../../assets/images/1101098.png" width="20" height="20" />',
                    customIcons: [{
                        html: '<i class="fa fa-angle-down">xxxx</i>',
                        onClick: function(e, chartContext) {
                            console.log(e) },
                        appendTo: 'left' // left / top means the button will be appended to the left most or right most position
                    }]
                },
                show: true
            }*/
        },
        colors: [
            function ({value, seriesIndex, w}) {
                if (value < 1.9)
                    return colors[3]
                else if (value > 1.9 && value < 2.9)
                    return colors[0]
                else if (value > 2.9 && value < 3.5)
                    return colors[2]
                else
                    return colors[5];
            }
        ],
        plotOptions: {
            bar: {
                borderRadius: 6,
                columnWidth: '20%',
                distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false,
        },
        title: {
            text: 'GPA Based Chart',
            floating: true,
            enabled: true,
            style: {
                colors: ['#111'],
                fontSize: 18,
            },
            align: 'center',
            offsetY: -6,
        },
        noData: {
            text: "No Previous Record Exist.",
        },
        xaxis: {
            min: 0,
            max: semesterGPAArray.size,
            categories: totalSemester,
            labels: {
                enabled: true,
                style: {colors: ['#111']},
                background: {enabled: true, foreColor: '#fff', borderWidth: 0},
            },
            title: {
                text: "Semester",
                offsetX: 0,
                offsetY: 0,
                style: {
                    fontSize: '12px',
                    fontWeight: 800,
                    cssClass: '',
                },
            },
        },
        yaxis: {
            min: 1,
            max: 4,
            categories: [1,2,3,4],
            labels: {
                enabled: true,
                style: {colors: ['#111']},
                background: {enabled: true, foreColor: '#fff', borderWidth: 0},
            },
            title: {
                text: "GPA Score",
                offsetX: 0,
                offsetY: 0,
                style: {
                    fontSize: '12px',
                    fontWeight: 800,
                    cssClass: '',
                },
            },
        }

    };
}

function valueToPercent(value) {
    return (value * 100) / 4
}