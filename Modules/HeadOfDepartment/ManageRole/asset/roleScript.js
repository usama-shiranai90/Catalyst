/*    let facultyInfo = [];
    facultyInstanceList.find(function (fac) {
        facultyInfo.push({"code": fac.facultyCode, "name": fac.name});
    });*/

/*let facultyNameList = [];
facultyInstanceList.find(function (fac) {
    facultyNameList.push(fac.name);
});
facultyNameList = Array.from(new Set(facultyNameList))*/
window.onload = function () {

    const designationField = document.getElementById('froleDesignationID');
    const facultyBindField = document.getElementById('f_role_facultyID');
    const facultyNameBindField = document.getElementById('froleFacultyNameID');

    const hodFormContainer = document.getElementById('hodRoleCreationFormID')
    const pmFormContainer = document.getElementById('pmRoleCreationFormID')
    const caFormContainer = document.getElementById('caRoleCreationFormID')

    const radioBtnHod = document.getElementById('adminRoleDivisionHod');
    const radioBtnPm = document.getElementById('adminRoleDivisionPm');
    const radioBtnCa = document.getElementById('adminRoleDivisionCa');


    const roleCreationForm = document.getElementsByClassName("flex flex-col overflow-hidden");

    $(document).ready(function () {
        /** click to hide view section and show input section according to Role Creation */
        $("input[type=radio]").on('click', function (e) {
            e.stopPropagation();
            const selectedTab = this;
            changeRoleViewContainer(selectedTab);
        });

        $(document).on('click', "#roleCreationPasswordGeneratorID", function (e) {
            $(roleCreationForm).each(function (i, n) {
                if (!$(this).hasClass("hidden"))
                    $(this).children(":last-child").children(":last-child").find("input").val(makeRanPassword(generateSize(0)))
            })
        })

        /** Old Code , when Faculty Object Instance is returned */
        /*$(designationField).on('change', function (event) {
            let optionsList = "";
            for (let i = 0; i < facultyInstanceList.length; i++)
                if (this.value === facultyInstanceList[i].designation) {
                    let option = `<option value="${facultyInstanceList[i].facultyCode}">${facultyInstanceList[i].facultyCode}</option>`;
                    optionsList += option;
                }

            $(facultyBindField).children().slice(1).remove();
            $(facultyBindField).append(optionsList);
        });
        $(facultyBindField).on('change', function (e) {
            for (let i = 0; i < facultyInstanceList.length; i++) {
                if (this.value === facultyInstanceList[i].facultyCode){
                    facultyNameBindField.setAttribute("value", facultyInstanceList[i].name);

                    // check if HOD role is already assign and can't be overridden to itself.
                    if ($("#hdNamae").attr("value") === facultyInstanceList[i].name){
                        $(radioBtnPm).prop("checked", true);
                        changeRoleViewContainer(radioBtnPm)
                        // disable the role option for Hod until same person is deselected.
                        $(radioBtnHod).prop("disabled", true);
                        $("label[for=adminRoleDivisionHod]").addClass("cursor-not-allowed")
                    }else {
                        $(radioBtnHod).prop("disabled", false);
                        $("label[for=adminRoleDivisionHod]").removeClass("cursor-not-allowed")
                    }

                }
            }

        })*/





    });

    function changeRoleViewContainer(selectedTab) {
        $("input[type=radio]").each(function (i, n) {

            if (n.id === selectedTab.id && $(roleCreationForm[i]).hasClass("hidden")) {
                // console.log($(roleCreationForm[i]).hasClass("hidden"))
                // $(roleCreationForm[i]).removeClass("hidden")
                // $(roleCreationForm[i]).fadeIn(3000).delay(100).fadeTo(1000, 0.4).delay(100).fadeTo(1000,1).delay(100).fadeOut(3000);
                // $("#roleCreationPasswordGeneratorID").removeClass().addClass("absolute inset-x-2/3 m-8 flex items-center").css({bottom: '40%'});
                // $("#roleCreationPasswordGeneratorID").removeClass().addClass("absolute inset-x-2/3 m-8 flex items-center").css({bottom: '40%'});
                // $("#roleCreationPasswordGeneratorID").removeClass().addClass("absolute inset-x-2/3 bottom-7 m-8 mb-2 flex items-center").css({bottom: '35.5%'});

                $(roleCreationForm[i]).fadeIn("fast").animate({}, "linear", function () {
                    $(this).fadeIn();
                }).removeClass("hidden").removeAttr("style");

                if (i === 0) {
                    $("#roleCreationHeader").html("HOD role creation")
                    $("#hodRoleCreationFormID").children(":last-child").children(":last-child").append(appearGeneratePasswordBtn());
                    removeGeneratePasswordBtn(pmFormContainer);
                    removeGeneratePasswordBtn(caFormContainer);

                } else if (i === 1) {
                    $("#roleCreationHeader").html("program manager role creation")
                    $("#pmRoleCreationFormID").children(":last-child").children(":last-child").append(appearGeneratePasswordBtn());
                    removeGeneratePasswordBtn(hodFormContainer);
                    removeGeneratePasswordBtn(caFormContainer);
                } else {
                    $("#roleCreationHeader").html("course advisor role creation")
                    $("#caRoleCreationFormID").children(":last-child").children(":last-child").append(appearGeneratePasswordBtn());
                    removeGeneratePasswordBtn(hodFormContainer);
                    removeGeneratePasswordBtn(pmFormContainer);
                }

            } else {
                if (n.id !== selectedTab.id)
                    $(roleCreationForm[i]).addClass("hidden")
            }
        });
    }

    /** To Generate Random Password. */
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

    function appearGeneratePasswordBtn() {
        return `<div class="flex justify-center items-center absolute top-0 -right-1/2 w-32 h-12 box-border cursor-default"
                                             id="roleCreationPasswordGeneratorID">
                                            <span class="flex items-center justify-center text-gray-400 transform transition hover:scale-90 hover:text-indigo-700 cursor-pointer sm:text-sm">
                                                <svg
                                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                              <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/>
                                            </svg>
                                                 <div class="w-32 h-full opacity-0 hover:opacity-100 duration-300 z-10
                                                  flex justify-center items-center capitalize text-xs text-black font-semibold">Generate password</div>
                                            </span>
                                        </div>`;
    }

    function removeGeneratePasswordBtn(container) {
        // $("#pmRoleCreationFormID").children(":last-child").children(":last-child").children(":last-child").remove();
        let lastMostChild = $(container).children(":last-child").children(":last-child").children(":last-child");
        if ($(lastMostChild).attr("id") === "roleCreationPasswordGeneratorID")
            $(lastMostChild).remove();

    }

}
