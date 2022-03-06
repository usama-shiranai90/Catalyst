let randomPassword;

window.onload = function () {
    const generateRandBtn = document.getElementById('roleCreationPasswordGeneratorID');

    const designationField = document.getElementById('froleDesignationID');
    const facultyBindField = document.getElementById('f_role_facultyID');
    const facultyNameBindField = document.getElementById('froleFacultyNameID');

    const roleCreationForm = document.getElementsByClassName("flex flex-col overflow-hidden");

    let test = 0;
    $(document).ready(function () {
        /** click to hide view section and show input section according to Role Creation */
        $("input[type=radio]").on('click', function (e) {
            e.stopPropagation();
            const selectedTab = this;
            $("input[type=radio]").each(function (i, n) {

                if (n.id === selectedTab.id && $(roleCreationForm[i]).hasClass("hidden")) {
                    console.log($(roleCreationForm[i]).hasClass("hidden"))
                    // $(roleCreationForm[i]).removeClass("hidden")
                    // $(roleCreationForm[i]).fadeIn(3000).delay(100).fadeTo(1000, 0.4).delay(100).fadeTo(1000,1).delay(100).fadeOut(3000);
                    $(roleCreationForm[i]).fadeIn("fast").animate({}, "linear", function () {
                        $(this).fadeIn();
                    }).removeClass("hidden").removeAttr("style");

                    if (i === 0) {
                        $("#roleCreationHeader").html("HOD role creation")
                        $("#roleCreationPasswordGeneratorID").removeClass().addClass("absolute inset-x-2/3 m-8 flex items-center").css({bottom: '40%'});
                    } else if (i === 1) {
                        $("#roleCreationHeader").html("program manager role creation")
                        $("#roleCreationPasswordGeneratorID").removeClass().addClass("absolute inset-x-2/3 m-8 flex items-center").css({bottom: '40%'});
                    } else {
                        $("#roleCreationHeader").html("course advisor role creation")
                        $("#roleCreationPasswordGeneratorID").removeClass().addClass("absolute inset-x-2/3 bottom-7 m-8 mb-2 flex items-center").css({bottom: '35.5%'});
                    }
                } else {
                    if (n.id !== selectedTab.id)
                        $(roleCreationForm[i]).addClass("hidden")
                }
            });
        });

        $(generateRandBtn).on('click', function (e) {
            $(roleCreationForm).each(function (i, n) {
                if (!$(this).hasClass("hidden"))
                    $(this).children(":last-child").children(":last-child").find("input").val(makeRanPassword(generateSize(0)))
            })
        })
    });

    function makeRanPassword(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() *
                charactersLength));
        }
        return result;
    }

    const generateSize = (test) => {
        const size = Math.ceil(Math.random() * (Math.random() * 100));
        if (size < 8 || size > 31)
            test = generateSize(0);
        else
            test = size;
        return test;
    }

}
