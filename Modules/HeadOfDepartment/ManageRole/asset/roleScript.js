/*    let facultyInfo = [];
    facultyInstanceList.find(function (fac) {
        facultyInfo.push({"code": fac.facultyCode, "name": fac.name});
    });*/

/*let facultyNameList = [];
facultyInstanceList.find(function (fac) {
    facultyNameList.push(fac.name);
});
facultyNameList = Array.from(new Set(facultyNameList))*/

let respectiveRolesList;
window.onload = function () {

    const programField = document.getElementById('programIDSelect');
    const designationField = document.getElementById('froleDesignationID');
    const facultyBindField = document.getElementById('facultyNameSelectId');
    // const facultyNameBindField = document.getElementById('froleFacultyNameID');

    const hodFormContainer = document.getElementById('hodRoleCreationFormID')
    const pmFormContainer = document.getElementById('pmRoleCreationFormID')
    const caFormContainer = document.getElementById('caRoleCreationFormID')

    const radioBtnHod = document.getElementById('adminRoleDivisionHod');
    const radioBtnPm = document.getElementById('adminRoleDivisionPm');
    const radioBtnCa = document.getElementById('adminRoleDivisionCa');

    const roleCreationForm = document.getElementsByClassName("flex flex-col overflow-hidden");

    $(document).ready(function () {
        /** Disable when HOD is selected. */
        visibilityOfProgramField();

        /** click to hide view section and show input section according to Role Creation */
        $("input[type=radio]").on('click', function (e) {
            e.stopPropagation();
            const selectedTab = this;
            changeRoleViewContainer(selectedTab);

            if (facultyBindField.value.length !== 0 && designationField.value.length !== 0)
                generateUserEmail($(facultyBindField).children(`option[value=${facultyBindField.value}]`).text())

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

        /** when designation is selected. */
        $(designationField).on('change', function (event) {
            performDropDownSelection("designation", this);
        })

        $(programField).on('change', function (event) {
            performDropDownSelection("program", facultyBindField)
        });


        $(facultyBindField).on('change', function (event) {
            performDropDownSelection("faculty", this);
        })


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
            visibilityOfProgramField();
        });
    }

    /** State change for selection */
    function performDropDownSelection(selector, selectedDOM) {
        let isHeadOfDepartment = false;
        let isProgramManager = false;
        let isCourseAdvisor = false;

        let optionsList = "";
        let name;
        switch (selector) {
            case "program":
                console.log("selected DOM : " , selectedDOM)
                console.log("value : ", facultyBindField.value.length, selectedDOM.value !== undefined, selectedDOM.value.length !== 0, selectedDOM.value !== "")

                console.log(selectedDOM.value !== undefined && selectedDOM.value.length !== 0 && selectedDOM.value !== "")

                if (selectedDOM.value !== undefined && selectedDOM.value.length !== 0 && selectedDOM.value !== "") {
                    respectiveRolesList = callAjaxForFacultyRole(facultyBindField.value);
                    console.log(respectiveRolesList);
                    displayAdministrativeRole(respectiveRolesList);
                    name = $(selectedDOM).children(`option[value=${facultyBindField.value}]`).text();
                    generateUserEmail(name)
                }

                break;

            case "designation":
                for (let i = 0; i < facultyInstanceList.length; i++)
                    if (selectedDOM.value === facultyInstanceList[i].designation) {
                        let option = `<option value="${facultyInstanceList[i].fc}">${facultyInstanceList[i].name}</option>`;
                        optionsList += option;
                    }
                $(facultyBindField).children().slice(1).remove();
                $(facultyBindField).append(optionsList);
                break;

            case "faculty":
                disabledSpecificRoleContainer(isHeadOfDepartment, isProgramManager, isCourseAdvisor, 0)
                for (let i = 0; i < facultyInstanceList.length; i++) {
                    if (userId === selectedDOM.value && selectedDOM.value === facultyInstanceList[i].fc) // the current Head of department is selected.
                        isHeadOfDepartment = true;
                    if (selectedDOM.value === facultyInstanceList[i].fc) {
                        respectiveRolesList = callAjaxForFacultyRole(selectedDOM.value);
                        /*$(respectiveRolesList).each(function (index, value) {
                            if (value === true) {
                                if (index === 0)
                                    isHeadOfDepartment = true;
                                else if (index === 1)
                                    isProgramManager = true;
                                else if (index === 2)
                                    isCourseAdvisor = true;
                            }
                        });*/
                    }
                }
                disabledSpecificRoleContainer(isHeadOfDepartment, isProgramManager, isCourseAdvisor, 0);
                displayAdministrativeRole(respectiveRolesList)

                name = $(selectedDOM).children(`option[value=${facultyBindField.value}]`).text();
                generateUserEmail(name)
                break;
        }


    }

    function callAjaxForFacultyRole(facultyCode) {
        // console.log(programField.value, programField.value.length)
        let getValue = "";
        $.ajax({
            type: "POST",
            async: false,
            url: "asset/AdministrativeDropDownAjax.php",
            data: {
                fetchAssociatedRole: true,
                facultyCode: facultyCode,
                programCode: programField.value
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (serverResponse, status) {
                getValue = JSON.parse(serverResponse).message;
                console.log(getValue)
            },
            complete: function (response) {
                let responseText = JSON.parse(response.responseText)
                if ((responseText.status === 1 && responseText.errors === 'none') || responseText.status !== 200) {
                    getValue = responseText.message;
                }
            }
        });
        return getValue;
    }


    /**  first counter will represent which radio button to disable and the second parameter radioType shows */
    function disabledSpecificRoleContainer(isHeadOfDepartment = false, isProgramManager = false, isCourseAdvisor = false, radioType = -1) {

        if (isHeadOfDepartment || isProgramManager || isCourseAdvisor)
            radioType = -1;

        let toSetRadioButton = null;

        if (isHeadOfDepartment && isProgramManager) {
            toSetRadioButton = radioBtnCa;
            $(radioBtnCa).prop("checked", true);

            $(radioBtnHod).add(radioBtnPm).prop("disabled", true);
            $(`label[for=${radioBtnHod.id}], label[for=${radioBtnPm.id}]`).addClass("cursor-not-allowed")

        } else if (isProgramManager && isCourseAdvisor) {
            toSetRadioButton = radioBtnHod;
            $(radioBtnHod).prop("checked", true);
            $(radioBtnPm).add(radioBtnCa).prop("disabled", true);
            $(`label[for=${radioBtnPm.id}], label[for=${radioBtnCa.id}]`).addClass("cursor-not-allowed")

        } else if (isCourseAdvisor && isHeadOfDepartment) {
            toSetRadioButton = radioBtnPm;
            $(radioBtnPm).prop("checked", true);
            $(radioBtnHod).add(radioBtnCa).prop("disabled", true);
            $(`label[for=${radioBtnHod.id}], label[for=${radioBtnCa.id}]`).addClass("cursor-not-allowed")

        } else if (isHeadOfDepartment) {
            toSetRadioButton = radioBtnPm;
            $(radioBtnPm).prop("checked", true);
            $(radioBtnHod).prop("disabled", true);
            $(`label[for=${radioBtnHod.id}]`).addClass("cursor-not-allowed")

        } else if (isProgramManager) {
            toSetRadioButton = radioBtnHod;
            $(radioBtnHod).prop("checked", true);
            $(radioBtnPm).prop("disabled", true);
            $(`label[for=${radioBtnPm.id}]`).addClass("cursor-not-allowed")
        } else if (isCourseAdvisor) {
            toSetRadioButton = radioBtnPm;
            $(radioBtnPm).prop("checked", true);
            $(radioBtnCa).prop("disabled", true);
            $(`label[for=${radioBtnCa.id}]`).addClass("cursor-not-allowed")
        }

        if (toSetRadioButton !== null)
            changeRoleViewContainer(toSetRadioButton)

        if (radioType === 1) {
            $(radioBtnHod).prop("disabled", false);
            $("label[for=adminRoleDivisionHod]").removeClass("cursor-not-allowed")
        } else if (radioType === 2) {
            $(radioBtnPm).prop("disabled", false);
            $("label[for=adminRoleDivisionPm]").removeClass("cursor-not-allowed")
        } else if (radioType === 3) {
            $(radioBtnCa).prop("disabled", false);
            $("label[for=adminRoleDivisionCa]").removeClass("cursor-not-allowed")
        }
        if (radioType === 0)
            $("input[type=radio]").each(function (i, n) {
                $(n).prop("disabled", false);
                $(`label[for=${n.id}]`).removeClass("cursor-not-allowed")
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

    /** Generate Role Status */
    function displayAdministrativeRole(respectiveRolesList) {
        $("#extraRoleDetailContainerId").removeClass("hidden");
        $("#roleDetailListId").children().remove();

        let rolesKeyList = Object.keys(respectiveRolesList)
        for (let i = 0; i < rolesKeyList.length; i++) {
            let key = rolesKeyList[i];
            if (respectiveRolesList[key].length > 1) {
                for (let j = 0; j < rolesKeyList[i].length; j++) {
                    let listNumber = document.createElement('li');
                    $(listNumber).addClass("flex text-gray-600 mb-1 text-sm font-medium");
                    createRolesListSection(listNumber, respectiveRolesList[key][j], rolesKeyList, i);
                    $("#roleDetailListId").append(listNumber);
                }
            } else {
                let listNumber = document.createElement('li');
                $(listNumber).addClass("flex text-gray-600 mb-1 text-sm font-medium");
                createRolesListSection(listNumber, respectiveRolesList[key][0], rolesKeyList, i);
                $("#roleDetailListId").append(listNumber);
            }
        }
        $(".flex.justify-center.items-center.h-12.gap-2.relative").addClass("ml-64 mr-14");

    }

    function createRolesListSection(listNumber, roleObject, rolesKeyList, index) {
        if (roleObject.hasRole === true) {

            let valueFirst = "";
            let valueSecond = "";
            if (rolesKeyList[index] === "CA") {
                valueFirst = " for Batch " + roleObject.batchName + " , section " + roleObject.sectionName;

            } else if (rolesKeyList[index] === "PM") {
                valueFirst = " for program " + roleObject.programName;

            } else if (rolesKeyList[index] === "HOD") {
                valueFirst = " for Department " + roleObject.departmentName;
            }

            $(listNumber).append(`<span class="rounded-full mr-2  text-primary flex items-center ">
                                                            <svg width="15" height="15" viewBox="0 0 20 20"
                                                                 class="fill-current">
              <path d="M10 19.625C4.6875 19.625 0.40625 15.3125 0.40625 10C0.40625 4.6875 4.6875 0.40625 10 0.40625C15.3125 0.40625 19.625 4.6875 19.625 10C19.625 15.3125 15.3125 19.625 10 19.625ZM10 1.5C5.3125 1.5 1.5 5.3125 1.5 10C1.5 14.6875 5.3125 18.5312 10 18.5312C14.6875 18.5312 18.5312 14.6875 18.5312 10C18.5312 5.3125 14.6875 1.5 10 1.5Z"></path>
              <path d="M8.9375 12.1875C8.71875 12.1875 8.53125 12.125 8.34375 11.9687L6.28125 9.96875C6.0625 9.75 6.0625 9.40625 6.28125 9.1875C6.5 8.96875 6.84375 8.96875 7.0625 9.1875L8.9375 11.0312L12.9375 7.15625C13.1563 6.9375 13.5 6.9375 13.7188 7.15625C13.9375 7.375 13.9375 7.71875 13.7188 7.9375L9.5625 12C9.34375 12.125 9.125 12.1875 8.9375 12.1875Z"></path>
           </svg>
                                                      </span> ${getRespectiveRoleName(rolesKeyList, index)} ${valueFirst}   `)
        } else {
            $(listNumber).append(` <span class="rounded-full mr-2  text-primary flex items-center ">
                                                           <svg width="15" height="15" viewBox="0 0 20 20"
                                                                class="fill-current">
              <path d="M10 0.40625C4.6875 0.40625 0.40625 4.6875 0.40625 10C0.40625 15.3125 4.6875 19.625 10 19.625C15.3125 19.625 19.625 15.3125 19.625 10C19.625 4.6875 15.3125 0.40625 10 0.40625ZM10 18.5312C5.3125 18.5312 1.5 14.6875 1.5 10C1.5 5.3125 5.3125 1.5 10 1.5C14.6875 1.5 18.5312 5.3125 18.5312 10C18.5312 14.6875 14.6875 18.5312 10 18.5312Z"></path>
              <path d="M12.875 7.125C12.6563 6.90625 12.3125 6.90625 12.0938 7.125L10 9.21875L7.90625 7.125C7.6875 6.90625 7.34375 6.90625 7.125 7.125C6.90625 7.34375 6.90625 7.6875 7.125 7.90625L9.21875 10L7.125 12.0937C6.90625 12.3125 6.90625 12.6562 7.125 12.875C7.21875 12.9687 7.375 13.0312 7.5 13.0312C7.625 13.0312 7.78125 12.9687 7.875 12.875L9.96875 10.7812L12.0625 12.875C12.1563 12.9687 12.3125 13.0312 12.4375 13.0312C12.5625 13.0312 12.7188 12.9687 12.8125 12.875C13.0313 12.6562 13.0313 12.3125 12.8125 12.0937L10.7813 10L12.875 7.90625C13.0625 7.6875 13.0625 7.34375 12.875 7.125Z"></path>
           </svg>
                                          </span> ${getRespectiveRoleName(rolesKeyList, index)}`)
        }
    }

    function getRespectiveRoleName(respectiveRolesList, index) {
        return respectiveRolesList[index];
    }

    function generateUserEmail(name) {
        /*        console.log("pm".match(/^([a-z0-9]{pm,})$/));
                const emailRegex = RegExp(/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/);
                this.value = this.value.replace(/(\d{2})(\d{2})/, '$1/$2')*/

        $("input[type=radio]:checked").each(function (key, value) {
            let rnd = makeRanPassword(generateSize(0));

            if (value.id.match("(.{3})\s*$", "i")[0].toUpperCase() === 'hod'.toUpperCase()) {
                $("#hrcREmailID").val(rnd.replace(`${rnd}`, 'hod-' + $('input[data-h-set= "departmentName"]').val()) + "@fui.edu.pk");
            } else if (value.id.match("(.{2})\\s*$", "i")[0].toUpperCase() === 'pm'.toUpperCase() && programField.value.length !== 0) {
                $("#pmrcREmailID").val(rnd.replace(`${rnd}`, 'pm-' + $(programField).children(`option[value=${programField.value}]`).text().toLowerCase() + "@fui.edu.pk"));
            } else if (value.id.match("(.{2})\\s*$", "i")[0].toUpperCase() === 'ca'.toUpperCase())
                $("#carcEmailID").val("");

        });
    }


    function visibilityOfProgramField() {
        if (radioBtnHod.checked)
            $(programField).prop("disabled", true).css({cursor: 'no-drop'}).attr('value', "");
        else
            $(programField).prop("disabled", false).css({cursor: 'pointer'});
    }


}
//var createUserName = function(value) {
//     var parts = value.split('@');
//     var user = parts[0];
//     var username = user.replace(/[^a-z\d]+/ig, '');
//     return username;
// };