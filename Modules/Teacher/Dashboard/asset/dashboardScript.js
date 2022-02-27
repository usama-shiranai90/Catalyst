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
        loadStudentStatusDashboardData(studentsPerformanceContainer, studentsPerformanceSubHeader, studentsPerformanceDashboardInnerBody)


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
                                wtf
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
        $(assessmentDashboardInnerBody).children(":last-child").find("span").html(recentAssessmentArray[2]+" %");
        for (let i = 0; i < recentAssessmentArray[4].length; i++) { //Object.values(recentAssessmentArray[4]).length      Object.values(recentAssessmentArray[4])[i][0]
            const cloNumber = `
            <tr class="text-center text-sm font-base tracking-tight">
                   <td class="px-4 py-3">${Object.values(recentAssessmentArray[4][i])[0]}</td>
                   <td class="px-4 py-3">${Object.values(recentAssessmentArray[4][i])[1]}</td>
                   <td class="px-4 py-3 ">${Object.values(recentAssessmentArray[4][i])[2]}</td>
             </tr>`;
            $(assessmentDashboardQuestion).append(cloNumber);
            console.log("wtf")
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

/** student performance matrix function. */
function loadStudentStatusDashboardData(studentsPerformanceContainer, studentsPerformanceSubHeader, studentsPerformanceDashboardInnerBody) {

}


/** Loading Dashboard Chart of CLOs. */
let averageCLOAchievedChart = new ApexCharts(document.querySelector("#averageCLOAchievedID"), getOverAllCloAvg(avgScorePerCLO));
averageCLOAchievedChart.render();

function getOverAllCloAvg(avgScorePerCLO) {
    return {
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

    };


}
