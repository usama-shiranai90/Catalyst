/*    let facultyInfo = [];
    facultyInstanceList.find(function (fac) {
        facultyInfo.push({"code": fac.facultyCode, "name": fac.name});
    });*/
/*let facultyNameList = [];
facultyInstanceList.find(function (fac) {
    facultyNameList.push(fac.name);
});
facultyNameList = Array.from(new Set(facultyNameList))*/

let respectiveRolesList; // fetches the list of roles with respect to its faculty name.

window.onload = function () {


    /** Administrative Role Major Search Fields ( selections field list ) */
    const programField = document.getElementById('programIDSelect');
    const designationField = document.getElementById('froleDesignationID');
    const facultyBindField = document.getElementById('facultyNameSelectId');
    // const facultyNameBindField = document.getElementById('froleFacultyNameID');

    /** Creation / Updation Fields List */
        // For HOD Fields.
    const staticHeadOfDepartmentEmailField = document.getElementById('hrcREmailID');
    const headOfDepartmentPasswordField = document.getElementById('hrcPasswordID');
    const headOfDepartmentStartDateField = document.getElementById('hrcStartDateID');

    // For PM Fields.
    const staticProgramManagerEmailField = document.getElementById('pmrcREmailID');
    const programManagerPasswordField = document.getElementById('pmrcPasswordID');

    // For CA Fields.
    const staticCourseAdvisorEmailField = document.getElementById('carcEmailID');
    const courseAdvisorPasswordField = document.getElementById('carcPasswordID');
    const caSeasonField = document.getElementById('carcRSeasonID');
    const caSectionField = document.getElementById('carcRSectionID');


    /** Creation / Updation Containers according to role-wise. */
    const hodFormContainer = document.getElementById('hodRoleCreationFormID')
    const pmFormContainer = document.getElementById('pmRoleCreationFormID')
    const caFormContainer = document.getElementById('caRoleCreationFormID')
    const roleCreationContainersFormList = document.getElementsByClassName("flex flex-col overflow-hidden"); // for all three role containers.

    /** Radio Button selection for head of department, program manager and course advisor. */
    const radioBtnHod = document.getElementById('adminRoleDivisionHod');
    const radioBtnPm = document.getElementById('adminRoleDivisionPm');
    const radioBtnCa = document.getElementById('adminRoleDivisionCa');

    /** Button  */
    const roleAssignBtn = document.getElementById('roleAssignBtnID');


    $(document).ready(function () {

        /** Disable program-field when HOD is selected. */
        visibilityOfProgramField();

        /** Remove error color from selections */
        $('.textField , .select').on('input', function (e) {
            if (this.type === "text" || this.type === "date")
                $(this).parent().removeClass("textField-error-input");
            else if (this.type === "select-one")
                $(this).parent().removeClass("select-error-input");

        });

        /** click to hide view section and show input section according to Role Creation */
        $("input[type=radio]").on('click', function (e) {
            e.stopPropagation();
            const selectedTab = this;
            changeRoleViewContainer(selectedTab);
            if (facultyBindField.value.length !== 0 && designationField.value.length !== 0)
                generateUserEmail() // $(facultyBindField).children(`option[value=${facultyBindField.value}]`).text()
        });

        /** when designation is selected. */
        $(designationField).on('change', function (event) {
            performDropDownSelection("designation", this);
        })

        /** when program field is selected. */
        $(programField).on('change', function (event) {
            performDropDownSelection("program", facultyBindField)
        });

        /** when faculty field is selected. */
        $(facultyBindField).on('change', function (event) {
            performDropDownSelection("faculty", this);
        })

        /** when Season field is selected from Course advisor container. */
        $(caSeasonField).on('change', function (event) {
            performDropDownSelection("season", this);
            $(caSectionField).prop("disabled", false).css({cursor: 'pointer'}).attr('value', "");
        })

        $(caSectionField).on('change', function (event) {
            generateUserEmail();
        })

        /** is used when generate password icon is clicked and will generate a random password between 8 to 30 character. */
        $(document).on('click', "#roleCreationPasswordGeneratorID", function (e) {
            $(roleCreationContainersFormList).each(function (i, n) {
                if (!$(this).hasClass("hidden")) // is used when the given node does not have hidden in its class.
                    if (i !== 0)
                        $(this).children(":last-child").children(":last-child").find("input").val(makeRanPassword(generateSize(0)))
                    else
                        $(this).children(":first-child").children(":last-child").find("input").val(makeRanPassword(generateSize(0)))
            });

        });

        $(roleAssignBtn).on('click', function (event) {
            event.preventDefault();

            let programCode = programField.value;
            let facultyCode = facultyBindField.value;

            $(roleCreationContainersFormList).each(function (index, value) {
                if (!value.classList.contains("hidden")) {
                    if (index === 0) { // for head of department.

                        let hasEmptyField = containsEmptyField([staticHeadOfDepartmentEmailField, headOfDepartmentPasswordField, headOfDepartmentStartDateField]);
                        if (hasEmptyField) {
                            let email = $(staticHeadOfDepartmentEmailField).val();
                            let password = $(headOfDepartmentPasswordField).val();
                            let startDate = headOfDepartmentStartDateField.value;
                            callAjaxCreateNewRole(email, password, facultyCode, startDate);
                        }

                    } else if (index === 1) { // for program manager.
                        if (containsEmptyField([staticProgramManagerEmailField, programManagerPasswordField])) {
                            let emailList = $(staticProgramManagerEmailField).val().split(/[ , ]+/g);
                            let password = $(programManagerPasswordField).val();
                            emailList = emailList.filter(function (el) {
                                return el !== "";
                            });
                            callAjaxCreateNewRole(emailList, password, facultyCode, 0, programCode);
                        }
                    } else if (index === 2) { // for course advisor.


                        if (containsEmptyField([staticCourseAdvisorEmailField, courseAdvisorPasswordField, caSeasonField, caSectionField])) {
                            let seasonCode = caSeasonField.value;
                            let sectionCode = caSectionField.value;
                            let email = $(staticCourseAdvisorEmailField).val();
                            let password = $(courseAdvisorPasswordField).val();
                            callAjaxCreateNewRole(email, password, facultyCode, 0, programCode, seasonCode, sectionCode);
                        }
                    }
                }

            });
        });
    });

    /** function is used for controlling the selection and disable of a field. */
    function visibilityOfProgramField() {
        if (radioBtnHod.checked)
            $(programField).prop("disabled", true).css({cursor: 'no-drop'}).attr('value', "");
        else
            $(programField).prop("disabled", false).css({cursor: 'pointer'}).attr('value', "all");
    }

    /** function is used to change the view container according to selected tab. */
    function changeRoleViewContainer(selectedTab) {
        $("input[type=radio]").each(function (index, currentNode) { // for all radio button available iterate.
            /*console.log($(roleCreationContainersFormList[i]).hasClass("hidden"))
            $(roleCreationContainersFormList[i]).removeClass("hidden")
            $(roleCreationContainersFormList[i]).fadeIn(3000).delay(100).fadeTo(1000, 0.4).delay(100).fadeTo(1000,1).delay(100).fadeOut(3000);
            $("#roleCreationPasswordGeneratorID").removeClass().addClass("absolute inset-x-2/3 m-8 flex items-center").css({bottom: '40%'});
            $("#roleCreationPasswordGeneratorID").removeClass().addClass("absolute inset-x-2/3 bottom-7 m-8 mb-2 flex items-center").css({bottom: '35.5%'});*/

            if (currentNode.id === selectedTab.id && $(roleCreationContainersFormList[index]).hasClass("hidden")) {
                $(roleCreationContainersFormList[index]).fadeIn("fast").animate({}, "linear", function () {
                    $(this).fadeIn();
                }).removeClass("hidden").removeAttr("style");

                if (index === 0) {
                    $("#roleCreationHeader").html("HOD role creation")
                    $(hodFormContainer).children(":first-child").children(":last-child").append(appearGeneratePasswordBtn()); // to add password generate button.
                    removeGeneratePasswordBtn(pmFormContainer); // to remove any alternative generate password icon if exist.
                    removeGeneratePasswordBtn(caFormContainer);
                } else if (index === 1) {
                    $("#roleCreationHeader").html("program manager role creation")
                    $(pmFormContainer).children(":last-child").children(":last-child").append(appearGeneratePasswordBtn());
                    removeGeneratePasswordBtn(hodFormContainer);
                    removeGeneratePasswordBtn(caFormContainer);
                } else {
                    $("#roleCreationHeader").html("course advisor role creation")
                    $(caFormContainer).children(":last-child").children(":last-child").append(appearGeneratePasswordBtn());
                    removeGeneratePasswordBtn(hodFormContainer);
                    removeGeneratePasswordBtn(pmFormContainer);
                }
            } else {
                if (currentNode.id !== selectedTab.id)
                    $(roleCreationContainersFormList[index]).addClass("hidden")
            }
            visibilityOfProgramField();
        });
    }

    /** State change for selection */
    let isHeadOfDepartment, isProgramManager, isCourseAdvisor;


    /**  Cases List.
     *  1. when single program is selected and we select related faculty member.
     *
     * */
    function performDropDownSelection(selector, selectedDOM) {
        isHeadOfDepartment = false;
        isProgramManager = false;
        isCourseAdvisor = false;
        let optionsList = "";
        let name;

        disabledSpecificRoleContainer(isHeadOfDepartment, isProgramManager, isCourseAdvisor, 0) // reset disability for selections.
        switch (selector) {
            case "designation":
                // check if the selected designation faculty instances are returned and create options for selection ( faculty name )
                for (let i = 0; i < facultyInstanceList.length; i++)
                    if (selectedDOM.value === facultyInstanceList[i].designation) {
                        let option = `<option value="${facultyInstanceList[i].fc}">${facultyInstanceList[i].name}</option>`;
                        optionsList += option;
                    }
                $(facultyBindField).children().slice(1).remove();
                $(facultyBindField).append(optionsList);
                break;

            case "program": // check if the selectedDOM ( facultyID /facultyBind) is not empty then check respective roles.
                if (selectedDOM.value !== undefined && selectedDOM.value.length !== 0 && selectedDOM.value !== "") {

                    respectiveRolesList = callAjaxForFacultyRole(selectedDOM.value); // call the function ajax to get faculty instance role.
                    $(Object.entries(respectiveRolesList)).each(function (index, value) {
                        checkRoleRepetition(value[0], value[1]); // first parameter = key , second parameter = key array of related role Object.
                    })
                    disabledSpecificRoleContainer(isHeadOfDepartment, isProgramManager, isCourseAdvisor, 0);
                    displayAdministrativeRole(respectiveRolesList)
                    name = $(selectedDOM).children(`option[value=${facultyBindField.value}]`).text();
                    generateUserEmail(name)

                }
                break;
            case "faculty": // major role for binding of fields.
                for (let i = 0; i < facultyInstanceList.length; i++) {
                    console.log(userId, selectedDOM.value, facultyInstanceList[i].fc)
                    if (userId === selectedDOM.value && selectedDOM.value === facultyInstanceList[i].fc) // the current Head of department is selected.
                        isHeadOfDepartment = true;
                    if (selectedDOM.value === facultyInstanceList[i].fc) {

                        respectiveRolesList = callAjaxForFacultyRole(selectedDOM.value); // call the function ajax to get faculty instance role.
                        $(Object.entries(respectiveRolesList)).each(function (index, value) {
                            checkRoleRepetition(value[0], value[1]); // first parameter = key , second parameter = key array of related role Object.
                        })

                        if (facultyBindField.value.length !== 0 && programField.value.length !== 0)
                            callAjaxForSeasonDropDown(programField.value);
                    }
                }

                disabledSpecificRoleContainer(isHeadOfDepartment, isProgramManager, isCourseAdvisor, 0);
                displayAdministrativeRole(respectiveRolesList)
                name = $(selectedDOM).children(`option[value=${facultyBindField.value}]`).text();
                generateUserEmail(name)
                break;

            case "season":
                if (caSeasonField.value.length !== 0 && programField.value.length !== 0 && facultyBindField.value.length !== 0) {
                    let sectionList = callAjaxForSectionDropDown(caSeasonField.value);
                    // will execute only for course advisor.
                    $(Object.entries(respectiveRolesList)).each(function (index, value) {
                        if (value.length > 1 && value[0] === 'CA')
                            checkRoleRepetition(value[0], value[1], sectionList);
                    });
                }
                break;
        }

    }

    /**  first counter will represent which radio button to disable and the second parameter radioType shows.
     *   the function handles the allowance of which faculty memeber has reached its limitation of role.
     *   i.e. if one person is the HOD of a department then it can't be repeat until new one is selected.
     *   similarly the function also handles if PM limits for program or Course Advisor for section limit is reached. */
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

    /**  This function is called when we need to check if a single Role has returned with multiple same value.
     *   i.e. A program manager can be repeated for one or more Program e.g. BCSE and BCCS */
    function checkRoleRepetition(key, adminRoleArray, sectionList = '') {
        switch (key) {
            case 'PM': // for Program Manager check.
                isProgramManager = false;
                let toDisableSelectionOptions = false;
                if (adminRoleArray.length !== 1) { // is more than one pm for program manager.
                    let toSkipProgramArray = [];
                    adminRoleArray.forEach(function (v, i) { // important if Has multiple program.
                        if (programList.includes(v.programCode) && v.hasRole === true)// programList[i] === v.programCode
                            toSkipProgramArray.push(v.programCode);

                    })
                    if (toSkipProgramArray.length === programList.length)
                        isProgramManager = true;
                } else if (adminRoleArray.length === 1 && sectionList.length === 0) {  // for single program manager.
                    $(adminRoleArray).each(function (index, value) {
                        if (value.hasRole && programList.includes(value.programCode))// programList[i] === v.programCode
                            toDisableSelectionOptions = true;
                    });
                }

                if (toDisableSelectionOptions) {
                    $(programField).children(`option[value=${programField.value}]`).attr("disabled", true).css({cursor: 'no-drop'});
                    programField.value = 'all';
                } else
                    $(programField).children().each(function (i, v) {
                        $(v).attr("disabled", false)
                    });
                break;

            case 'CA': // for Course Advisor check.
                isCourseAdvisor = false;
                let toSkipSectionsArray = [];

                if (adminRoleArray.length > 0 && sectionList.length !== 0) {
                    console.log("Section : ", sectionList)
                    adminRoleArray.forEach(function (v, i) {
                        if (v.sectionCode === sectionList[i].sectionCode) // then the selected section is equal to passed section now we can check sections.
                            toSkipSectionsArray.push(v.sectionCode);
                    });
                }
                let optionsList = '';
                if (toSkipSectionsArray.length !== sectionList.length) {
                    for (let i = 0; i < sectionList.length; i++) {
                        let option = `<option value="${sectionList[i].sectionCode}">${sectionList[i].sectionName}</option>`;
                        optionsList += option;
                    }
                    $(caSectionField).children().slice(1).remove();
                    $(caSectionField).append(optionsList);
                } else { // show error that the selected Seasons with all sections are booked.
                    $(caSectionField).children().slice(1).remove();
                }
                break;
        }

    }

    /** Generate Role Status  */
    function displayAdministrativeRole(respectiveRolesList) {
        $("#extraRoleDetailContainerId").removeClass("hidden");
        $("#roleDetailListId").children().remove();
        let rolesKeyList = Object.keys(respectiveRolesList)

        for (let i = 0; i < rolesKeyList.length; i++) {
            let listNumber = document.createElement('li');
            $(listNumber).addClass("flex text-gray-600 mb-1 text-sm font-medium");

            let key = rolesKeyList[i];
            console.log("key :", key, respectiveRolesList[key], respectiveRolesList[key].length)
            if (respectiveRolesList[key].length > 1) { // more than one role.
                /*for (let j = 0; j < respectiveRolesList[key].length; j++) { // iterate over the if a single role is repeated.
                    let listNumber = document.createElement('li');
                    $(listNumber).addClass("flex text-gray-600 mb-1 text-sm font-medium");
                    let currentRoleStatus = respectiveRolesList[key][j].hasRole; // false
                    let nextRoleStatus = (j + 1 < respectiveRolesList[key].length) ? respectiveRolesList[key][j + 1].hasRole : false; // false.
                    if (currentRoleStatus !== false && nextRoleStatus !== false) {
                        createRolesListSection(listNumber, respectiveRolesList[key][j], rolesKeyList, i);
                        $("#roleDetailListId").append(listNumber);
                    } else {
                        createRolesListSection(listNumber, respectiveRolesList[key][j], rolesKeyList, i);
                        $("#roleDetailListId").append(listNumber);
                        break;
                    }
                }*/

                let hasRole = [];
                for (let j = 0; j < respectiveRolesList[key].length; j++)
                    hasRole.push(respectiveRolesList[key][j].hasRole); // f ,f ,t ,f

                let totalTrues = hasRole.filter(status => status === true).length;
                if (hasRole.includes(true) && totalTrues > 1) {
                    for (let j = 0; j < totalTrues; j++) {
                        let listNumber = document.createElement('li');
                        $(listNumber).addClass("flex text-gray-600 mb-1 text-sm font-medium");
                        createRolesListSection(listNumber, respectiveRolesList[key][j], rolesKeyList, i);
                        $("#roleDetailListId").append(listNumber);
                    }
                } else if (hasRole.includes(true) && totalTrues === 1) {
                    let indexOf = hasRole.indexOf(true);
                    createRolesListSection(listNumber, respectiveRolesList[key][indexOf], rolesKeyList, i);
                    $("#roleDetailListId").append(listNumber);
                } else {
                    createRolesListSection(listNumber, respectiveRolesList[key][0], rolesKeyList, i);
                    $("#roleDetailListId").append(listNumber);
                    // break;
                }

            } else {
                createRolesListSection(listNumber, respectiveRolesList[key][0], rolesKeyList, i);
                $("#roleDetailListId").append(listNumber);
            }
        }
        $(".flex.justify-center.items-center.h-12.gap-2.relative").addClass("ml-64 mr-14");

    }

    /** the function is used when faculty-name field with or without program-field is selected the function is called.
     *   it shows the role name and if user has been allocated with any roles or not.
     *   if user is assign with a role (tick) is appeared else (cross) is represented. */
    function createRolesListSection(listNumber, roleObject, rolesKeyList, index) {

        if (roleObject.hasRole === true) {
            let valueFirst = "";
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

    /** the function is used to get the index value of a specific array.*/
    function getRespectiveRoleName(respectiveRolesList, index) {
        return respectiveRolesList[index];
    }

    /** following are the function used to request data from server. */
    function callAjaxForFacultyRole(facultyCode) {
        // console.log("program code ", programField.value)
        let getValue = "";
        $.ajax({
            type: "POST",
            async: false,
            url: "asset/operation/AdministrativeDropDownAjax.php",
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
                // console.log("Call Ajax For Faculty Role Status : ", getValue)
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

    function callAjaxForSeasonDropDown(programCode) {
        let returnValue;
        $.ajax({
            type: "POST",
            async: false,
            url: "asset/operation/AdministrativeDropDownAjax.php",
            data: {
                fetchBatch: true,
                programCode: programCode
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (serverResponse, status) {

                returnValue = JSON.parse(serverResponse).message;
            },
            complete: function (response) {
                let responseText = JSON.parse(response.responseText)
                console.log("Ajax Call status for Season : ", responseText)
                if ((responseText.status === 1 && responseText.errors === 'none')) {
                    if (response.status !== -1) {
                        returnValue = responseText.message;
                        let optionsList = '';
                        for (let i = 0; i < returnValue.length; i++) {
                            let option = `<option value="${returnValue[i].batchCode}">${returnValue[i].batchName}</option>`;
                            optionsList += option;
                        }
                        $(caSeasonField).children().slice(1).remove();
                        $(caSeasonField).append(optionsList);
                    }
                }
            }
        });
        return returnValue;
    }

    function callAjaxForSectionDropDown(batchCode) {
        let returnValue;
        $.ajax({
            type: "POST",
            async: false,
            url: "asset/operation/AdministrativeDropDownAjax.php",
            data: {
                fetchSections: true,
                batchCode: batchCode
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (serverResponse, status) {
                returnValue = JSON.parse(serverResponse).message;
            },
            complete: function (response) {
                let responseText = JSON.parse(response.responseText)
                returnValue = responseText.message;
            }
        });
        return returnValue;
    }

    function callAjaxCreateNewRole(email, password, facultyCode, startDate,
                                   programCode = -1, seasonCode = -1, sectionCode = -1) {

        $.ajax({
            type: "POST",
            url: "asset/operation/AdministrativeDropDownAjax.php",
            data: {
                creation: true,
                email: email,
                password: password,
                startDate: startDate,
                facultyCode: facultyCode,
                programCode: programCode,
                seasonCode: seasonCode,
                sectionCode: sectionCode,
            },
            beforeSend: function (request, settings) {
                start_time = new Date().getTime();
                console.log("start time : ", start_time);
                $("main").toggleClass("blur-filter");
                $('body').append(processLoaderAnimation());
                $('#loader').toggleClass('hidden')
                $("#loader").fadeIn(start_time);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (serverResponse, status) {

            },
            complete: function (response) {
                let request_time = new Date().getTime() - start_time;
                console.log("request_time : ", request_time);

                let responseText = JSON.parse(response.responseText)
                switch (responseText.status) {
                    case 200:
                        loaderAnimation(responseText, 3000);
                        break;
                    case 207:
                        // Warning message as few records are unable to CRUD.
                        loadMessage(responseText)
                        break;
                    case 501:
                        // Warning message as few records are unable to CRUD.
                        loadMessage(responseText)
                        break;
                }
            }
        });
    }

    function loaderAnimation(responseText, request_time) {
        const myTimer = setInterval(function () {
            $("main").toggleClass("blur-filter");
            $('#loader').toggleClass('hidden');
            loadMessage(responseText);
            clearInterval(myTimer);
        }, 3000);
    }

    function loadMessage(responseText, timerS = 5000, timerE = 3000) {
        let duplicateList = responseText.message;
        if (responseText.status > 200) {
            if (responseText.status === 207)
                $('body').append(popupErrorNotifier("Alert " + responseText.errors, responseText.message));
            else if (responseText.status === 501)
                $('body').append(popupErrorNotifier("Duplication Founded", "The Following List Of Students already exist for different sections.<br>" + Object.values(duplicateList)));
            $("#errorMessageDiv").toggle("hidden").animate(
                {right: 0,}, timerS, function () {
                    $(this).delay(timerE).fadeOut().remove();
                }).removeAttr("style").removeClass("hidden");
        } else if (responseText.status === 200) {
            $("body").append(successfulMessageNotifier(responseText.errors, responseText.message));
            $("#successNotifiedId").toggle("hidden").animate(
                {right: 0}, timerS, function () {
                    $(this).delay(timerE).fadeOut().remove();
                }).removeAttr("style").removeClass("hidden");
        }

    }


    /** Function is used to generate the password field for specific container. */
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

    /** Function is used to remove any other container having the same password field. */
    function removeGeneratePasswordBtn(container) {
        // $("#pmRoleCreationFormID").children(":last-child").children(":last-child").children(":last-child").remove();
        let lastMostChild = $(container).children(":last-child").children(":last-child").children(":last-child");
        if ($(lastMostChild).attr("id") === "roleCreationPasswordGeneratorID")
            $(lastMostChild).remove();
    }

    /** To generate email according to respective role*/
    function generateUserEmail() {
        /*        console.log("pm".match(/^([a-z0-9]{pm,})$/));
                const emailRegex = RegExp(/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/);
                this.value = this.value.replace(/(\d{2})(\d{2})/, '$1/$2')*/
        $("input[type=radio]:checked").each(function (key, value) {
            let rnd = makeRanPassword(generateSize(0));

            if (value.id.match("(.{3})\s*$", "i")[0].toUpperCase() === 'hod'.toUpperCase()) {
                $(staticHeadOfDepartmentEmailField).val(rnd.replace(`${rnd}`, 'hod-' + $('input[data-h-set= "departmentName"]').val()) + "@fui.edu.pk");
            } else if (value.id.match("(.{2})\\s*$", "i")[0].toUpperCase() === 'pm'.toUpperCase() && programField.value.length !== 0) {

                if (programField.value === 'all') {
                    let value = '';
                    for (let i = 0; i < programList.length; i++) {  // 1 < 2
                        value += rnd.replace(`${rnd}`, 'pm-' + $(programField).children(`:nth-child(${i + 3})`).text().toLowerCase() + "@fui.edu.pk");
                        if ((i + 1) < programField.length)
                            value += " , ";
                    }
                    $(staticProgramManagerEmailField).val(value);
                } else
                    $(staticProgramManagerEmailField).val(rnd.replace(`${rnd}`, 'pm-' + $(programField).children(`option[value=${programField.value}]`).text().toLowerCase() + "@fui.edu.pk"));
            } else if (value.id.match("(.{2})\\s*$", "i")[0].toUpperCase() === 'ca'.toUpperCase() && caSectionField.value.length !== 0 && caSeasonField.length !== 0) {
                // for single course advisor of a section:
                $(staticCourseAdvisorEmailField).val(rnd.replace(`${rnd}`, 'ca-' + $(caSeasonField).children(`option[value=${caSeasonField.value}]`).text().toLowerCase() + $(caSectionField).children(`option[value=${caSectionField.value}]`).text().toLowerCase() + "@fui.edu.pk"));
            }

        });
    }
}
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