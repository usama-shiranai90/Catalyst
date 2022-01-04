/*Script would load when the whole page it is associated to is loaded along with its contents*/
window.onload = function () {

    /*Authentication Types*/

    let studentAuthBtn = document.getElementById("studentAuthenticationBtn")
    let teacherAuthBtn = document.getElementById("teacherAuthenticationBtn")
    let adminAuthBtn = document.getElementById("adminAuthenticationBtn")
    let studentAuthenticationBtnMobile = document.getElementById("studentAuthenticationBtnMobile")
    let teacherAuthenticationBtnMobile = document.getElementById("teacherAuthenticationBtnMobile")
    let adminAuthenticationBtnMobile = document.getElementById("adminAuthenticationBtnMobile")
    let studentAuthenticationPanel = document.getElementById("studentAuthenticationPanel")
    let teacherAuthenticationPanel = document.getElementById("teacherAuthenticationPanel")
    let adminAuthenticationPanel = document.getElementById("adminAuthenticationPanel")
    let authenticationTypesDropdown = document.getElementById("authenticationTypesDropdown")
    let dropdownContent = document.getElementById("dropdownContent")
    let iAm = document.getElementById("iAm")

    /*****************************************/


    /*Student Authentication*/

    let batch = document.getElementById("batch")
    let batchDiv = document.getElementById("batchDiv")
    let program = document.getElementById("program")
    let programDiv = document.getElementById("programDiv")
    let rollNo = document.getElementById("rollNo")
    let rollNoDiv = document.getElementById("rollNoDiv")
    let studentPassword = document.getElementById("studentPassword")
    let studentPasswordDiv = document.getElementById("studentPasswordDiv")

    /*Errors*/
    studentUsernameErrorLabel = document.getElementById("studentUsernameError")
    studentPassErrorLabel = document.getElementById("studentPassError")
    studentIncorrectPassErrorLabel = document.getElementById("studentIncorrectPass")

    /*login Button*/
    studentLoginBtn = document.getElementById("studentLoginBtnID")

    /*Boolean Checks*/
    incompleteUsername = true //would be turned false when username is complete
    incompletePassword = true //would be turned false when studentPassword is complete


    /*Teacher Authentication*/

    let teacherUsernameDiv = document.getElementById("teacherUsernameDiv")
    let teacherUsername = document.getElementById("teacherUsername")
    let teacherPassword = document.getElementById("teacherPassword")
    let teacherPasswordDiv = document.getElementById("teacherPasswordDiv")

    /*Errors*/
    teacherUsernameError = document.getElementById("teacherUsernameError")
    teacherPassErrorLabel = document.getElementById("teacherPassError")
    teacherIncorrectPassLabel = document.getElementById("teacherIncorrectPass")

    /*login Button*/
    teacherLoginBtn = document.getElementById("teacherLoginBtnID")

    /*Admin Authentication*/

    let adminUsernameDiv = document.getElementById("adminUsernameDiv")
    let adminUsername = document.getElementById("adminUsername")
    let adminPassword = document.getElementById("adminPassword")
    let adminPasswordDiv = document.getElementById("adminPasswordDiv")

    /*Errors*/
    adminUsernameError = document.getElementById("adminUsernameError")
    adminPassErrorLabel = document.getElementById("adminPassError")
    adminIncorrectPassLabel = document.getElementById("adminIncorrectPass")

    /*login Button*/
    adminLoginBtn = document.getElementById("adminLoginBtnID")


    /*  Authentication type dropdown for mobile     */
    function dropdown() {
        iAm.innerText = "Who are you?"
        dropdownContent.classList.remove("hidden")
    }

    function checkStudentUsername() {
        incompleteUsername = false //it would be turned back to true if any one of the below conditions execute
        if (batch.value === "") {
            batchDiv.classList.add("select-error-input")
            incompleteUsername = true
        }
        if (program.value == "") {
            programDiv.classList.add("select-error-input")
            incompleteUsername = true
        }
        if (rollNo.value == "") {
            rollNoDiv.classList.add("select-error-input")
            incompleteUsername = true
        }

        if (incompleteUsername) {
            studentUsernameErrorLabel.classList.toggle("hidden", false)
        } else {
            removeStudentUsernameError()
        }

    }

    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    function checkUsername(username, usernameDiv, usernameErrorLabel) {
        incompleteUsername = false //it would be turned back to true if any one of the below conditions execute
        if (username.value == "") {
            usernameErrorLabel.innerText = "Please enter your email address"
            incompleteUsername = true
        } else if (!validateEmail(username.value)) {
            usernameErrorLabel.innerText = "Please enter a valid email address"
            incompleteUsername = true
        }

        if (incompleteUsername) {
            usernameDiv.classList.toggle("textField-error-input", true)
            usernameErrorLabel.classList.toggle("hidden", false)
        } else {
            usernameDiv.classList.toggle("textField-error-input", false)
            usernameErrorLabel.classList.toggle("hidden", true)
        }
    }

    function checkPassword(passwordID, passwordDivID, passwordErrorLabelID) {
        incompletePassword = false

        if (passwordID.value == "") {
            passwordErrorLabelID.innerText = "Please enter your password"
            incompletePassword = true
        }
        if (passwordID.value !== "" && passwordID.value.length <= 8) {
            passwordErrorLabelID.innerText = "Password should be greater than 8 characters"
            incompletePassword = true
        }

        /*If incompletePassword is still true, then show the errors*/

        if (incompletePassword) {
            passwordDivID.classList.toggle("textField-error-input", true)
            passwordErrorLabelID.classList.toggle("hidden", false)
        } else {
            passwordDivID.classList.toggle("textField-error-input", false)
            passwordErrorLabelID.classList.toggle("hidden", true)
        }

    }

    function removeStudentUsernameError() {
        if (batch.value !== "" && program.value !== "" && rollNo.value !== "")
            studentUsernameErrorLabel.classList.toggle("hidden", true)
    }

    function removeUsernameError(username, usernameDiv, usernameErrorLabel) {
        if (username.value !== "") {
            usernameDiv.classList.toggle("textField-error-input", false)
            usernameErrorLabel.classList.toggle("hidden", true)
        }
    }

    function switchPanelNormal(selectedAuth) {
        panels = [studentAuthenticationPanel, teacherAuthenticationPanel, adminAuthenticationPanel]
        authBtns = [studentAuthBtn, teacherAuthBtn, adminAuthBtn]

        iAm.innerText = selectedAuth.innerText
        for (let i = 0; i < panels.length; i++) {
            if (selectedAuth.id == authBtns[i].id) {
                authBtns[i].classList.toggle("selected", true)
                panels[i].classList.toggle("hidden", false)
            } else {
                authBtns[i].classList.toggle("selected", false)
                panels[i].classList.toggle("hidden", true)

            }
        }
    }

    function switchPanelMobile(selectedAuth) {
        iAm.innerHTML = selectedAuth.innerHTML;
        dropdownContent.classList.add("hidden");
        let panels = [studentAuthenticationPanel, teacherAuthenticationPanel, adminAuthenticationPanel]
        let authBtns = [studentAuthenticationBtnMobile, teacherAuthenticationBtnMobile, adminAuthenticationBtnMobile]

        for (let i = 0; i < panels.length; i++) {
            if (selectedAuth.id == authBtns[i].id) {
                panels[i].classList.toggle("hidden", false)
            } else {
                panels[i].classList.toggle("hidden", true)
            }
        }
    }

    /**********************************************************/

    /*jQuery*/
    $(document).ready(function () {
        /*Authentication Type Switching*/

        $(studentAuthBtn).add(teacherAuthBtn).add(adminAuthBtn).click(function (event) {
            switchPanelNormal(this)
        });

        /*On Authentication Type Click from Mobile*/
        $(authenticationTypesDropdown).click(function () {
            dropdown()
        });

        $(studentAuthenticationBtnMobile).add(teacherAuthenticationBtnMobile).add(adminAuthenticationBtnMobile).click(function (event) {
            event.stopPropagation()
            switchPanelMobile(this)
        });

        /***********************************************/


        /*Student Authentication*/

        /*On Batch Input*/
        $(program).add(batch).on("input", function (e) {
            batchDiv.classList.remove("select-error-input")
            removeStudentUsernameError()
        });

        /*On Program Input*/
        $(program).on("input", function () {
            programDiv.classList.remove("select-error-input")
            removeStudentUsernameError()
        });

        /*On RollNo Input*/
        $(rollNo).on("input", function () {
            rollNoDiv.classList.remove("select-error-input")
            removeStudentUsernameError()

        });

        /*On Username Inputs*/
        $(teacherUsername).add(adminUsername).on("input", function () {
            if (this.id === teacherUsername.id) {
                removeUsernameError(teacherUsername, teacherUsernameDiv, teacherUsernameError)
            } else if (this.id === adminUsername.id) {
                removeUsernameError(adminUsername, adminUsernameDiv, adminUsernameError)
            }

        });


        /*On Password Input*/
        $(studentPassword).add(teacherPassword).add(adminPassword).on("input", function () {

            if (this.id === studentPassword.id) {
                studentPasswordDiv.classList.toggle("textField-error-input", false)
                studentPassErrorLabel.classList.toggle("hidden", true)
            } else if (this.id === teacherPassword.id) {
                teacherPasswordDiv.classList.toggle("textField-error-input", false)
                teacherPassErrorLabel.classList.toggle("hidden", true)
            } else if (this.id === adminPassword.id) {
                adminPasswordDiv.classList.toggle("textField-error-input", false)
                adminPassErrorLabel.classList.toggle("hidden", true)
            }
        });


        $(studentLoginBtn).add(teacherLoginBtn)
            .add(adminLoginBtn).click(function (event) {
            if (this.id == studentLoginBtn.id) {
                checkStudentUsername()
                checkPassword(studentPassword, studentPasswordDiv, studentPassErrorLabel)
            } else if (this.id == teacherLoginBtn.id) {
                checkUsername(teacherUsername, teacherUsernameDiv, teacherUsernameError)
                checkPassword(teacherPassword, teacherPasswordDiv, teacherPassErrorLabel)
            } else {
                checkUsername(adminUsername, adminUsernameDiv, adminUsernameError)
                checkPassword(adminPassword, adminPasswordDiv, adminPassErrorLabel)
            }
            if (incompleteUsername || incompletePassword) {
                event.preventDefault()
            }

        });

    });
}
