let toRemoveTag;
window.onload = function () {

    const administrativeDesignationField = document.getElementById('administrativeDesignationId');
    const administrativeRoleField = document.getElementById('administrativeRoleId');
    const refreshBtn = document.getElementById('refreshAdministrativeRoleBtn');


    $(document).ready(function () {
        /** Remove error color from selections */
        $('.textField , .select').on('input', function (e) {
            if (this.type === "text" || this.type === "date")
                $(this).parent().removeClass("textField-error-input");
            else if (this.type === "select-one")
                $(this).parent().removeClass("select-error-input");

        });

        /** refresh button is use when user wants to filter out some information. */
        $(refreshBtn).on('click', function (event) {

            if (containsEmptyField([administrativeDesignationField, administrativeRoleField] )) {
                let designation = administrativeDesignationField.value;
                let role = administrativeRoleField.value;
                callAjaxToReloadData(designation, role);

            } else {
                $('body').append(popupErrorNotifier("Empty Fields", "Please provide the the respective role and designation for refresh."));
                $("#errorMessageDiv").toggle("hidden").animate(
                    {right: 0,}, 3000, function () {
                        $(this).delay(2000).fadeOut().remove();
                    });
            }
        })

        /** when a particular record is selected. open its related row. */
        $(document).on('click', 'tr[aria-expanded="false"]', function (e) {
            openTabular(this);
            closeTabular(this, false); // close all other table row except the selected one.
        });

        $(document).on('click', 'tr[aria-expanded="true"]', function (event) {
            closeTabular(this, true); // works when a table row is already open then we wish to close it.
        });

        /** it is used when the user wants to edit the role idk what the add right now. */
       /* $(document).on('click', 'button[id^="performRoleEdit-"]', function (event) {
        });*/


        /** it is used when the user wants to delete the respective role for a user. */
        let hId, pmId, caId, facultyID;
        let hasDepartment = false, hasProgram = false, hasAdvisor = false;
        $(document).on('click', 'button[id^="performRoleDeletion-"]', function (event) {
            // dischargedIndex = $(event.target).closest('.accordion-toggle.collapsed').attr("id").match(/\d+/)[0];
            event.stopImmediatePropagation();
            hId = -1;
            pmId = -1;
            caId = -1;

            facultyID = $(this).closest('.accordion-toggle.collapsed').children(":nth-child(1)").children(":first-child").text(); // FUI-FURC- Code.
            toRemoveTag = $(this).closest('.accordion-toggle.collapsed');

            if (toRemoveTag.attr(`data-role-state-hod`) !== undefined) {
                hId = $(this).closest('.accordion-toggle.collapsed').attr(`data-role-state-hod`); // departmentCode
                hasDepartment = true;
            }
            if (toRemoveTag.attr(`data-role-state-pm`) !== undefined) {
                pmId = toRemoveTag.attr(`data-role-state-pm`); // prgramCode
                hasProgram = true;
            }
            if (toRemoveTag.attr(`data-role-state-ca`) !== undefined) {
                caId = toRemoveTag.attr(`data-role-state-ca`); // sectionCode
                hasAdvisor = true
            }

            if (hasDepartment || hasProgram || hasAdvisor) {
                const name = toRemoveTag.children(":nth-child(2)").children(":first-child").text();
                const role = toRemoveTag.children(":nth-child(4)").children(":first-child").text();

                $("body").append(alertConfirmationMessage("Delete Administrative Role", "The faculty member ", name, "", " will be delete from as " + role));
                $("main").addClass("blur-filter");
            }
        });

        $(document).on('click', "#alertDeleteBtnId ,#alertCancelBtnId ", function (event) {
            event.preventDefault();
            event.stopImmediatePropagation();
            $("main").removeClass("blur-filter");
            $("#alertMessageContainer").remove();

            if (this.id === 'alertDeleteBtnId')
                callAjaxToDeleteAdministrative(facultyID, hId, pmId, caId);
        });

    });

    /** applies smooth animation for opening hidden table row */
    function openTabular(selectedTableRow) {
        $(selectedTableRow).fadeIn("slow").animate({}, "linear", function () {
            $(selectedTableRow).fadeIn();
        }).removeClass("hidden").removeAttr("style");

        $(selectedTableRow).attr("aria-expanded", "true");
        $(selectedTableRow).next().children(":first-child").removeClass("hidden");
    }

    function closeTabular(selectedTableRow, flag) {

        if (!flag) // when flag is false. flag === false
            $('tbody tr[aria-expanded="true"]').each(function (index, value) {
                if (this.getAttribute("data-record-target") !== selectedTableRow.getAttribute("data-record-target")) { // skips the currently selected table row.

                    $(this).fadeIn("fast").animate({}, "linear", function () {
                        $(this).fadeIn();
                    }).removeClass("hidden").removeAttr("style")

                    $(this).attr("aria-expanded", "false");
                    $(this).next().children(":first-child").addClass("hidden");
                }
            });
        else { // works with a table row which is already open.
            $(selectedTableRow).fadeIn("fast").animate({}, "linear", function () {
                $(selectedTableRow).fadeIn();
            }).removeClass("hidden").removeAttr("style")
            $(selectedTableRow).attr("aria-expanded", "false");
            $(selectedTableRow).next().children(":first-child").addClass("hidden");
        }

    }

    function callAjaxToDeleteAdministrative(facultyId, departmentId, programManagerId, courseAdvisorId) {
        $.ajax({
            type: "POST",
            url: "asset/operation/ViewAdministrativeAjax.php",
            data: {
                deleteAdministrativeRole: true,
                facultyId: facultyId,
                departmentId: departmentId,
                programManagerId: programManagerId,
                courseAdvisorId: courseAdvisorId,
            },
            beforeSend: function () {
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (serverResponse, status) {
                let responseText = JSON.parse(serverResponse);
                console.log("Message : ", JSON.parse(serverResponse))
                if (responseText.status === 200) {
                    $("body").append(successfulMessageNotifier("Deleted Successfully", "The administrative role has been remove"));
                    $("#successNotifiedId").toggle("hidden").animate(
                        {right: 10}, 2000, function () {
                            window.location.reload();
                            $(this).delay(100).fadeOut().remove();
                        });
                    $(toRemoveTag).remove();
                }
            }
        });
    }

    function callAjaxToReloadData(designation, role) {
        $.ajax({
            type: "POST",
            url: "asset/operation/ViewAdministrativeAjax.php",
            data: {
                refreshSelectedRole: true,
                designation: designation,
                role: role,
            },
            beforeSend: function () {
                $(refreshBtn).removeClass("transform").addClass("animate-spin")
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (serverResponse, status) {
                const refreshIntervalId = setInterval(function () {
                    let responseText = JSON.parse(serverResponse)
                    console.log(responseText.message); // text format. php -> loadAdminData function.

                    $("tbody").children().slice(0).remove();
                    $("tbody").append(responseText.message);
                    $(refreshBtn).addClass("transform").removeClass("animate-spin")
                    clearInterval(refreshIntervalId);
                }, 1000);

            }
        });
    }

}