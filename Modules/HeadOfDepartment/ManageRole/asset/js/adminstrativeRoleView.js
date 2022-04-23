let toRemoveIndex;
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

        $(administrativeDesignationField).on('change', function (event) {

        })

        $(administrativeRoleField).on('change', function (event) {

        })

        $(refreshBtn).on('click', function (event) {

            if (containsEmptyField([administrativeDesignationField, administrativeRoleField])) {
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

        /** when a particular record is selected. */
        $(document).on('click', 'tbody tr[aria-expanded="false"]', function (event) {
            openTabular(this);
            closeTabular(this, false);
        })
        $(document).on('click', 'tbody tr[aria-expanded="true"]', function (event) {
            closeTabular(this, true);
        });

        /** it is used when the user wants to edit the role idk what the add right now. */
        $(document).on('click', 'button[id^="performRoleEdit-"]', function (event) {
        });

        /** it is used when the user wants to delete the respective role for a user. */
        let hId, pmId, caId, facultyID;
        let hasDepartment = false, hasProgram = false, hasAdvisor = false;
        $(document).on('click', 'button[id^="performRoleDeletion-"]', function (event) {
            // dischargedIndex = $(event.target).closest('.accordion-toggle.collapsed').attr("id").match(/\d+/)[0];
            event.stopImmediatePropagation();
            hId = -1;
            pmId = -1;
            caId = -1;
            facultyID = $(event.target).closest('.accordion-toggle.collapsed').children(":nth-child(1)").children(":first-child").text();
            toRemoveIndex = $(event.target).closest('.accordion-toggle.collapsed');
            if ($(event.target).closest('.accordion-toggle.collapsed').attr(`data-role-state-hod`) !== undefined) {
                hId = $(event.target).closest('.accordion-toggle.collapsed').attr(`data-role-state-hod`);
                hasDepartment = true;
            }
            if ($(event.target).closest('.accordion-toggle.collapsed').attr(`data-role-state-pm`) !== undefined) {
                pmId = $(event.target).closest('.accordion-toggle.collapsed').attr(`data-role-state-pm`);
                hasProgram = true;
            }
            if ($(event.target).closest('.accordion-toggle.collapsed').attr(`data-role-state-ca`) !== undefined) {
                caId = $(event.target).closest('.accordion-toggle.collapsed').attr(`data-role-state-ca`);
                hasAdvisor = true
            }

            if (hasDepartment || hasProgram || hasAdvisor) {
                const name = $(event.target).closest('.accordion-toggle.collapsed').children(":nth-child(2)").children(":first-child").text();
                const role = $(event.target).closest('.accordion-toggle.collapsed').children(":nth-child(4)").children(":first-child").text();
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

    function openTabular(selectedRecord) {
        $(selectedRecord).fadeIn("fast").animate({}, "linear", function () {
            $(selectedRecord).fadeIn();
        }).removeClass("hidden").removeAttr("style");

        $(selectedRecord).attr("aria-expanded", "true");
        $(selectedRecord).next().children(":first-child").removeClass("hidden");
    }

    function closeTabular(selectedRecord, flag) {

        if (!flag)
            $('tbody tr[aria-expanded="true"]').each(function (index, value) {
                if (this.getAttribute("data-record-target") !== selectedRecord.getAttribute("data-record-target")) {
                    $(this).fadeIn("fast").animate({}, "linear", function () {
                        $(this).fadeIn();
                    }).removeClass("hidden").removeAttr("style")

                    $(this).attr("aria-expanded", "false");
                    $(this).next().children(":first-child").addClass("hidden");
                }
            });
        else {
            $(selectedRecord).fadeIn("fast").animate({}, "linear", function () {
                $(selectedRecord).fadeIn();
            }).removeClass("hidden").removeAttr("style")
            $(selectedRecord).attr("aria-expanded", "false");
            $(selectedRecord).next().children(":first-child").addClass("hidden");
        }

    }

    function callAjaxToDeleteAdministrative(facultyId, departmentId, programManagerId, courseAdvisorId) {
        console.log(facultyId, departmentId, programManagerId, courseAdvisorId);
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
            },
            complete: function (response) {
                let responseText = JSON.parse(response.responseText);
                console.log("Message : ", JSON.parse(response.responseText))
                if (responseText.message) {
                    $("body").append(successfulMessageNotifier("Deleted Successfully", "The administrative role has been remove"));
                    $("#successNotifiedId").toggle("hidden").animate(
                        {right: 10}, 2000, function () {
                            $(this).delay(100).fadeOut().remove();
                        });
                    $(toRemoveIndex).remove();
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
            },
            complete: function (response) {
                const refreshIntervalId = setInterval(function () {
                    let responseText = JSON.parse(response.responseText)
                    $("tbody").children().slice(0).remove();
                    $("tbody").append(responseText.message);
                    $(refreshBtn).addClass("transform").removeClass("animate-spin")
                    clearInterval(refreshIntervalId);
                }, 1000);

            }
        });
    }

}