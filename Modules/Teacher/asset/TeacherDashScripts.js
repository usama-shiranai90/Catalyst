/*Script would load when the whole page it is associated to is loaded along with its contents*/
// window.onload = function () {


/*jQuery*/
$(document).ready(function () {

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

    $("#switchToCourseSummary").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='ClassActivities/Sessional/sessionalDashboard.php' style='width: 100%'></iframe>");
        $("#teacherPanelTitleID").text("Course Summary")
        document.title = "Catalyst | Course Summary";
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
});


function iframeContainUpdate(text, extraText) {
    $('#teacherPanelTitleID', parent.document).text(text);
    // $('#teacherPanelTitleID', parent.document.title).text(extraText)
}

// }
