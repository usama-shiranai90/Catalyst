<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
session_start();

$adminCode = $_SESSION['adminCode'];

if ( is_array($_SESSION['departmentCode']) && sizeof($_SESSION['departmentCode']) > 1) {
    $_SESSION['departmentName'] = $_SESSION['departmentCode'][1];
    $_SESSION['departmentCode'] = $_SESSION['departmentCode'][0];
}

$admin = unserialize($_SESSION['adminInstance']);
$personalDetails = $admin->getInstance();
//echo json_encode($personalDetails);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher</title>
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="../../Assets/Frameworks/jQuery/jquery.min.js" type="text/javascript"></script>
    <script src="../../Assets/Scripts/Master.js" rel="script"></script>
    <script src="../../Assets/Scripts/MasterNavigationPanel.js" rel="script"></script>
</head>

<body>

<header class="text-center text-4xl p-2 pl-48">
    <label id="HodPanelTitleID">Dashboard</label>
    <div class="profilePictureDiv" id="viewProfileID">
        <div class="flex">
            <a href="#" name="viewTeacherProfile" class="cursor-pointer flex">
                <img src="/Assets/Images/profilePicAvatar.jpg" width="40">
                <div class="flex flex-col text-xs pl-4 pt-1 cursor-pointer">
                    <div><?php echo $personalDetails['name'] ?></div>
                    <hr class="w-full">
                    <div><?php echo $personalDetails['facultyCode'] ?></div>
                </div>
            </a>
        </div>
    </div>
</header>


