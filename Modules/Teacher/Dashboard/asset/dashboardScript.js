let stuStrength = 0;
const colors = ['#016ADD', '#0183FB', '#4DBFFE']

window.onload = function () {

    let cloDashboardTableBody = document.getElementById('cloDashboardTableBodyID');

    let assessmentDashboardContainer = document.getElementById('assessmentDashboardContainerID');
    let assessmentDashboardInnerBody = document.getElementById('assessmentDashboardBodyID');
    let assessmentDashboardQuestion = document.getElementById('assessmentDashboardBodyTableQuestionID');

    let weeklyTopicDashboardContainer = document.getElementById('weeklyTopicDashboardContainerID');
    let weeklyTopicDashboardInnerBody = document.getElementById('weeklyTopicDashboardBodyID');
    let weeklyTopicDashboardQuestion = document.getElementById('weeklyTopicDashboardBodyCloListID');

    let studentsPerformanceContainer = document.getElementById('studentPerformanceContainerID');
    let studentsPerformanceSubHeader = document.getElementById('studentPerformanceDashboardTableSubHeaderID');
    let studentsPerformanceDashboardInnerBody = document.getElementById('studentPerformanceDashboardBodyID');

    $(document).ready(function () {
        loadCloDashboardData(cloDashboardTableBody)
        loadLatestAssessmentDashboardData(assessmentDashboardContainer, assessmentDashboardInnerBody, assessmentDashboardQuestion);
        loadWeeklyTopicDashboardData(weeklyTopicDashboardContainer, weeklyTopicDashboardInnerBody, weeklyTopicDashboardQuestion)
        loadStudentCLOPerformanceDashboardData(studentsPerformanceContainer, studentsPerformanceSubHeader, studentsPerformanceDashboardInnerBody)
        loadCourseOverallAverageOutcome();
    });
};

/** Show Course Learning Outcome List. */
function loadCloDashboardData(cloDashboardTableBody) {
    let tableRowData;
    if (courseLearningArray !== null) {
        for (let i = courseLearningArray.length - 1; i >= 0; i--) {
            tableRowData = `<tr class="text-center text-sm font-base tracking-tight capitalize px-3 py-3  border-b-2 border-t-2 border-solid border-gray-200
                              hover:text-base hover:bg-catalystBlue-l6 transition ease-out duration-300 hover:text-white hover:">
                                <td class="px-2 py-2">${courseLearningArray[i][1]}</td>
                                <td class="px-2 py-2 ">${courseLearningArray[i][2]}
                                </td>
                            </tr>`;
            $(cloDashboardTableBody).prepend(tableRowData)
        }
    } else {
        tableRowData = `<tr class="text-center text-sm font-base tracking-tight capitalize px-3 py-3  border-b-2 border-t-2 border-solid border-gray-200
                              hover:text-base hover:bg-catalystBlue-l6 transition ease-out duration-300 hover:text-white hover:">
                                <td class="px-2 py-2"></td>
                                idk
                                </td>
                            </tr>`;
        $(cloDashboardTableBody).prepend(tableRowData)
    }


}

/** Show Assessment List with questions. */
function loadLatestAssessmentDashboardData(assessmentDashboardContainer, assessmentDashboardInnerBody, assessmentDashboardQuestion) {

    if (recentAssessmentArray !== null) {
        $(assessmentDashboardInnerBody).children(":first").html(recentAssessmentArray[0]);
        $(assessmentDashboardInnerBody).children(":nth-child(2)").find("span").html(recentAssessmentArray[1]);
        $(assessmentDashboardInnerBody).children(":last-child").find("span").html(recentAssessmentArray[2] + " %");
        for (let i = 0; i < recentAssessmentArray[4].length; i++) { //Object.values(recentAssessmentArray[4]).length      Object.values(recentAssessmentArray[4])[i][0]
            const cloNumber = `
            <tr class="text-center text-sm font-base tracking-tight">
                   <td class="px-4 py-3">${Object.values(recentAssessmentArray[4][i])[0]}</td>
                   <td class="px-4 py-3">${Object.values(recentAssessmentArray[4][i])[1]}</td>
                   <td class="px-4 py-3 ">${Object.values(recentAssessmentArray[4][i])[2]}</td>
             </tr>`;
            $(assessmentDashboardQuestion).append(cloNumber);
        }

    }

}


