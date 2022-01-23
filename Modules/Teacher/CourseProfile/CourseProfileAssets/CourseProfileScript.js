if (hasPLOs !== 0) {
    console.log(ploArray.length)
    console.log(ploArray[0][1])

    function creationAjaxCall(arrayCLO, arrayMapping, courseEssentialFieldValue, courseDetailFieldValue) {

        console.log("Essential", courseEssentialFieldValue)
        console.log("detail", courseDetailFieldValue)
        console.log("clo", arrayCLO)
        console.log("mapping", arrayMapping)

        $.ajax({
            type: "POST",
            dataType: "json",
            // url: '../../../../Backend/Packages/CourseProfile/CourseProfile.php?p=saved',
            url: 'courseprofile.php?p=saved',
            data: {
                arrayCLO: arrayCLO, arrayMapping: (arrayMapping),
                courseEssentialFieldValue: courseEssentialFieldValue, courseDetailFieldValue: courseDetailFieldValue
            },
            success: function (data, textStatus) {
                clearAllStorage();
                console.log("getting data from AJAX d1:", data)
                console.log("getting data from:", textStatus)
                location.href = "courseprofile_view.php";
            }
        });
    }

} else {
    location.href = "weeklyTopics.php";
}