// const studentProfileViewSectionViewSection = document.getElementById('registerCourseDivID'); // .
// const studentProfileViewSectionUpdatableSection = document.getElementById('registerCourseDivID'); // .
// const studentProfileStaticOtherDataSection = document.getElementById('smpViewStaticDataSectionId'); // .

// let studentProfileViewLabelStudentName = document.getElementById('smpStudentNameId-view');
// let studentProfileViewLabelStudentEmail = document.getElementById('smpStudentEmailId-view');
// let studentProfileViewLabelStudentContact = document.getElementById('smpStudentContactId-view');
/*Script would load when the whole page it is associated to is loaded along with its contents*/

let containsError = false;
let isNotValidMail = true;
let newStudentName = "";
let newStudentPersonalEmail = "";
let newStudentContact = "";

let ops = '';
let oldPass = '';
let newPass = '';
let confirmPass = '';

window.onload = function () {

    const tabsArray = [document.getElementById('myProfileSettingTabID'), document.getElementById('curriculumSettingTabID'),
        document.getElementById('passwordSettingTabID'), document.getElementById('loginHistorySettingTabID')];

    const sectionsArray = [document.getElementById('studentMyProfileSectionID'), document.getElementById('studentCurriculumSectionID'),
        document.getElementById('studentPasswordSectionID'), document.getElementById('studentloginHistorySectionID')]

    /** My Profile */
    const studentProfileViewSectionSection = document.getElementById('smpViewSectionId');
    const studentProfileInputSectionSection = document.getElementById('smpUpdateSectionId');

    const studentProfileStudentNameField = document.getElementById('studentNameFieldID');
    const studentProfileStudentEmailField = document.getElementById('studentPersonalEmailFieldID');
    const studentProfileStudentContactField = document.getElementById('studentContactFieldID');

    const myprofileArray = [studentProfileStudentNameField, studentProfileStudentEmailField, studentProfileStudentContactField ];

    const viewStudentProfileButton = document.getElementById('viewStudentProfileBtn');
    const updateStudentProfileButton = document.getElementById('updateStudentProfileBtn');

    /** Password */

    let oldPasswordField = document.getElementById('studentOldPasswordFieldID');
    let newPasswordField = document.getElementById('studentNewPasswordFieldID');
    let confirmNewPasswordField = document.getElementById('studentConfirmPasswordFieldID');
    const passwordArray = [oldPasswordField, newPasswordField, confirmNewPasswordField];

    ops = $(oldPasswordField).attr("data-ref");

    let studentPassBtn = document.getElementById('updateStudentPasswordProfileBtn');


    $(document).ready(function () {

        /** click to hide student information view section and show input section my profile. */
        $(viewStudentProfileButton).on('click', function () {
            $(studentProfileViewSectionSection).addClass("hidden");
            $(viewStudentProfileButton).addClass("hidden");

            $(updateStudentProfileButton).removeClass("hidden");
            $(studentProfileInputSectionSection).removeClass("hidden");
        });

        /** it is used to remove error box when field is left empty. */
        $(myprofileArray).add(passwordArray).each(function () {
            $(this).on("input", function () {
                $(this).closest('div').removeClass('textField-error-input')
                $(this).closest("div.mt-3").find("label.text-red-900").addClass("hidden")
                containsErrors = false
            });
        })


        $(updateStudentProfileButton).on('click', function () {
            $(myprofileArray).each(function () {
                checkEmptyField(this)
                if ($(this).attr("name") === 'studentPersonalEmailField')
                    isNotValidMail = validateEmail(this)
            });

            if (isNotValidMail && containsError)
                showErrorBox("Empty Fields Alert!", "Please complete all fields to continue.")
            else if (isNotValidMail)
                showErrorBox("Invalid Email Format ", "please check your email format.")
            else if (containsError)
                showErrorBox("Empty Field", "please complete all the fields to continue")
            else {
                newStudentName = $(studentProfileStudentNameField).val();
                newStudentContact = $(studentProfileStudentContactField).val();
                newStudentPersonalEmail = $(studentProfileStudentEmailField).val();
                updateStudentProfileAjax(newStudentName, newStudentContact, newStudentPersonalEmail)
            }
        });

        $(studentPassBtn).on('click', function (e) {
            e.stopPropagation();
            $(passwordArray).each(function () {
                checkEmptyField(this)
            });

            if (($(newPasswordField).val() !== $(confirmNewPasswordField).val()) && containsError) {
                $(newPasswordField).closest('div').addClass('textField-error-input')
                $(confirmNewPasswordField).closest('div').addClass('textField-error-input')
                showErrorBox("Password mismatch", "please check your new password.")

            } else if (!checkEmptyField($(newPasswordField)) && $(newPasswordField).val().length <= 8) {
                $(newPasswordField).closest('div').addClass('textField-error-input')
                showErrorBox("Invalid Password Length", "Password should be greater than 8 characters.")
            } else if ($(oldPasswordField).val() === '' && $(newPasswordField).val() === '' && $(confirmNewPasswordField).val() === '') {
                showErrorBox("Empty Field ", 'please complete all fields to continue.')
            } else {
                oldPass = $(oldPasswordField).val();
                newPass = $(newPasswordField).val();
                confirmPass = $(confirmNewPasswordField).val();
                updateStudentPasswordAjax(oldPass, newPass)
            }

        })

        $(tabsArray).each(function (index, node) {
            $(this).on('click', function (e) {
                e.stopImmediatePropagation();
                navigateStudentSettingTabs(index, tabsArray, sectionsArray);
            })
        });

    });

    function updateStudentProfileAjax(newStudentName, newStudentContact, newStudentPersonalEmail) {
        $.ajax({
            type: "POST",
            url: 'assets/Operation/studentProfileAjax.php',
            data: {
                stuName: newStudentName,
                stuContact: newStudentContact,
                stuEmail: newStudentPersonalEmail,
                update_student_p: true
            },
            error: function (xhr, desc, err) {
                showErrorBox("Server Issue", "Something went wrong.")
                console.log("not working fine" + xhr + "\n" + desc + "\n" + err)
            },
            success: function (data, status) {
                const result = JSON.parse(data)
                if (result.status === 1 && result.errors === 'none') {
                    $('#smpStudentNameId-view').html(newStudentName);
                    $('#smpStudentEmailId-view').html(newStudentPersonalEmail);
                    $('#smpStudentContactId-view').html(newStudentContact);

                    $(studentProfileViewSectionSection).removeClass("hidden");
                    $(viewStudentProfileButton).removeClass("hidden");
                    $(updateStudentProfileButton).addClass("hidden");
                    $(studentProfileInputSectionSection).addClass("hidden");

                } else if (result.status === 0 && result.errors === "wrong-password") {
                    $("#studentNameFieldID , #studentPersonalEmailFieldID , #studentContactFieldID").closest('div').addClass('textField-error-input');
                    showErrorBox("Server Problem", "Something went wrong.")
                }
            },
        });
    }

    function updateStudentPasswordAjax(oldPass, newPass) {
        $.ajax({
            type: "POST",
            url: 'Operation/assets/studentProfileAjax.php',
            cache: false,
            data: {
                ops: ops,
                oldpass: oldPass,
                newpass: newPass,
                update_p: true
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (data, status) {
                const result = JSON.parse(data)
                if (result.status === 1 && result.errors === 'none') {
                    alert("Please Logout for change password to work.")
                } else if (result.status === 0 && result.errors === "wrong-password") {
                    $("#studentOldPasswordFieldID").closest('div').addClass('textField-error-input');
                    showErrorBox("Incorrect password", "please check your old password and make sure its correct.")
                    console.log("hello ?")
                }
            },
            complete: function (data) {
                /*setInterval(function () {
                    $("main").toggleClass("blur-filter");
                    $('#loader').toggleClass('hidden');
                    location.href = "StudentProfile.php";
                }, 2000);*/
            },
        });
    }

}

function navigateStudentSettingTabs(i, tabs, sectionsArray) { // i = 2;
    $(tabs).each(function (index, node) {
        if (index === i) {
            $(this).removeClass().addClass('sm:px-6 sm:w-auto sm:justify-start cursor-pointer inline-flex justify-center items-center py-3 w-1/2 rounded-t border-b-2 border-indigo-500 text-black tracking-wide leading-none student-profile-header-text my-0 ')
            tabsSectionVisibility(sectionsArray[index], true)
        } else {
            $(this).removeClass().addClass("sm:px-6 sm:w-auto cursor-pointer inline-flex justify-center items-center py-3 w-1/2 rounded-t border-b-2 text-gray-400 font-semibold tracking-normal leading-none student-profile-header-text my-0 transform transition ease-out duration-300 hover:scale-100 hover:-translate-y-0 hover:translate-x-0 hover:text-black hover:font-normal hover:border-black")
            tabsSectionVisibility(sectionsArray[index], false)
        }
    });
}

function checkEmptyField(currentField) {
    if ($(currentField).val() === '') {
        $(currentField).closest('div').addClass('textField-error-input')
        containsError = true
        return true;
    }
    return false;
}

function tabsSectionVisibility(currentSection, visibility) {
    if (visibility)
        $(currentSection).removeClass("hidden") //transform transition ease-out duration-500 scale-100 -translate-y-0 translate-x-0 text-black font-normal border-black
    else
        $(currentSection).addClass("hidden");
}

function validateEmail(currentField) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(currentField).val())) {
        containsError = false;
        return false
    } else {
        $(currentField).closest('div').addClass('textField-error-input');
        $(currentField).closest("div.mt-3").find("label").removeClass("hidden")
        containsError = true;
        showErrorBox("Invalid Email", "Please provide a valid address to continue")
        return true
    }
}

function showErrorBox(header = 'Empty Alert!', message) {
    $('#errorID span').text(header)
    $('#errorID').textNodes().first().replaceWith(message);
    $("#errorMessageDiv").toggle("hidden").animate(
        {right: 0,}, 3000, function () {
            $(this).delay(1000).fadeOut();
        });
}
