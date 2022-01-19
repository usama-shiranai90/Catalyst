 if (hasPLOs) {
        console.log(ploArray.length)
        console.log(ploArray[0][0])

        function creationAjaxCall(arrayCLO, arrayMapping, courseEssentialFieldValue, courseDetailFieldValue) {

            $.ajax({
                type: "POST",
                url: 'phpcode/CourseProfile.php',
                data: {
                    arrayCLO: arrayCLO, arrayMapping: (arrayMapping),
                    courseEssentialFieldValue: courseEssentialFieldValue, courseDetailFieldValue: courseDetailFieldValue
                },
                success: function (data) {
                    // clearAllStorage();
                    // setLocalStorage("courseCLO_key", arrayCLO)
                    // setLocalStorage("courseMap_key", arrayMapping)
                    // console.log("getting data from AJAX :", data)
                    location.href = "courseprofile_view.php";
                }
            });
        }

    } else {
        location.href = "weekly_cover_topics.php";
    }