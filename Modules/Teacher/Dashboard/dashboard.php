<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalyst | Dashboard</title>
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <link href="../asset/TeacherDashboardStyles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../../Assets/Scripts/Master.js" rel="script"></script>
    <script src="../asset/TeacherDashScripts.js" rel="script"></script>
    <script>
        window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
        )
        window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
        )
        window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
        )
    </script>
    <script src="../../../Assets/Frameworks/apexChart/apexcharts.js"></script>
</head>

<body>
<div class="w-full min-h-full">
    <main class="container mx-auto py-3 max-w-7xl px-5">
        <section class=" cprofile-grid mx-0 my-0 ">
            <div class="mx-2 p-4 clo-container ">
                <div class="grid grid-cols-4 gap-6">

                    <!-- Top Section , CGPA , CS , CH , EC -->

                    <div class="shadow-lg col-span-1 rounded-2xl w-full h-40  p-4 py-4 bg-white">
                        <div class="flex flex-col items-center justify-center">
                            <div class="rounded-full relative">
                                <p class="text-catalystBlue-d1 text-2xl text-center font-bold mb-4 mt-4">Student
                                    <br>Strength</p>
                            </div>
                            <p class="text-3xl font-semibold" style="color: #003C9C">7</p>
                        </div>
                    </div>
                    <div class="shadow-lg col-span-2 rounded-2xl w-full h-40  p-4 py-4 bg-white">
                        <div class="flex flex-col items-center justify-center">
                            <div class="rounded-full relative">
                                <p class="capitalize text-catalystBlue-d1 text-2xl text-center font-bold mb-12 mt-4">
                                    Assign Sections</p>
                            </div>
                            <p class="text-3xl font-semibold" style="color: #003C9C">15</p>
                        </div>
                    </div>
                    <div class="shadow-lg col-span-1 rounded-2xl w-full h-40  p-4 py-4 bg-white">
                        <div class="flex flex-col items-center justify-center">
                            <div class="rounded-full relative">
                                <p class="capitalize text-catalystBlue-d1 text-2xl text-center font-bold mb-4 mt-4">
                                    ---</p>
                            </div>
                            <p class="text-3xl font-semibold" style="color: #003C9C">-</p>
                        </div>
                    </div>


                    <div class="col-span-2 bg-white border-2 border-solid rounded-md">
                        <div id="averageCLOAchievedID" class="rounded-full">
                            <!--                                    <apexchart type="radialBar" height="390" :options="chartOptions" :series="series"></apexchart>-->
                            <div class="px-2 py-2 sm:px-4 border-b border-gray-200">
                                <h2 class="text-md font-bold text-center">Average Achieved CLO Score</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-2 bg-white border-2 border-solid rounded-md">
                        <div class="px-2 py-2 sm:px-4 border-b border-gray-200">
                            <h2 class="text-md font-bold text-center">CLO's List</h2>
                        </div>
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                            <tr class="text-center bg-catalystLight-f5">
                                <th class="capitalize px-4 w-1/6 py-3 title-font tracking-wider font-medium text-sm rounded-tl rounded-bl">
                                    CLO No
                                </th>
                                <th class="capitalize px-4 py-3 w-full title-font tracking-wider font-medium text-sm">
                                    Description
                                </th>
                            </tr>
                            </thead>

                            <tbody id="">
                            <tr class="text-center text-sm font-base tracking-tight">
                                <td class="px-4 py-3">CLO 1</td>
                                <td class="px-4 py-3 ">Understand the role of design and its major activities within the OO software development process, with focus on the Unified process</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>

                    <div class="col-span-2 bg-white border-2 border-solid rounded-md">
                        <div class="px-2 py-2 sm:px-4 border-b border-gray-200">
                            <h2 class="text-md font-bold text-center">Latest Assessment Created</h2>
                        </div>
                        <div class="px-4 py-0">
                            <p class="font-semibold text-based">Quizz : 2</p>
                            <p class="font-semibold text-based py-2">Topic:
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2">topic detail here</span>
                            </p>
                            <div class="flex flex-col space-y-0">
                                <p class="font-semibold text-based py-2 text-gray-700">Weightage : <span
                                        class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2">3.5%</span>
                                </p>
                            </div>
                        </div>
                        <div class="border-t-4">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                <tr class="text-center bg-catalystLight-f5">
                                    <th class="capitalize px-4 w-1/2 py-3 title-font tracking-wider font-medium text-sm rounded-tl rounded-bl">
                                        Question No
                                    </th>
                                    <th class="capitalize px-4 py-3 w-full title-font tracking-wider font-medium text-sm">
                                        CLO
                                    </th>
                                </tr>
                                </thead>

                                <tbody id="">
                                <tr class="text-center text-sm font-base tracking-tight">
                                    <td class="px-4 py-3">Question 1</td>
                                    <td class="px-4 py-3 ">CLO 1</td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="col-span-2 bg-white border-2 border-solid rounded-md">
                        <div class="px-2 py-2 sm:px-4 border-b border-gray-200">
                            <h2 class="text-md font-bold text-center">Latest Created Weekly Topic</h2>
                        </div>
                        <!--                                    <img class="bg-catalystBlue-l6 bg-cover rounded-md w-full w-16 h-16 hover:bg-catalystBlue-l61" alt="" src="../../../Assets/Images/vectorFiles/CLO_white_svg.svg">-->
                        <div class="px-4 py-0">
                            <p class="font-semibold text-based py-2">Week : 1</p>
                            <p class=" mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2 text-gray-700">
                                description here</p>
                            <div class="flex flex-col my-5 space-y-0">
                                <p class="font-semibold text-based py-2">Assessment:
                                    <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2">enter detail of assessment here</span>
                                </p>
                                <!--                                        <p class="font-base text-gray-700 text-sm">BT-Level : <span class="font-semibold">1</span></p>-->
                            </div>
                        </div>
                        <div class="px-4 border-t-4">
                            <div id="" class=" flex flex-row my-5 items-center w-full text-center">
                                <a class="capitalize font-semibold text-base w-full">CLO-1</a>
                                <a class="capitalize font-semibold text-base w-full">CLO-2</a>
                                <a class="capitalize font-semibold text-base w-full">CLO-3</a>
                            </div>
                        </div>
                    </div>


                    <!--   Enrolled Courses.  -->
                    <div class="col-span-4 flex flex-row border-2 border-solid rounded-md">

                        <!--   register courses list left side.  -->
                        <div class="text-black rounded-t-md rounded-b-md mt-2 w-5/12">
                            <h2 class="text-md pl-5 my-2 font-bold">Register Courses</h2>

                            <section class="py-4 clo-container">

                                <!--  Subjects list -->
                                <div class="mb-10  py-1 gap-5 grid grid-rows-6 font-medium text-sm text-gray-700">
                                    <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                        <p class="px-10">Operation Research</p>
                                        <img class="w-5" id="s-arrow-r" alt=""
                                             src="../../../Assets/Images/left-arrow.svg">
                                    </div>
                                    <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                        <p class=" px-10">Operation Research</p>
                                        <img class="w-5" id="s-arrow-r" alt=""
                                             src="../../../Assets/Images/left-arrow.svg">
                                    </div>
                                    <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                        <p class="px-10">Operation Research</p>
                                        <img class="w-5" id="s-arrow-r" alt=""
                                             src="../../../Assets/Images/left-arrow.svg">
                                    </div>
                                    <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                        <p class="px-10">Operation Research</p>
                                        <img class="w-5" id="s-arrow-r" alt=""
                                             src="../../../Assets/Images/left-arrow.svg">
                                    </div>
                                    <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                        <p class="px-10">Operation Research</p>
                                        <img class="w-5" id="s-arrow-r" alt=""
                                             src="../../../Assets/Images/left-arrow.svg">
                                    </div>
                                </div>
                            </section>
                        </div>


                        <!--   selected subject table right side.  -->
                        <div class="w-full mx-auto overflow-auto shadow-md">
                            <h2 class="table-head text-center text-black">Selected Course Information</h2>
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                <tr class="text-center bg-catalystLight-f5">
                                    <th class="capitalize px-4 w-1/4 py-3 title-font tracking-wider font-medium text-sm rounded-tl rounded-bl">
                                        course learning outcome
                                    </th>
                                    <th class="capitalize px-4 py-3 w-full title-font tracking-wider font-medium text-sm">
                                        Description
                                    </th>
                                    <th class="capitalize px-4 py-3 w-1/6 title-font tracking-wider font-medium text-sm">
                                        More
                                    </th>
                                </tr>
                                </thead>

                                <tbody id="courseTableBodyID">
                                <tr class="text-center text-sm font-base tracking-tight">
                                    <td class="px-4 py-3">CLO-1</td>
                                    <td class="px-4 py-3 ">To control the letter spacing of an element at a
                                        specific breakpoint
                                    </td>
                                    <td class="px-4 py-3"><i
                                            class="fa text-gray-600 fa-ellipsis-v hover:text-catalystBlue-l61"></i>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
</div>
</body>
<script>
    const colors = ['#016ADD', '#0183FB', '#4DBFFE']

    ploArray = [24, 55, 99.9, 52, 72, 57, 0, 0, 0, 18, 51, 38]; // fetch from server.
    totalCLO = ['CLO-1', 'CLO-2', 'CLO-3', 'CLO-4'];  // fetch from server
    avgScorePerCLO = [66, 51, 33, 10];  // fetch from server

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
</script>
</html>


