/*Script would load when the whole page it is associated to is loaded along with its contents*/
// window.onload = function () {

$(document).ready(function () {

    /** Student Panel Section */
    $("#studentDashboardID").click(function () {
        $("#studentMainContent").html("<iframe class='h-full block' src='../Student/Dashboard.php' style='width: 100%'></iframe>");
        $("#studentPanelTitleID").text("Dashboard")
        document.title = "Catalyst | Dashboard";
    })
    $("#studentProgressID").click(function () {
        $("#studentMainContent").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");
        $("#studentPanelTitleID").text("Student Progress")
        document.title = "Catalyst | Student Progress";
    })
    $("#switchToOBETranscriptId").click(function () {
        $("#studentMainContent").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");
        $("#studentPanelTitleID").text("OBE Transcript")
        document.title = "Catalyst | OBE Transcript";
    })
    $("#switchToGPATranscriptId").click(function () {
        $("#studentMainContent").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");
        $("#studentPanelTitleID").text("GPA Transcript")
        document.title = "Catalyst | GPA Transcript";
    })
    $("#viewStuProfileID").click(function () {
        $("#studentMainContent").html("<iframe class='h-full block' src='../Student/StudentProfile.php' style='width: 100%'></iframe>");
        $("#studentPanelTitleID").text("Setting")
        document.title = "Catalyst | Setting";
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
    $("#assignRoleID").click(function () {
        $("#headOfDepMainContent").html("<iframe class='h-full block' src='ManageRole/assignRole.php' style='width: 100%'></iframe>");
    });
    $("#viewRoleID").click(function () {
        $("#headOfDepMainContent").html("<iframe class='h-full block' src='ManageRole/viewRole.php' style='width: 100%'></iframe>");
    })

    /** Program Manager Section. */
    $("#academicIssueTrackerID").click(function () {
        $("#programManagerMainContent").html("<iframe class='h-full block' src='' style='width: 100%'></iframe>");
        $("#teacherPanelTitleID").text("Dashboard")
        document.title = "Catalyst | Dashboard";
    })
    $("#createCurriculumID").click(function () {
        $("#programManagerMainContent").html("<iframe class='h-full block' src='ManageCurriculum/createCurriculum.php' style='width: 100%'></iframe>");
        $("#teacherPanelTitleID").text("Curriculum Creation")
        document.title = "Catalyst | Curriculum Creation";
    })
    $("#viewCurriculumID").click(function () {
        $("#programManagerMainContent").html("<iframe class='h-full block' src='ManageCurriculum/manageCurriculum.php' style='width: 100%'></iframe>");
        $("#teacherPanelTitleID").text("Curriculum View")
        document.title = "Catalyst | Curriculum View";
    })

});

function iframeContainUpdate(text, extraText) {
    $('#teacherPanelTitleID', parent.document).text(text);
    // $('#teacherPanelTitleID', parent.document.title).text(extraText)
}

// }
