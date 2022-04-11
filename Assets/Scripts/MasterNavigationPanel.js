/*Script would load when the whole page it is associated to is loaded along with its contents*/
// window.onload = function () {

$(document).ready(function () {

    /** Student Panel Section */
    $("#studentDashboardID").click(function () {
        $("#studentMainContent").html("<iframe class='h-full block' src='../Student/Dashboard.php' style='width: 100%'></iframe>");
        updateIframeWithPanelTitle($("#studentPanelTitleID"), "Dashboard", "Catalyst | Dashboard");
    })
    $("#studentProgressID").click(function () {
        $("#studentMainContent").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");
        updateIframeWithPanelTitle($("#studentPanelTitleID"), "Student Progress", "Catalyst | Student Progress");
    })
    $("#switchToOBETranscriptId").click(function () {
        $("#studentMainContent").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");
        updateIframeWithPanelTitle($("#studentPanelTitleID"), "OBE Transcript", "Catalyst | OBE Transcript");
    })
    $("#switchToGPATranscriptId").click(function () {
        $("#studentMainContent").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");
        updateIframeWithPanelTitle($("#studentPanelTitleID"), "GPA Transcript", "Catalyst | GPA Transcript");
    })
    $("#viewStuProfileID").click(function () {
        $("#studentMainContent").html("<iframe class='h-full block' src='../Student/StudentProfile.php' style='width: 100%'></iframe>");
        updateIframeWithPanelTitle($("#studentPanelTitleID"), "Setting", "Catalyst | Setting");
    })


    /** Teacher Section. */
    //Loading teacher's dashboard
    // $("#teacherDashboardID").click(function () {
    //     $("#teacherMainContent").html("<iframe class='h-full block' src='ClassActivities/FinalExam/finalExamDashboard.php' style='width: 100%'></iframe>");
    // })
    $("#switchToDashboard").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='Dashboard/dashboard.php' style='width: 100%'></iframe>");
        $("#teacherPanelTitleID").text("Dashboard")
        document.title = "Catalyst | Dashboard";
    })
    $("#switchTocourseProfile").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='CourseProfile/courseprofile_main.php' style='width: 100%'></iframe>");
        $("#teacherPanelTitleID").text("Course Profile Creation")
        document.title = "Catalyst | Course Profile Creation";
    })
    $("#switchToWeeklyTopic").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='CourseProfile/weeklyTopics.php' style='width: 100%'></iframe>");
        $("#teacherPanelTitleID").text("Weekly Covered Topic")
        document.title = "Catalyst | Weekly Topics";
    })
    $("#switchToStudentCourseProgress").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='Progress/index.php' style='width: 100%'></iframe>");
        $("#teacherPanelTitleID").text("Student Progress")
        document.title = "Catalyst | Student Progress";
    })
    $("#switchToSessional").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='ClassActivities/Sessional/sessionalDashboard.php' style='width: 100%'></iframe>");

        $("#teacherPanelTitleID").text("Sessional")

        document.title = "Catalyst - Sessional Dashboard";
    })
    $("#switchToMidterm").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='ClassActivities/MidTerm/midtermDashboard.php' style='width: 100%'></iframe>");

        $("#teacherPanelTitleID").text("Mid Term")

        document.title = "Catalyst - Midterm Dashboard";
    })
    $("#switchToFinalExam").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='ClassActivities/FinalExam/finalExamDashboard.php' style='width: 100%'></iframe>");
        $("#teacherPanelTitleID").text("Final Exam")
        document.title = "Catalyst - Final Exam Dashboard";
    })
    $("#viewProfileID").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='ViewTeacherProfile.php' style='width: 100%'></iframe>");
    })
    $("#classFromSidePanel").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='CourseSelector.php' style='width: 100%'></iframe>");
        $("#teacherPanelTitleID").text("Dashboard")

        document.title = "Catalyst - Select Class";
    })


    /** Head Of Department Section. */
    $("#hodacademicIssueTrackerID").click(function () {
        $("#headOfDepMainContentId").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");
    });
    $("#assignRoleID").click(function () {
        $("#headOfDepMainContentId").html("<iframe class='h-full block' src='ManageRole/assignRole.php' style='width: 100%'></iframe>");
        updateIframeWithPanelTitle($("#HodPanelTitleID"), "Admin Assign Role", "Catalyst | Assign Role");
    });
    $("#viewRoleID").click(function () {
        $("#headOfDepMainContentId").html("<iframe class='h-full block' src='ManageRole/viewRole.php' style='width: 100%'></iframe>");
        updateIframeWithPanelTitle($("#HodPanelTitleID"), "Admin View Role", "Catalyst | View Role");
    })
    $("#facultyManagementID").click(function () {
        $("#headOfDepMainContentId").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");

        updateIframeWithPanelTitle($("#HodPanelTitleID"), "Faculty Management", "Catalyst | Faculty Management");
    });


    /** Program Manager Section. */
    $("#academicIssueTrackerID").click(function () {
        $("#programManagerMainContent").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");
        updateIframeWithPanelTitle($("#teacherPanelTitleID"), "Dashboard", "Catalyst | Dashboard");
    })
    $("#createCurriculumID").click(function () {
        $("#programManagerMainContent").html("<iframe class='h-full block' src='ManageCurriculum/createCurriculum.php' style='width: 100%'></iframe>");
        updateIframeWithPanelTitle($("#teacherPanelTitleID"), "Curriculum Creation", "Catalyst | Curriculum Creation");
    })
    $("#viewCurriculumID").click(function () {
        $("#programManagerMainContent").html("<iframe class='h-full block' src='ManageCurriculum/manageCurriculum.php' style='width: 100%'></iframe>");
        updateIframeWithPanelTitle($("#teacherPanelTitleID"), "Curriculum View", "Catalyst | Curriculum View");
    });


    // $("#importAllocationCourseID").click(function () {$("#programManagerMainContent").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");updateIframeWithPanelTitle($("#teacherPanelTitleID"), "Course Offering Import", "Catalyst | Course Allocation Import");});
    $("#importOfferAndAllocationCourseID").click(function () {
        $("#programManagerMainContent").html("<iframe class='h-full block' src='ManageCourseOffering/importOffering.php' style='width: 100%'></iframe>");
        updateIframeWithPanelTitle($("#teacherPanelTitleID"), "Course Offering & Allocation Import", "Catalyst | Course Offering Import");
    });

    $("#viewCourseDetailId").click(function () {
        $("#programManagerMainContent").html("<iframe class='h-full block' src='ManageCourseOffering/viewOfferedCourses.php' style='width: 100%'></iframe>");
        updateIframeWithPanelTitle($("#teacherPanelTitleID"), "View Offered Courses", "Catalyst | View Offered Courses");
    });

    /** Course Advisor. */
    $("#caAcademicIssueTrackerID").click(function () {
        $("#caMainContentId").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");
        updateIframeWithPanelTitle($("#CaPanelTitleID"), "Dashboard", "Catalyst | Academic Issue Tracker");
    })

});

function updateIframeWithPanelTitle(titleContainerId, titleText, documentTitleText) {
    $(titleContainerId).text(titleText)
    document.title = documentTitleText;
}


function iframeContainUpdate(text, extraText) {
    $('#teacherPanelTitleID', parent.document).text(text);
    // $('#teacherPanelTitleID', parent.document.title).text(extraText)
}

// }
