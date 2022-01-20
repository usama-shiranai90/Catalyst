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
                success: function (d1 , d2 ,d3 , d4) {
                    // console.log("getting data from AJAX d1:", d1)
                    // console.log("getting data from AJAX d2:", d2)
                    // console.log("getting data from AJAX d3:", d3)
                    // console.log("getting data from AJAX d4:", d4)
                    clearAllStorage();
                    location.href = "courseprofile_view.php";
                }
            });
        }

    } else {
        location.href = "weekly_cover_topics.php";
    }