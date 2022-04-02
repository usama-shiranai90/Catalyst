<?php
//include "../../Backend/Packages/DIM/Faculty.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";

$user = null;
$studentPanel = "";
$teacherPanel = "hidden";
$adminPanel = "hidden";
$studentTab = "selected";
$teacherTab = "";
$adminTab = "";
$studentIncorrectPass = "hidden";
$teacherIncorrectPass = "hidden";
$adminIncorrectPass = "hidden";

$adminType = "";

$batch = new Batch();
$listOfBatches = $batch->retrieveAllEligibleBatches();
$listOfPrograms = array();
$program = new Program();
foreach ($listOfBatches as $batch) {
    $listOfPrograms[] = $program->retrieveProgram($batch->getProgramCode());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accessGranted = false;

    if (isset($_POST["studentLogin"])) {
        if (!empty($_POST["batch"]) && !empty($_POST["program"]) && !empty($_POST["rollNo"]) && !empty($_POST["studentPassword"])) {
            $email = $_POST["batch"] . "-" . $_POST["program"] . "-" . $_POST["rollNo"];
//            $email = "F18" . "-" . "BCSE" . "-" . "011";
            $password = $_POST["studentPassword"];
            $user = new StudentRole();
            $accessGranted = $user->login($email, $password);


            if (!$accessGranted) {
                $studentIncorrectPass = "";
                $studentPanel = "";

                $studentTab = "selected";
                $teacherTab = "";
                $adminTab = "";
                $teacherPanel = "hidden";
                $adminPanel = "hidden";
            }
        }
    } else if (isset($_POST["teacherLogin"])) {
        if (!empty($_POST["teacherUsername"]) && !empty($_POST["teacherPassword"])) {
            $email = $_POST["teacherUsername"];
            $password = $_POST["teacherPassword"];

            $user = Faculty::getFacultyInstance();
            $accessGranted = $user->login($email, $password);

            if (!$accessGranted) {
                $teacherIncorrectPass = "";
                $teacherPanel = "";
                $teacherTab = "selected";
                $studentTab = "";
                $adminTab = "";
                $studentPanel = "hidden";
                $adminPanel = "hidden";
            }
        }
    } else if (isset($_POST["adminLogin"])) {
        if (!empty($_POST["adminUsername"]) && !empty($_POST["adminPassword"])) {
            $email = $_POST["adminUsername"];
            $password = $_POST["adminPassword"];

            $user = AdministrativeRole::authenticate($email, $password);
            $adminType = $user->login($email, $password);

            if ($adminType === false) {
                $adminIncorrectPass = "";

                $adminTab = "selected";
                $adminPanel = "";

                $teacherTab = "";
                $studentTab = "";
                $studentPanel = "hidden";
                $teacherPanel = "hidden";
            } else
                $accessGranted = true;
        }
    }

    if ($accessGranted) {
        session_start();
        if (isset($_POST["teacherLogin"])) {
            $user->setPersonalDetails();
            $_SESSION['facultyCode'] = $user->getUserCode();
            $_SESSION['facultyInstance'] = serialize(Faculty::getFacultyInstance());
            header("Location: ../Teacher/TeacherDashboard.php");

        } elseif (isset($_POST["studentLogin"])) {
            $_SESSION['studentRegistrationCode'] = $user->getStudentRegistrationCode();
            $_SESSION['batchCode'] = $_POST["batchCode"];
            $_SESSION['programCode'] = $_POST["programCode"];

        } elseif (isset($_POST["adminLogin"])) {
            $_SESSION['adminCode'] = $user->getAdminCode();

            if ($user instanceof HeadOfDepartmentRole)
                $_SESSION['departmentCode'] = array($user->getDepartmentCode(), $user->getDepartmentName());
            elseif ($user instanceof ProgramManagerRole)
                $_SESSION['programCode'] = $user->getProgramCode();
            elseif ($user instanceof CourseAdvisorRole) {
                $_SESSION['departmentCode'] = $user->getDepartmentCode();
                $_SESSION['programCode'] = $user->getProgramCode();
                $_SESSION['batchCode'] = $user->getBatchCode();
                $_SESSION['sectionCode'] = $user->getSectionCode();
            }
        }
        $_SESSION['adminInstance'] = serialize($user);
        header(sprintf("Location: %s", $user->getNavigationUrl()));

    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <link href="../../Assets/Frameworks/Tailwind/tailwind.css" rel="stylesheet">
    <link href="AuthenticationAssets/LoginStyles.css" rel="stylesheet">
    <script src="AuthenticationAssets/LoginScripts.js" rel="script"></script>
    <link href="../../Assets/Frameworks/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <title>Catalyst - Login</title>

</head>

<body class="flex flex-col justify-center">

<header class="header-section bg-catalystBlue-l2 shadow-2xl max-h-full">
    <!--container px-5 py-2 mx-auto flex items-center sm:flex-row flex-col-->
    <div class="px-5 py-4 mx-auto  sm:flex-row flex-col sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">

        <div class="relative flex items-center justify-between flex-row">

            <a href="#"><img src="../../Assets/Images/vectorFiles/Primary/catalystLogo.svg" alt="logo"></a>

            <ul class="flex inline-flex items-center justify-start hidden space-x-2 lg:flex">

                <li><a href="#" title="Home"
                       class="font-medium tracking-wider text-white transition-colors duration-200 transform rounded-md hover:bg-palette_ms_bg-300 px-2 py-2">Home</a>
                </li>

                <li><a href="#" title="Features-list"
                       class="font-medium tracking-wider text-white transition-colors duration-200 transform rounded-md hover:bg-palette_ms_bg-200 px-2 py-2">Features</a>
                </li>

                <li><a href="#" title="About-is"
                       class="font-medium tracking-wider text-white transition-colors duration-200 transform rounded-md hover:bg-palette_ms_bg-400 focus:bg-catalystBlue-d2 px-2 py-2">About
                        Us</a></li>
            </ul>
            <ul class="flex inline-flex items-center justify-start hidden space-x-8 lg:flex">
                <li style="margin:0">

                    <button class="flex items-center px-2 py-2 font-medium tracking-wider
                     text-white transition-colors duration-200 transform rounded-md hover:bg-blue-500">

                        <img class="w-7 h-7 mx-1 transform rotate-180 " alt="login-logo"
                             src="../../Assets/Images/vectorFiles/logoutIcon.svg">
                        <span class="mx-1">Login</span>
                    </button>
                </li>


            </ul>
            <!-- Mobile menu -->
            <div class=" lg:hidden">
                <button aria-label="Open Menu" title="Open Menu" class="p-2 -mr-1 transition duration-200 rounded">
                    <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                        <path fill="currentColor"
                              d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"></path>
                        <path fill="currentColor"
                              d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"></path>
                        <path fill="currentColor"
                              d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"></path>
                    </svg>
                </button>
                <div class=" hidden absolute w-full left-0 top-16">
                    <div class="p-5 bg-white border rounded shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <a href="/" class="inline-flex items-center">
                                    <img src="../../Assets/Images/vectorFiles/Primary/catalystLogo.svg" alt="logo">
                                </a>
                            </div>
                            <div>
                                <button aria-label="Close Menu" title="Close Menu"
                                        class="p-2 -mt-2 -mr-2 transition duration-200 rounded hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                    <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                                        <path
                                                fill="currentColor"
                                                d="M19.7,4.3c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l6.3,6.3l-6.3,6.3 c-0.4,0.4-0.4,1,0,1.4C4.5,19.9,4.7,20,5,20s0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l6.3-6.3C20.1,5.3,20.1,4.7,19.7,4.3z"
                                        ></path>
                                    </svg>

                                </button>
                            </div>
                        </div>
                        <nav>
                            <ul class="space-y-2">
                                <li><a href="#" title="Home"
                                       class="font-medium tracking-wide text-black hover:text-gray-200">Home</a></li>
                                <li><a href="#" title="Features-list"
                                       class="font-medium tracking-wide text-black hover:text-gray-200">Features</a>
                                </li>
                                <li><a href="#" title="About-is"
                                       class="font-medium tracking-wide text-black hover:text-gray-200">About Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

    </div>

</header>

<main class="main grid grid-rows-1 bg-no-repeat items-center justify-items-center justify-center bg-cover bg-center ">
    <div class="loginBox w-3/6 sm:w-4/6 ">

        <!--        Authentication Types-->
        <div class="hidden sm:flex authenticationTypes">
            <div class="<?php echo $studentTab; ?>" style="border-radius: 20px 0 0 0" type="button"
                 id="studentAuthenticationBtn">
                Student
            </div>
            <div class="verticalLine"></div>
            <div class="<?php echo $teacherTab; ?>" type="button" id="teacherAuthenticationBtn">Teacher</div>
            <div class="verticalLine"></div>
            <div class="<?php echo $adminTab; ?>" style="border-radius: 0 20px 0 0" type="button"
                 id="adminAuthenticationBtn">Admin
            </div>
        </div>

        <!--        Authentication Types for Mobile       -->
        <div class="authenticationTypesMobile selected sm:hidden" id="authenticationTypesDropdown">
            <span id="iAm">Student</span>
            <div class="authenticationTypeDroppedDown hidden" id="dropdownContent">
                <div type="button" id="studentAuthenticationBtnMobile">Student</div>
                <div type="button" id="teacherAuthenticationBtnMobile">Teacher</div>
                <div type="button" id="adminAuthenticationBtnMobile">Admin</div>
            </div>
        </div>

        <!--        Student Authentication body-->
        <div class="studentAuthentication px-5 pt-4 pb-4 <?php echo $studentPanel; ?>" id="studentAuthenticationPanel">
            <label class="login-container-label">Please login to continue</label>
            <form method="post">
                <!--                Roll Number Generating Portion-->
                <div class="mt-3 rollNumberSectionMobile rollNumberSectionNormal">

                    <i class="sm:col-span-1 fa-1x w-1/2 text-center far fa-user"></i>

                    <div class="select-label-content rollNumberSelectorsNormal" id="batchDiv">
                        <select class="select" name="batch" onclick="this.setAttribute('value', this.value);"
                                onchange="this.setAttribute('value', this.value);" value="" id="batch">
                            <option value="" hidden></option>

                            <?php
                            $batchesBeingShown = array();

                            for ($i = 0; $i < sizeof($listOfBatches); $i++) {
                                if (!in_array($listOfBatches[$i]->getBatchName(), $batchesBeingShown)) {
                                    echo "<option value='" . $listOfBatches[$i]->getBatchName() . "' batchCode='" . $listOfBatches[$i]->getBatchCode() . "'>" . $listOfBatches[$i]->getBatchName() . "</option>";
                                    array_push($batchesBeingShown, $listOfBatches[$i]->getBatchName());
                                }
                            }
                            ?>

                        </select>
                        <label class="select-label">Batch</label>
                    </div>

                    <div class="select-label-content  rollNumberSelectorsNormal" id="programDiv">
                        <select class="select" name="program" onclick="this.setAttribute('value', this.value);"
                                onchange="this.setAttribute('value', this.value);" value="" id="program">


                        </select>
                        <label class="select-label">Program</label>
                    </div>
                    <div class="rollNumberSelectorsNormal" id="rollNoDiv">
                        <div class="textField-label-content">

                            <input class="textField" type="text" placeholder=" " id="rollNo"
                                   name="rollNo" value="">
                            <label class="textField-label">Roll No</label>
                        </div>
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-5">
                    <label class="text-red-900 text-center sm:col-start-2 sm:col-span-3 hidden"
                           id="studentUsernameError">Please select the required fields</label>
                </div>

                <!--Password Portion-->      <!--   <div class="mt-3 passwordSectionMobile passwordSectionNormal ">
                    <i class="fas fa-lock fa-1x mt-3 w-1/2 text-center col-span-1"></i>

                    <div class="textField-label-content md:col-start-2 col-span-6" id="studentPasswordDiv">
                      <label for="studentPassword"></label>
                        <input class="textField" type="password" placeholder=" "
                               id="studentPassword" name="studentPassword" style="margin-left: 4px ; margin-right: 4px">
                        <label class="textField-label sm:top-2 md:top-4 lg:top-4">Password</label>

                       <div class="hidden md:inline-flex lg:inline-flex forgotPasswordNormal"
                             style="width: auto; display: none">
                            <div class="verticalLine mr-2" style="width: auto"></div>
                            <a class="text-red-700" href="#">Forgot</a>
                        </div>

                    </div>
                </div>-->
                <div class="mt-3 passwordSectionMobile passwordSectionNormal">
                    <i class="fas fa-lock fa-1x mt-3 w-1/2 text-center col-span-1"></i>
                    <div class="textField-label-content col-span-4" id="studentPasswordDiv">

                        <input class="textField" type="password" placeholder=" " id="studentPassword"
                               name="studentPassword">
                        <label class="textField-label">Password</label>
                    </div>
                </div>

                <!--                for Mobile View-->
                <div class="forgotPassword text-center  md:hidden lg:hidden" style="width: auto">
                    <a class="text-red-700" href="#">Forgot</a>
                </div>

                <label class="text-red-900 text-center hidden" id="studentPassError"></label>
                <label class="text-red-900 text-center <?php echo $studentIncorrectPass; ?>" id="studentIncorrectPass">Username
                    or password
                    is incorrect</label>

                <!--                        Hidden Fields                   -->
                <input class="hidden" type="text" id="curr" name="curriculumCode">
                <input class="hidden" type="text" name="programCode">
                <input class="hidden" type="text" name="batchCode">


                <!--Login and SVG-->
                <div class="mt-5 sm:mt-0 sm:grid sm:grid-cols-3 sm:grid sm:gap-0 items-center mb-10 sm:mb-0 block">
                    <div class="align-middle text-center col-start-2">
                        <button type="submit" class="loginButton sm:h-1/5 sm:w-2/3" name="studentLogin"
                                id="studentLoginBtnID">Login
                        </button>
                    </div>
                    <div class="align-middle text-center hidden sm:inline-block">
                        <img src="../../Assets/Images/vectorFiles/User-Vector/man-with-umbralla.svg" alt="">
                    </div>
                </div>

            </form>
        </div>

        <!--        Teacher Authentication body-->
        <div class="teacherAuthentication px-5 pt-4 pb-4 <?php echo $teacherPanel; ?>" id="teacherAuthenticationPanel">
            <label class="login-container-label">Please login to continue</label>

            <form method="post">

                <!--                Username Portion-->
                <div class="mt-3 usernameSectionNormal usernameSectionMobile">
                    <i class="fa-1x w-1/2 text-center far fa-user"></i>

                    <div class="textField-label-content col-span-6" id="teacherUsernameDiv">
                        <label for="teacherUsername"></label>
                        <input class="textField" type="email" placeholder=" " id="teacherUsername"
                               name="teacherUsername" value="asif@fui.edu.pk">
                        <label class="textField-label">Email</label>
                    </div>
                </div>


                <div class="sm:grid sm:grid-cols-5">
                    <label class="text-red-900 text-center sm:col-start-2 sm:col-span-3 hidden"
                           id="teacherUsernameError"></label>
                </div>

                <!--                Password Portion-->

                <div class="mt-3 passwordSectionMobile passwordSectionNormal">
                    <i class="fas fa-lock fa-1x mt-3 w-1/2 text-center col-span-1"></i>
                    <div class="textField-label-content md:col-start-2 col-span-6" id="teacherPasswordDiv">

                        <label for="teacherPassword"></label>
                        <input class="textField" type="password" placeholder=" " id="teacherPassword"
                               name="teacherPassword" value="123456789">
                        <label class="textField-label">Password</label>

                        <!--  forgot section for Desktop-->
                        <div class="hidden md:inline-flex lg:inline-flex forgotPasswordNormal"
                             style="width: auto ; display: none">
                            <div class="verticalLine mr-2" style="width: auto"></div>
                            <a class="text-red-700" href="#">Forgot</a>
                        </div>

                    </div>
                </div>

                <!--                for Mobile View-->
                <div class="forgotPassword text-center  md:hidden lg:hidden" style="width: auto">
                    <a class="text-red-700" href="#">Forgot Password?</a>
                </div>
                <label class="text-red-900 text-center hidden" id="teacherPassError"></label>
                <label class="text-red-900 text-center <?php echo $teacherIncorrectPass; ?>" id="teacherIncorrectPass">Username
                    or password
                    is incorrect</label>

                <!--Login and SVG-->
                <div class="mt-5 sm:mt-0 sm:grid sm:grid-cols-3 sm:grid sm:gap-0 items-center mb-10 sm:mb-0 block">
                    <div class="align-middle text-center col-start-2">
                        <button type="submit" class="loginButton sm:h-1/5 sm:w-2/3" name="teacherLogin"
                                id="teacherLoginBtnID">Login
                        </button>
                    </div>
                    <div class="align-middle text-center hidden sm:inline-block">
                        <img class="h-48" src="../../Assets/Images/vectorFiles/User-Vector/man-with-umbralla.svg"
                             alt="">
                    </div>
                </div>

            </form>

        </div>

        <!--        Admin Authentication body-->
        <div class="adminAuthentication px-5 pt-4 pb-4 <?php echo $adminPanel; ?>" id="adminAuthenticationPanel">
            <label class="login-container-label">Please login to continue</label>

            <form method="post">

                <!--                Username Portion-->
                <div class="mt-3 usernameSectionMobile usernameSectionNormal">
                    <i class="fa-1x w-1/2 text-center far fa-user"></i>
                    <!--pm-se@fui.edu.pk-->
                    <!--ca-fa15a@fui.edu.pk-->
                    <!--hod-se@fui.edu.pk-->
                    <div class="textField-label-content col-span-6" id="adminUsernameDiv">
                        <input class="textField" type="email" value="ca-fa15a@fui.edu.pk" placeholder=" "
                               id="adminUsername"
                               name="adminUsername">
                        <label class="textField-label">Email</label>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-5">
                    <label class="text-red-900 text-center sm:col-start-2 sm:col-span-3 hidden"
                           id="adminUsernameError"></label>
                </div>


                <!--                Password Portion-->
                <div class="mt-3 passwordSectionMobile passwordSectionNormal">
                    <i class="fas fa-lock fa-1x mt-3 w-1/2 text-center col-span-1"></i>
                    <div class="textField-label-content md:col-start-2 col-span-6" id="adminPasswordDiv">

                        <input class="textField" type="password" placeholder=" " id="adminPassword"
                               name="adminPassword" value="EUMUwPfe11">
                        <label class="textField-label">Password</label>
                        <!--  forgot section for Desktop-->
                        <div class="hidden md:inline-flex lg:inline-flex forgotPasswordNormal"
                             style="width: auto ; display: none">
                            <div class="verticalLine mr-2" style="width: auto"></div>
                            <a class="text-red-700" href="#">Forgot</a>
                        </div>
                    </div>
                </div>
                <!--                for Mobile View-->
                <div class="forgotPassword text-center  md:hidden lg:hidden" style="width: auto">
                    <a class="text-red-700" href="#">Forgot Password?</a>
                </div>
                <label class="text-red-900 text-center hidden" id="adminPassError"></label>
                <label class="text-red-900 text-center hidden" id="adminIncorrectPass">Username or password
                    is incorrect</label>

                <!--Login and SVG-->
                <div class="mt-5 sm:mt-0 sm:grid sm:grid-cols-3 sm:grid sm:gap-0 items-center mb-10 sm:mb-0 block">
                    <div class="align-middle text-center col-start-2">
                        <button type="submit" class="loginButton sm:h-1/5 sm:w-2/3" name="adminLogin"
                                id="adminLoginBtnID">Login
                        </button>
                    </div>
                    <div class="align-middle text-center hidden sm:inline-block">
                        <img class="h-48" src="../../Assets/Images/vectorFiles/User-Vector/man-with-umbralla.svg"
                             alt="">
                    </div>
                </div>

            </form>

        </div>

        <div class="form-bottom-design rounded-b-full md:w-full lg:h-5 -mt-5">
            <div class="px-10 h-5 shadow-inner rounded-b-full  relative overflow-hidden flex flex-nowrap
             items-center justify-around md:w-4/6 lg:w-full">
                <div class="wave-card-shape absolute z-10 opacity-40"></div>
                <div class="wave-card-shape"></div>
                <div class="wave-card-shape"></div>
            </div>
        </div>
    </div>
</main>


<footer class="footer-section bg-catalystBlue-l2 shadow-2xl max-h-full">
    <div class="px-5 py-2 mx-auto flex items-center sm:flex-row flex-col sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">

        <p class="hidden sm:block text-sm text-white sm:ml-4 sm:pl-4 sm:py-2 sm:mt-0 mt-4">© 2021 Catalyst Provider —
            <a href="" class="text-white ml-1" rel="noopener noreferrer" target="_blank">All rights reserved.</a>
        </p>

        <span class="inline-flex sm:ml-auto sm:mt-0 mt-0">
              <a class="text-white">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                     viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="ml-3 text-white">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                     viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="ml-3 text-white">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     class="w-5 h-5" viewBox="0 0 24 24">
                  <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                </svg>
              </a>
              <a class="ml-3 text-white">
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                     stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                  <path stroke="none"
                        d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                  <circle cx="4" cy="4" r="2" stroke="none"></circle>
                </svg>
              </a>
        </span>

    </div>

</footer>
</body>
<script>
    $(document).ready(function () {
        var listOfBatches = '<?php echo json_encode($listOfBatches);?>';
        listOfBatches = JSON.parse(listOfBatches);

        //Setting programs to show on batch selection
        $('#batch').on('change', function () {
            var listOfPrograms = <?php echo json_encode($listOfPrograms);?>;
            var selectedBatch = $(this).val();

            var options = '<option value="" hidden></option>';

            var programsBeingShown = [];
            for (let i = 0; i < listOfBatches.length; i++) {
                if (selectedBatch == listOfBatches[i]["batchName"]) {

                    if (!programsBeingShown.includes(listOfPrograms[i]["programName"])) {
                        options += '<option value="' + listOfPrograms[i]["programName"] + '">' + listOfPrograms[i]["programName"] + '</option>'
                        programsBeingShown.push(listOfPrograms[i]["programName"])
                    }
                }
            }
            //setting value in the hidden input for batch code
            $('input[name="batchCode"]').val($('option:selected', this).attr('batchCode'))
            $('#program').html(options)
        })


        /*Setting values of hidden batchCode and programCode fields*/
        $('#program').on('change', function () {
            var listOfPrograms = <?php echo json_encode($listOfPrograms);?>;

            var selectedProgram = $('#program').val();
            for (let i = 0; i < listOfPrograms.length; i++) {
                if (selectedProgram == listOfPrograms[i]["programName"]) {
                    $('input[name="programCode"]').val(listOfPrograms[i]["programCode"])
                    break;
                }
            }
            console.log($('input[name="programCode"]').val())
            console.log($('input[name="batchCode"]').val())
        })

    })
</script>
</html>