/** Show Course Weekly Topic List. */
function loadWeeklyTopicDashboardData(weeklyTopicDashboardContainer, weeklyTopicDashboardInnerBody, weeklyTopicDashboardQuestion) {

    if (recentWeeklyCoveredTopic !== null) {
        $(weeklyTopicDashboardInnerBody).children(":first").html(recentWeeklyCoveredTopic[0]);
        $(weeklyTopicDashboardInnerBody).children(":nth-child(2)").html(recentWeeklyCoveredTopic[1]);
        $(weeklyTopicDashboardInnerBody).children(":last-child").find("span").html(recentWeeklyCoveredTopic[2]);

        for (let i = 0; i < recentWeeklyCoveredTopic[3].length; i++) {
            const cloNumber = `<a class="capitalize font-semibold text-base w-full">${recentWeeklyCoveredTopic[3][i]}</a>`;
            $(weeklyTopicDashboardQuestion).append(cloNumber);
        }
    }
}

/** Loading Dashboard Chart of CLOs. */
function loadCourseOverallAverageOutcome() {
    let totalCLO = [];  // fetch from server
    let avgScorePerCLO = [] // fetch from server
    let responseText;
    $.ajax({
        type: "POST",
        url: "asset/chartData.php",
        timeout: 700,
        cache: false,
        data: {
            toLoadAverageCLO: true
        },
        beforeSend: function () {
        },
        success: function (data, status) {
            responseText = JSON.parse(data);
            if (responseText.errors === 'none') {
                const fetchedData = responseText.message;
                for (let i = 0; i < fetchedData.length; i++) {
                    totalCLO.push(fetchedData[i].cloName)
                    avgScorePerCLO.push(fetchedData[i].result)
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            $("#averageCLOAchievedID").html(`<div class="container min-h-full min-w-full px-5 mx-auto flex flex-col items-center ">
                    <h2 class="px-3 font-bold text-lg ">Sometime went wrong.</h2>
                </div>`)
        },
        complete: function (format) {
            responseText = JSON.parse(format.responseText)
            if ((responseText.status === 1 && responseText.errors === 'none') || format.status !== 200) {
                let averageCLOAchievedChart = new ApexCharts(document.querySelector("#averageCLOAchievedID"), {
                    series: avgScorePerCLO,
                    chart: {
                        height: 410,
                        type: 'radialBar',
                    },
                    plotOptions: {
                        radialBar: {
                            offsetY: 0,
                            startAngle: 0,
                            endAngle: 270,
                            hollow: {
                                margin: 5,
                                size: '30%',
                                background: 'transparent',
                                image: undefined,
                            },
                            dataLabels: {
                                name: {
                                    show: false,
                                },
                                value: {
                                    show: false,
                                }
                            }
                        }
                    },

                    colors: ['#1ab7ea', '#0084ff', '#39539E', '#0077B5'],
                    labels: totalCLO,
                    legend: {
                        show: true,
                        floating: true,
                        fontSize: '14px',
                        position: 'left',
                        offsetX: 150,
                        offsetY: 15,
                        labels: {
                            useSeriesColors: true,
                        },
                        markers: {
                            size: 0
                        },
                        formatter: function (seriesName, opts) {
                            return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
                        },
                        itemMargin: {
                            vertical: 3
                        }
                    },
                    xaxis: {
                        title: {
                            show: true,
                            text: "Program Learning Outcome",
                            offsetX: 0,
                            offsetY: 0,
                        },

                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            legend: {
                                show: false
                            }
                        }
                    }],
                });
                averageCLOAchievedChart.render();
            } else {
                $("#averageCLOAchievedID").html(`<div class="container min-h-full min-w-full px-5 mx-auto flex flex-col items-center ">
                    <h2 class="px-3 font-bold text-lg ">Can not update the graph. No record found!</h2>
                </div>`);
            }
        }
    });
}


