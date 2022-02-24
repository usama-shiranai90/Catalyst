/*Script would load when the whole page it is associated to is loaded along with its contents*/
window.onload = function () {

    const registeredCourseSectionID = document.getElementById('registerCourseDivID'); // course list section.


    /*jQuery*/
    $(document).ready(function () {
        fetchCurrentCourseInformation(registeredCourseSectionID);

    });

    function fetchCurrentCourseInformation(registeredCourseSectionID) {

    }
}