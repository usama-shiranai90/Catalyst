<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
session_start();

$studentRegCode = $_SESSION['studentRegistrationCode'];
$batchCode = $_SESSION['batchCode'];
$programCode = $_SESSION['programCode'];

$personalDetails = array();
$student = unserialize($_SESSION['studentInstance']);
$personalDetails = $student->getPersonalDetails();

echo json_encode($personalDetails);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="../../Assets/Frameworks/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <link href="../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script rel="script" src="../../node_modules/jquery/dist/jquery.min.js"></script>
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

    <script src="../../Assets/Frameworks/apexChart/apexcharts.js"></script>

    <script src="assets/dashboardscript.js"></script>
</head>
<body>

<div class="w-full min-h-full">
    <main class="container mx-auto py-3 max-w-7xl px-5">
        <section class=" cprofile-grid mx-0 my-0 ">
            <div class="mx-2 p-4 clo-container ">
                <div class="grid grid-cols-4 gap-6">

                    <!-- Top Section , CGPA , CS , CH , EC -->
                    <div class="shadow-lg rounded-2xl w-full h-40 p-4 py-4 bg-white">
                        <div class="flex flex-col items-center justify-center">
                            <!--  <div class="w-24 h-24 rounded-full relative">
                                  <svg width="120"  height="120" viewBox="0 0 174 188" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                      <path opacity="0.253397" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M31.0745 134.469C31.0745 134.469 31.9461 129.681 35.3737 140.939C38.8013 152.197 77.5592 176.837 90.533 156.882C103.507 136.927 121.849 159.319 134.52 153.33C147.19 147.341 149.197 139.437 139.753 120.393C130.309 101.348 153.54 78.1413 130.382 63.2216C107.225 48.302 125.153 51.9673 125.153 51.9673L125.035 112.879L94.036 140.825L31.0745 134.469Z"
                                            fill="url(#paint0_linear_147_8174)"/>
                                      <path opacity="0.518059" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M122.982 75.1806C122.982 75.1806 120.289 75.0248 126.252 72.369C132.215 69.7131 143.159 46.6544 131.307 40.8514C119.454 35.0484 130.538 23.4069 126.389 16.8226C122.241 10.2384 117.757 9.6679 107.916 16.1724C98.0744 22.677 79.0883 5.30399 72.4403 19.0948C65.7923 32.8856 77.0847 16.142 77.0847 16.142L104.774 24.8037L122.237 40.0093L122.982 75.1806Z"
                                            fill="url(#paint1_linear_147_8174)"/>
                                      <path d="M131.891 81.6732C131.891 116.474 103.512 144.734 68.4457 144.734C33.379 144.734 5 116.474 5 81.6732C5 46.8722 33.379 18.6123 68.4457 18.6123C103.512 18.6123 131.891 46.8722 131.891 81.6732Z"
                                            stroke="#89DEFE" stroke-width="10"/>
                                      <path d="M64.1495 18.757C73.2611 18.1424 82.3983 19.4901 90.9368 22.7076C99.4752 25.925 107.213 30.9358 113.622 37.3961C120.031 43.8564 124.961 51.6139 128.077 60.1383C131.193 68.6626 132.423 77.7542 131.682 86.7928"
                                            stroke="url(#paint2_linear_147_8174)" stroke-width="10" stroke-linecap="round"/>
                                      <defs>
                                          <linearGradient id="paint0_linear_147_8174" x1="35.7478" y1="76.6855" x2="217.106" y2="144.119"
                                                          gradientUnits="userSpaceOnUse">
                                              <stop stop-color="#C2E2FF"/>
                                              <stop offset="1" stop-color="#5092F8"/>
                                          </linearGradient>
                                          <linearGradient id="paint1_linear_147_8174" x1="89.6826" y1="76.2067" x2="114.736" y2="-28.4012"
                                                          gradientUnits="userSpaceOnUse">
                                              <stop stop-color="#C3D7EE"/>
                                              <stop offset="1" stop-color="#5092F8"/>
                                          </linearGradient>
                                          <linearGradient id="paint2_linear_147_8174" x1="75.2903" y1="-7.81427" x2="82.927" y2="233.325"
                                                          gradientUnits="userSpaceOnUse">
                                              <stop stop-color="#0184FC"/>
                                              <stop offset="1" stop-color="#016BDD"/>
                                          </linearGradient>
                                      </defs>
                                  </svg>
                              </div>-->
                            <div id="studentCGPA_ProgressCircle" class="rounded-full absolute top-14">
                            </div>
                        </div>
                    </div>
                    <div class="shadow-lg rounded-2xl w-full h-40  p-4 py-4 bg-white">
                        <div class="flex flex-col items-center justify-center">
                            <div class="rounded-full relative">
                                <p class="text-catalystBlue-d1 text-2xl text-center font-bold mb-4 mt-4">Current <br>Semester
                                </p>
                            </div>
                            <p class="text-3xl font-semibold" style="color: #003C9C">7</p>
                        </div>
                    </div>
                    <div class="shadow-lg rounded-2xl w-full h-40  p-4 py-4 bg-white">
                        <div class="flex flex-col items-center justify-center">
                            <div class="rounded-full relative">
                                <p class="capitalize text-catalystBlue-d1 text-2xl text-center font-bold mb-4 mt-4">
                                    credit<br> hour</p>
                            </div>
                            <p class="text-3xl font-semibold" style="color: #003C9C">15</p>
                        </div>
                    </div>
                    <div class="shadow-lg rounded-2xl w-full h-40  p-4 py-4 bg-white">
                        <div class="flex flex-col items-center justify-center">
                            <div class="rounded-full relative">
                                <p class="capitalize text-catalystBlue-d1 text-2xl text-center font-bold mb-4 mt-4">
                                    Enrolled <br>Courses</p>
                            </div>
                            <p class="text-3xl font-semibold" style="color: #003C9C">6</p>
                        </div>
                    </div>
                    <div class="col-span-2 bg-white border-2 border-solid rounded-md">
                        <div id="studentCurrentPLOProgress" class="rounded-full">
                        </div>
                    </div>
                    <div class="col-span-2 bg-white border-2 border-solid rounded-md">
                        <div id="studentCurrenGPAProgress" class="rounded-full">
                        </div>
                    </div>


                    <!--   Enrolled Courses.  -->
                    <div class="col-span-4 flex flex-row border-2 border-solid rounded-md">

                        <!--   register courses list left side.  -->
                        <div class="text-black rounded-t-md rounded-b-md mt-2 w-5/12">
                            <h2 class="text-md pl-5 my-2 font-bold">Register Courses</h2>

                            <section class="py-4 clo-container" id="registerCourseDivID">
                                <!--  Subjects list -->
                                <div class="mb-10  py-1 gap-5 grid grid-rows-6 font-medium text-sm text-gray-700">
                                    <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                        <p class="px-10">Operation Research</p>
                                        <img class="w-5" id="s-arrow-r" alt="" src="../../Assets/Images/left-arrow.svg">
                                    </div>
                                    <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                        <p class=" px-10">Operation Research</p>
                                        <img class="w-5" id="s-arrow-r" alt="" src="../../Assets/Images/left-arrow.svg">
                                    </div>
                                    <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                        <p class="px-10">Operation Research</p>
                                        <img class="w-5" id="s-arrow-r" alt="" src="../../Assets/Images/left-arrow.svg">
                                    </div>
                                    <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                        <p class="px-10">Operation Research</p>
                                        <img class="w-5" id="s-arrow-r" alt="" src="../../Assets/Images/left-arrow.svg">
                                    </div>
                                    <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                        <p class="px-10">Operation Research</p>
                                        <img class="w-5" id="s-arrow-r" alt="" src="../../Assets/Images/left-arrow.svg">
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
                                    <td class="px-4 py-3 ">To control the letter spacing of an element at a specific
                                        breakpoint
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

<script>
    const colors = ['#016ADD', '#0183FB', '#4DBFFE']

    ploArray = [24, 55, 99.9, 52, 72, 57, 0, 0, 0, 18, 51, 38]; // fetch from server.
    semesterResultArray = [2.35, 3.52, 3.8, 3.9, 3.4];  // fetch from server
    let cgpaProgress = new ApexCharts(document.querySelector("#studentCGPA_ProgressCircle"), getCGPA_Progress(3.45));

    let ploChart = new ApexCharts(document.querySelector("#studentCurrentPLOProgress"), getStudentPLOProgress(ploArray));
    let gpaChart = new ApexCharts(document.querySelector("#studentCurrenGPAProgress"), getStudentGPA(semesterResultArray));
    cgpaProgress.render();

    ploChart.render();
    gpaChart.render();


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
</script>
</body>
</html>