/** student performance matrix function. */
function loadStudentCLOPerformanceDashboardData(studentsPerformanceContainer, studentsPerformanceSubHeader, studentsPerformanceDashboardInnerBody) {
    let totalRecord = [];  // fetch from server
    let responseText;
    $.ajax({
        type: "POST",
        url: "asset/chartData.php",
        timeout: 700,
        cache: false,
        data: {
            toLoadStudentAverageCLO: true
        },
        beforeSend: function () {
        },
        success: function (data, status) {
            responseText = JSON.parse(data);
            console.log(responseText)
            if (responseText.errors === 'none') {
                const fetchedData = responseText.message;
                /*let tableData = "";
                let tempArray = [];
                for (let i = 0; i < fetchedData.length; i++) {
                    const currentCLOName = fetchedData[i].cloName; // CLO-1
                    if (tempArray.indexOf(currentCLOName) !== -1) { // if exist , reset.
                        const tableEntireRow = `<tr class="text-center hover:bg-catalystLight-e3 text-sm font-base tracking-tight" >`
                            + `<td class="px-1 py-3 w-full">${fetchedData[i-2].regNumber}</td>` + tableData + `</tr>`;
                        $(studentsPerformanceDashboardInnerBody).append(tableEntireRow)
                        tempArray = []
                        tableData = "";
                    } else {
                        tableData += `<td class="px-1 py-3 w-full">${fetchedData[i].result}</td>`
                        tempArray.push(currentCLOName)
                    }
                }*/
                for (let i = 0; i < fetchedData.length; i++)
                    iterateAndCreatePerformanceRow(fetchedData, i, true)
                for (let i = fetchedData.length - extra; i < fetchedData.length; i++)
                    iterateAndCreatePerformanceRow(fetchedData, i, false)
                $("#teacherDashboardTotalStudentID").html(stuStrength)
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            $("#averageCLOAchievedID").html(`<div class="container min-h-full min-w-full px-5 mx-auto flex flex-col items-center ">
                    <h2 class="px-3 font-bold text-lg ">Sometime went wrong.</h2>
                </div>`)
        },
        complete: function (format) {
            responseText = JSON.parse(format.responseText)
            if ((responseText.status === 1 && responseText.errors === 'none') || format.status !== 200) {
            } else {
                $("#averageCLOAchievedID").html(`<div class="container min-h-full min-w-full px-5 mx-auto flex flex-col items-center ">
                    <h2 class="px-3 font-bold text-lg ">Can not update the graph. No record found!</h2>
                </div>`);
            }
        }
    });

    let tableD = "";
    let tempArray = []
    let extra = 1;

    function iterateAndCreatePerformanceRow(fetchedData, i, flag) {
        const currentCloName = fetchedData[i]["cloName"];
        if (tempArray.indexOf(currentCloName) !== -1) {
            // --i;
            let r = 0;
            if (flag)
                r = i - tempArray.length;
            else
                r = i

            const tableEntireRow = `<tr class="text-center hover:bg-catalystLight-e3 text-sm font-base tracking-tight" >`
                + `<td class="px-1 py-3 w-full">${fetchedData[r].regNumber}</td>` + tableD + `</tr>`;
            $(studentsPerformanceDashboardInnerBody).append(tableEntireRow)
            extra++;
            tableD = "";
            if (flag && tableD === "")
                stuStrength = fetchedData.length / tempArray.length;
            tempArray = [];
        } else {
            tempArray.push(currentCloName);
            if (flag)
                tableD += `<td class="px-1 py-3 w-full">${fetchedData[i].result}</td>`
            else
                tableD += `<td class="px-1 py-3 w-full">${fetchedData[i + 1].result}</td>`
        }

    }
}