// window.onload = function () {

const colors = ['#016ADD', '#0183FB', '#4DBFFE']

ploArray = [24, 55, 99.9, 52, 72, 57, 0, 0, 0, 18, 51, 38]; // fetch from server.
semesterResultArray = [2.35, 3.52, 3.8, 3.9, 3.4];  // fetch from server


/** DOM */
const registerCourseSection = document.getElementById('registerCourseDivID');
const courseCLOTable = document.getElementById('courseTableID');
// const selectedCourseCLOTableBody = document.getElementById('courseTableBodyID');


$(document).ready(function () {

    let ploChart = new ApexCharts(document.querySelector("#studentCurrentPLOProgress"), getStudentPLOProgress(ploArray));
    let gpaChart = new ApexCharts(document.querySelector("#studentCurrenGPAProgress"), getStudentGPA(semesterResultArray));

    ploChart.render();
    gpaChart.render();

    setRegisterCourses();
    loadCGPAGraph();

    let openIndex = 0;
    $(document).on('click', "img[data-reg-course='ico']", function (event) {
        event.stopImmediatePropagation();
        openIndex = parseInt($(event.target).closest('.student-profile-header-text').attr("id").match(/\d+/)[0]); //  daregcor-2-> 2 , ID ma sa integer.
        $(this).attr("src", "../../Assets/Images/bottom-arrow.svg");

        // console.log($(event.target).closest('.student-profile-header-text'), openIndex)

        $("tbody[id^='courseTableBodyID']").each(function (index, node) {
            const bodyID = $(node).attr("id").match(/\d+/)[0];
            const courseDivID = document.getElementById("daregcor-" + bodyID);

            if (bodyID == openIndex) {
                // $(node).attr("class","").removeClass("hidden")
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

function setOutcomeDescription(index) {
    let tableBody = document.createElement("tbody");
    tableBody.setAttribute("id", "courseTableBodyID-" + (index + 1))

    if ((index) !== 0) {
        tableBody.setAttribute("class", "hidden");
    }
    for (let i = 0; i < courseWithOutcomeArray[index].CourseCLOList.length; i++) {
        const outcomeRow = `<tr class="text-center text-sm font-base tracking-tight">
                                    <td class="px-4 py-3">${courseWithOutcomeArray[index].CourseCLOList[i].cloName}</td>
                                    <td class="px-4 py-3 ">${courseWithOutcomeArray[index].CourseCLOList[i].description}
                                    </td>
                                </tr>`;
        $(tableBody).append(outcomeRow);
    }
    $(courseCLOTable).append(tableBody)
}

function setRegisterCourses() {

    if (courseWithOutcomeArray != null) {
        let $withH = `sm:px-6 sm:w-auto sm:justify-center cursor-pointer inline-flex justify-center items-center py-3 w-1/2
                      rounded-t border-b-2 border-indigo-500 text-black tracking-wide leading-none student-profile-header-text my-0 font-medium text-base`;
        let withoutH = `sm:px-6 sm:w-auto sm:justify-center cursor-pointer inline-flex justify-center items-center py-3 w-1/2
                        rounded-t border-b-2 text-gray-400 tracking-normal leading-none student-profile-header-text my-0 transform transition ease-out duration-300
                        hover:scale-100 hover:-translate-y-0 hover:translate-x-0 hover:text-black hover:font-normal hover:border-black font-medium text-base`;
        for (let i = 0; i < courseWithOutcomeArray.length; i++) {
            let courseDiv = '';
            if (i !== 0) {
                courseDiv = `<div class="${withoutH}" id="daregcor-${(i + 1)}">
                                    <div class="flex flex-row justify-around items-center min-w-full">
                                        <label class="px-5">${courseWithOutcomeArray[i].courseName}</label>
                                        <img class="w-5" alt="" src="../../Assets/Images/bottom-arrow.svg" data-reg-course="ico">
                                    </div>
                                </div>`
            } else {
                courseDiv = `<div class="${$withH}"  id="daregcor-${(i + 1)}"> 
                                    <div class="flex flex-row justify-around items-center min-w-full">
                                        <label class="px-5">${courseWithOutcomeArray[i].courseName}</label>
                                        <img class="w-5" alt="" src="../../Assets/Images/left-arrow.svg" data-reg-course="ico">
                                    </div>
                                </div>`
            }
            $(registerCourseSection).append(courseDiv);
            setOutcomeDescription(i)
        }
    }
}

function loadCGPAGraph() {
    $.ajax({
        type: "POST",
        url: 'assets/Operation/DashboardAjax.php',
        timeout: 500,
        cache: false,
        data: {
            toLoadCgpa: true
        },
        beforeSend: function () {},
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
        },
        success: function (data, status) {
            const reponseText = JSON.parse(data)
            console.log(reponseText)
            if (reponseText.status === 1 && reponseText.errors === 'none') {
                const cgpa  = reponseText.message.CGPA;
                console.log(reponseText.message.CGPA)
                let cgpaProgress = new ApexCharts(document.querySelector("#studentCGPA_ProgressCircle"), getCGPA_Progress(cgpa));
                cgpaProgress.render();
            }
        },
        complete: function (data) {

        },
    });
}

/** Dashboard Charts CGPA. */
function getCGPA_Progress(currentCGPA = 2) {
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
                        top: 3,
                        left: 0,
                        blur: 4,
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
        labels: ["CGPA"]
    };
}

function getStudentPLOProgress(ploArrayList) {
    return {
        series: [{
            name: 'PLO',
            data: ploArrayList,  // data we fetch from php of students overall PLOs score.
        }],
        chart: {
            height: 400,
            type: 'bar',
            stacked: true,
            events: {
                click: function (chart, w, e) {

                }
            },
            toolbar: {
                /*tools: {
                    // download: '<img src="../../assets/images/1101098.png" width="20" height="20" />',
                    customIcons: [{
                        html: '<i class="fa fa-angle-down">xxxx</i>',
                        onClick: function(e, chartContext) {
                            console.log(e) },
                        appendTo: 'left' // left / top means the button will be appended to the left most or right most position
                    }]
                }*/
                show: false
            }
        },
        colors: colors,
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
            categories: [ // Mention each PLO  here.
                ['1'], ['2'], ['3'], ['4'], ['5'], ['6'], ['7'], ['8'], ['9'], ['10'], ['11'], ['12']],

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

function getStudentGPA(semesterArray) {
    let totalSemester = [];
    semesterArray.forEach(function (key, value) {
        totalSemester.push((value + 1))
    })

    return {
        series: [{
            name: 'PLO',
            data: semesterArray,  // data we fetch from php of students overall PLOs score.
        }],
        chart: {
            height: 400,
            type: 'bar',
            stacked: true,
            events: {
                click: function (chart, w, e) {

                }
            },
            toolbar: {
                /*tools: {
                    // download: '<img src="../../assets/images/1101098.png" width="20" height="20" />',
                    customIcons: [{
                        html: '<i class="fa fa-angle-down">xxxx</i>',
                        onClick: function(e, chartContext) {
                            console.log(e) },
                        appendTo: 'left' // left / top means the button will be appended to the left most or right most position
                    }]
                }*/
                show: false
            }
        },
        colors: colors,
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
            text: 'GPA Based Chart',
            floating: true,
            enabled: true,
            style: {
                colors: ['#111']
            },
            offsetX: 15
        },
        xaxis: {
            min: 1,
            max: semesterArray.size,
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
                    fontSize: '11px',
                    fontWeight: 800,
                    cssClass: '',
                },
            },
        },

    };
}

function valueToPercent(value) {
    return (value * 100) / 4
}

// }