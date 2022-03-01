/*Script would load when the whole page it is associated to is loaded along with its contents*/
// window.onload = function () {


/*jQuery*/
$(document).ready(function () {

    $("#studentDashboardID").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='../Student/Dashboard.php' style='width: 100%'></iframe>");
        $("#teacherPanelTitleID").text("Dashboard")
        document.title = "Catalyst | Dashboard";
    })


    $("#studentProgressID").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");
        $("#teacherPanelTitleID").text("Course Profile Creation")
        document.title = "Catalyst | Course Profile Creation";
    })


    $("#switchToOBETranscript").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");
        $("#teacherPanelTitleID").text("Weekly Covered Topic")
        document.title = "Catalyst | Weekly Topics";
    })

    $("#switchToGPATranscript").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");
        $("#teacherPanelTitleID").text("Student Progress")
        document.title = "Catalyst | Student Progress";
    })


    $("#viewStuProfileID").click(function () {
        $("#teacherMainContent").html("<iframe class='h-full block' src='../Student/StudentProfile.php' style='width: 100%'></iframe>");

        $("#teacherPanelTitleID").text("Sessional")

        document.title = "Catalyst - Sessional Dashboard";
    })


});