<div class="wrapper" style="height: 90vh">
    <div class="w-48 sidePanel p-2">
        <div class="logo">
            <svg width="171" height="42" viewBox="0 0 141 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_2_2)">
                    <path d="M51.4237 22.8998C50.2147 22.8998 49.1767 22.6424 48.3099 22.1275C47.4431 21.6012 46.7758 20.8746 46.3082 19.9478C45.8405 19.0095 45.6067 17.9282 45.6067 16.7039C45.6067 15.4796 45.8405 14.3983 46.3082 13.46C46.7758 12.5218 47.4431 11.7895 48.3099 11.2631C49.1767 10.7368 50.2147 10.4736 51.4237 10.4736C52.8608 10.4736 54.0356 10.8341 54.9481 11.5549C55.872 12.2644 56.448 13.2655 56.6761 14.5585H54.2638C54.1155 13.9063 53.7961 13.3971 53.3057 13.031C52.8266 12.6534 52.1879 12.4646 51.3895 12.4646C50.2831 12.4646 49.4163 12.8422 48.789 13.5973C48.1616 14.3525 47.848 15.3881 47.848 16.7039C47.848 18.0197 48.1616 19.0553 48.789 19.8104C49.4163 20.5542 50.2831 20.9261 51.3895 20.9261C52.1879 20.9261 52.8266 20.7544 53.3057 20.4112C53.7961 20.0565 54.1155 19.5702 54.2638 18.9523H56.6761C56.448 20.188 55.872 21.1549 54.9481 21.8529C54.0356 22.5508 52.8608 22.8998 51.4237 22.8998ZM58.5498 22.6939L62.9297 10.6796H65.3933L69.7732 22.6939H67.4464L66.4883 19.9134H61.8176L60.8424 22.6939H58.5498ZM62.4164 18.1971H65.8895L64.1444 13.2026L62.4164 18.1971ZM73.6905 22.6939V12.4474H70.2003V10.6796H79.3877V12.4474H75.8804V22.6939H73.6905ZM79.8255 22.6939L84.2053 10.6796H86.669L91.0488 22.6939H88.722L87.7639 19.9134H83.0932L82.118 22.6939H79.8255ZM83.6921 18.1971H87.1651L85.42 13.2026L83.6921 18.1971ZM93.447 22.6939V10.6796H95.6369V20.9776H100.941V22.6939H93.447ZM105.118 22.6939V18.4202L101.098 10.6796H103.578L106.23 16.2233L108.865 10.6796H111.312L107.308 18.4202V22.6939H105.118ZM116.974 22.8998C116.096 22.8998 115.32 22.7511 114.647 22.4536C113.974 22.1447 113.444 21.7098 113.056 21.1492C112.668 20.5771 112.468 19.8848 112.457 19.0724H114.767C114.79 19.6331 114.989 20.108 115.366 20.497C115.753 20.8746 116.284 21.0634 116.957 21.0634C117.539 21.0634 118 20.9261 118.343 20.6514C118.685 20.3654 118.856 19.9878 118.856 19.5187C118.856 19.0267 118.702 18.6433 118.394 18.3687C118.097 18.0941 117.698 17.871 117.196 17.6994C116.694 17.5277 116.159 17.3447 115.588 17.1501C114.664 16.8298 113.957 16.4179 113.467 15.9144C112.988 15.4109 112.748 14.7415 112.748 13.9063C112.737 13.1969 112.902 12.5905 113.244 12.087C113.598 11.5721 114.077 11.1773 114.681 10.9027C115.286 10.6167 115.982 10.4736 116.769 10.4736C117.567 10.4736 118.268 10.6167 118.873 10.9027C119.489 11.1887 119.968 11.5892 120.31 12.1041C120.664 12.619 120.852 13.2312 120.875 13.9406H118.531C118.52 13.5173 118.354 13.1454 118.035 12.825C117.727 12.4932 117.293 12.3273 116.734 12.3273C116.255 12.3158 115.851 12.436 115.52 12.6877C115.201 12.928 115.041 13.2827 115.041 13.7518C115.041 14.1523 115.166 14.4727 115.417 14.713C115.668 14.9418 116.01 15.1363 116.444 15.2965C116.877 15.4567 117.373 15.6284 117.932 15.8114C118.525 16.0174 119.067 16.2577 119.557 16.5323C120.048 16.8069 120.441 17.173 120.738 17.6307C121.035 18.077 121.183 18.6548 121.183 19.3642C121.183 19.9935 121.023 20.5771 120.704 21.1149C120.385 21.6527 119.911 22.0874 119.284 22.4193C118.657 22.7396 117.887 22.8998 116.974 22.8998ZM126.587 22.6939V12.4474H123.097V10.6796H132.285V12.4474H128.777V22.6939H126.587Z"
                          fill="white"/>
                    <g filter="url(#filter0_d_2_2)">
                        <path d="M20.8305 23.1894C22.0067 22.5707 23.4097 22.5658 24.5902 23.1763L28.6699 25.2865C31.6132 26.8089 31.6132 31.0307 28.6699 32.553L24.5902 34.6631C23.4097 35.2737 22.0067 35.2688 20.8305 34.65L16.8193 32.5399C13.9095 31.0091 13.9095 26.8303 16.8193 25.2996L20.8305 23.1894Z"
                              fill="#3F3232" fill-opacity="0.03"/>
                    </g>
                    <path d="M21.0332 14.3384C22.0385 13.7419 23.2867 13.7373 24.2964 14.3263L35.0177 20.5808C37.1563 21.8284 37.1563 24.9271 35.0177 26.1747L24.2964 32.4292C23.2867 33.0182 22.0385 33.0136 21.0332 32.4171L10.492 26.1626C8.38088 24.91 8.38088 21.8455 10.492 20.5929L21.0332 14.3384Z"
                          stroke="url(#paint0_linear_2_2)" stroke-width="2.88" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path opacity="0.154418"
                          d="M8.67517 14.0151C8.67517 9.06057 11.2943 4.44998 15.5267 1.89644C19.9861 -0.794046 25.6 -0.791324 30.0378 1.93485C34.1795 4.4791 36.7046 9.00061 36.7046 13.8726V14.868C36.7046 19.8073 34.1094 24.3809 29.8759 26.9028C25.5187 29.4983 20.0691 29.5011 15.6916 26.94C11.3663 24.4095 8.67517 19.7462 8.67517 14.7231V14.0151Z"
                          fill="url(#paint1_linear_2_2)"/>
                    <path d="M9.93771 14.0662C9.93771 9.54137 12.3204 5.35318 16.2038 3.05176C20.2048 0.680744 25.1747 0.680744 29.1758 3.05176C33.0592 5.35318 35.4419 9.54137 35.4419 14.0662V14.5784C35.4419 19.1032 33.0592 23.2915 29.1758 25.5928C25.1747 27.9639 20.2048 27.9639 16.2038 25.5928C12.3204 23.2915 9.93771 19.1032 9.93771 14.5784V14.0662Z"
                          fill="url(#paint2_linear_2_2)"/>
                    <path d="M22.5631 21.7479C22.5631 16.7163 25.4146 12.1223 29.9157 9.90233L30.3929 9.66695C32.7206 8.51891 35.4415 10.2185 35.4415 12.8206V16.0991C35.4415 19.7616 33.5174 23.1531 30.3784 25.0234L29.3613 25.6294C26.3616 27.4168 22.5631 25.2481 22.5631 21.7479Z"
                          fill="url(#paint3_linear_2_2)"/>
                    <path d="M9.93771 12.5733C9.93771 9.96785 12.6699 8.27259 14.9937 9.43614C19.7346 11.8102 22.7303 16.6689 22.7303 21.9846V26.5332C22.7303 26.5332 22.7413 27.5464 22.9679 27.8874C23.1622 28.1797 23.34 28.2704 23.5736 28.403C23.8072 28.5356 24.3231 28.6378 24.3231 28.6378C23.3373 29.185 22.1356 29.1634 21.17 28.5813L15.1805 24.9702C11.9275 23.009 9.93771 19.4804 9.93771 15.6731V12.5733Z"
                          fill="url(#paint4_linear_2_2)"/>
                    <path d="M29.0256 14.5232V15.9021H30.5241V16.346H29.0256V17.7664H30.7011V18.2103H28.4887V14.0793H30.7011V14.5232H29.0256Z"
                          fill="white"/>
                    <path d="M16.1512 16.0856C16.3007 16.1093 16.4364 16.1704 16.5583 16.2691C16.6841 16.3677 16.7825 16.49 16.8533 16.636C16.928 16.782 16.9654 16.9379 16.9654 17.1036C16.9654 17.3127 16.9123 17.5021 16.8061 17.6717C16.6999 17.8375 16.5446 17.9696 16.34 18.0683C16.1394 18.163 15.9015 18.2103 15.6262 18.2103H14.0923V14.0852H15.5672C15.8464 14.0852 16.0844 14.1326 16.281 14.2272C16.4777 14.318 16.6252 14.4423 16.7235 14.6001C16.8218 14.7579 16.871 14.9355 16.871 15.1328C16.871 15.3774 16.8041 15.5806 16.6704 15.7423C16.5406 15.9002 16.3676 16.0146 16.1512 16.0856ZM14.6291 15.8666H15.5318C15.7835 15.8666 15.9782 15.8074 16.1158 15.6891C16.2535 15.5707 16.3223 15.407 16.3223 15.1979C16.3223 14.9888 16.2535 14.825 16.1158 14.7066C15.9782 14.5883 15.7796 14.5291 15.52 14.5291H14.6291V15.8666ZM15.579 17.7664C15.8464 17.7664 16.0549 17.7033 16.2043 17.577C16.3538 17.4508 16.4285 17.2752 16.4285 17.0503C16.4285 16.8214 16.3499 16.6419 16.1925 16.5117C16.0352 16.3776 15.8248 16.3105 15.5613 16.3105H14.6291V17.7664H15.579Z"
                          fill="white"/>
                    <path d="M22.4965 10.0913C22.115 10.0913 21.7669 10.0025 21.4523 9.82498C21.1377 9.64346 20.8879 9.39294 20.7031 9.07334C20.5221 8.74979 20.4317 8.38681 20.4317 7.98437C20.4317 7.58192 20.5221 7.2209 20.7031 6.90131C20.8879 6.57775 21.1377 6.32722 21.4523 6.14967C21.7669 5.96816 22.115 5.87743 22.4965 5.87743C22.8819 5.87743 23.232 5.96816 23.5466 6.14967C23.8613 6.32722 24.1091 6.57579 24.29 6.89539C24.4709 7.21498 24.5614 7.57795 24.5614 7.98437C24.5614 8.39078 24.4709 8.75375 24.29 9.07334C24.1091 9.39294 23.8613 9.64346 23.5466 9.82498C23.232 10.0025 22.8819 10.0913 22.4965 10.0913ZM22.4965 9.62375C22.7837 9.62375 23.0412 9.5567 23.2694 9.42253C23.5014 9.28836 23.6823 9.09702 23.8121 8.84845C23.9459 8.59987 24.0127 8.31183 24.0127 7.98437C24.0127 7.65294 23.9459 7.36489 23.8121 7.12028C23.6823 6.87171 23.5034 6.68037 23.2753 6.5462C23.0471 6.41203 22.7876 6.34498 22.4965 6.34498C22.2055 6.34498 21.9459 6.41203 21.7178 6.5462C21.4896 6.68037 21.3088 6.87171 21.175 7.12028C21.0452 7.36489 20.9803 7.65294 20.9803 7.98437C20.9803 8.31183 21.0452 8.59987 21.175 8.84845C21.3088 9.09702 21.4896 9.28836 21.7178 9.42253C21.9498 9.5567 22.2094 9.62375 22.4965 9.62375Z"
                          fill="white"/>
                </g>
                <defs>
                    <filter id="filter0_d_2_2" x="-95.363" y="-87.2781" width="236.24" height="232.396"
                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                       result="hardAlpha"/>
                        <feOffset/>
                        <feGaussianBlur stdDeviation="55"/>
                        <feColorMatrix type="matrix"
                                       values="0 0 0 0 0.207843 0 0 0 0 0.407843 0 0 0 0 0.831373 0 0 0 0.4 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2_2"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2_2" result="shape"/>
                    </filter>
                    <linearGradient id="paint0_linear_2_2" x1="-9.37886" y1="19.175" x2="0.372125" y2="46.0072"
                                    gradientUnits="userSpaceOnUse">
                        <stop stop-color="white"/>
                        <stop offset="1" stop-color="#168DFA"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_2_2" x1="8.67517" y1="-2.16326" x2="8.67517" y2="30.7888"
                                    gradientUnits="userSpaceOnUse">
                        <stop stop-color="#E8F0FF"/>
                        <stop offset="1" stop-color="#3E7BFA"/>
                    </linearGradient>
                    <linearGradient id="paint2_linear_2_2" x1="21.2503" y1="-4.48226" x2="10.0903" y2="8.64424"
                                    gradientUnits="userSpaceOnUse">
                        <stop stop-color="#6F9EFE"/>
                        <stop offset="1" stop-color="#5990FF"/>
                    </linearGradient>
                    <linearGradient id="paint3_linear_2_2" x1="20.8133" y1="-0.671424" x2="20.8133" y2="25.6141"
                                    gradientUnits="userSpaceOnUse">
                        <stop stop-color="#6698FF"/>
                        <stop offset="1" stop-color="#3E7BFA"/>
                    </linearGradient>
                    <linearGradient id="paint4_linear_2_2" x1="10.1625" y1="9.61351" x2="10.1625" y2="28.3564"
                                    gradientUnits="userSpaceOnUse">
                        <stop stop-color="#0556FF" stop-opacity="0.39"/>
                        <stop offset="1" stop-color="#6A9BFE"/>
                    </linearGradient>
                    <clipPath id="clip0_2_2">
                        <rect width="141" height="35" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
        </div>

        <!--        Navigation items start-->

        <div class="mt-5 relative h-full">

            <div class="navigationItem" id="hodacademicIssueTrackerID">
                <svg width="25" height="22" viewBox="0 0 28 22" style="padding-left: 2px" class="turnItWhite"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M25.25 0H2.75C1.375 0 0.25 1.125 0.25 2.5V18.75C0.25 20.125 1.375 21.25 2.75 21.25H25.25C26.625 21.25 27.75 20.125 27.75 18.75V2.5C27.75 1.125 26.625 0 25.25 0ZM2.75 18.75V2.5H12.75V18.75H2.75ZM25.25 18.75H15.25V2.5H25.25V18.75ZM16.5 6.875H24V8.75H16.5V6.875ZM16.5 10H24V11.875H16.5V10ZM16.5 13.125H24V15H16.5V13.125Z"/>
                </svg>
                <label class="pl-3">Academic Issue Tracker</label>
            </div>

            <!--            Admin Management-->
            <div class="navigationItemDropdown" id="adminManagementID">
                <div class="flex justify-between items-center navDropBox" id="teacherClassActivitiesDropBox">
                    <div class="flex items-center">
                        <div>
                            <svg width="25" height="25" viewBox="0 0 30 30"
                                 xmlns="http://www.w3.org/2000/svg" class="turnItWhite">
                                <path d="M23.75 6.25V23.75H6.25V6.25H23.75ZM23.75 3.75H6.25C4.875 3.75 3.75 4.875 3.75 6.25V23.75C3.75 25.125 4.875 26.25 6.25 26.25H23.75C25.125 26.25 26.25 25.125 26.25 23.75V6.25C26.25 4.875 25.125 3.75 23.75 3.75Z"/>
                                <path d="M17.5 21.25H8.75V18.75H17.5V21.25ZM21.25 16.25H8.75V13.75H21.25V16.25ZM21.25 11.25H8.75V8.75H21.25V11.25Z"/>
                            </svg>
                        </div>
                        <label class="pl-3">Admin Management</label>
                    </div>

                    <img class="sidePanelNavigationItemDropdownIcon rotate"
                         src="../../Assets/Images/vectorFiles/Icons/chevron-down.svg">
                </div>
                <div class="menu menuClosed dropdownNavigationItemMenu" id="dropdownNavigationItemMenu">
                    <div class="menuItem" id="assignRoleID">Assign Role</div>
                    <div class="menuItem" id="viewRoleID">View Role</div>
                </div>
            </div>
            <!--            Faculty Management-->
            <div class="navigationItem pr-5" id="facultyManagementID">
                <svg width="25" height="25" viewBox="0 0 30 30"
                     xmlns="http://www.w3.org/2000/svg" class="turnItWhite">
                    <path d="M23.75 6.25V23.75H6.25V6.25H23.75ZM23.75 3.75H6.25C4.875 3.75 3.75 4.875 3.75 6.25V23.75C3.75 25.125 4.875 26.25 6.25 26.25H23.75C25.125 26.25 26.25 25.125 26.25 23.75V6.25C26.25 4.875 25.125 3.75 23.75 3.75Z"/>
                    <path d="M17.5 21.25H8.75V18.75H17.5V21.25ZM21.25 16.25H8.75V13.75H21.25V16.25ZM21.25 11.25H8.75V8.75H21.25V11.25Z"/>
                </svg>
                <label class="pl-3">Faculty Management</label>
            </div>

            <!--            Logout-->
            <div class="flex justify-center w-full bottom-3 absolute">
                <div class="logout rounded-md bg-white w-2/3 p-0.5 cursor-pointer" id="logout">
                    <svg class="inline-block" width="25" height="25" viewBox="0 0 30 31" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.75 20.5L8.75 15.5M8.75 15.5L13.75 10.5M8.75 15.5H26.25M20 20.5V21.75C20 22.7446 19.6049 23.6984 18.9017 24.4017C18.1984 25.1049 17.2446 25.5 16.25 25.5H7.5C6.50544 25.5 5.55161 25.1049 4.84835 24.4017C4.14509 23.6984 3.75 22.7446 3.75 21.75V9.25C3.75 8.25544 4.14509 7.30161 4.84835 6.59835C5.55161 5.89509 6.50544 5.5 7.5 5.5H16.25C17.2446 5.5 18.1984 5.89509 18.9017 6.59835C19.6049 7.30161 20 8.25544 20 9.25V10.5"
                              stroke="#01409B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <label class="pl-3 inline-block cursor-pointer" style="color: #01409B">Logout</label>
                </div>
            </div>
        </div>
    </div>
    <div class="ml-48 w-full h-full" id="headOfDepMainContentId">
        <!--        Pages to load go here through scripts-->
        <iframe class="h-full" src="headOfDepDashboard.php" style="width: 100%"></iframe>
    </div>
</div>
</body>

</html>
