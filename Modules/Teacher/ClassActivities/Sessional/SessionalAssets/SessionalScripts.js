//Hannan's
// let editingMode = false;
let counterSessionalQuestions = 0;
let CLONameList = new Array();
let CLOCodeList = new Array();
let initialSessionalQuestions = [];
let initialSessionalQuestionIDs = [];

//Holds weightage of all the conducted sessionals of particular type
let accumulatedWeightageForQuizzes;
let accumulatedWeightageForAssignments;
let accumulatedWeightageForProjects;

//Holds the weightage defined in course profile for each type of sessional
let totalProposedWeightageForQuizzes;
let totalProposedWeightageForAssignments;
let totalProposedWeightageForProjects;

function setEditingMode(mode) {
    this.editingMode = mode;
}

function getEditingMode() {
    return this.editingMode;
}

function setNumberOfQuestion(number) {
    $('#numberOfQuestionsID').attr("value", number)
    counterSessionalQuestions = number;
}

function setCLONameList(CLONameList) {
    this.CLONameList = CLONameList;
}

function getCLONameList() {
    return this.CLONameList;
}

function setCLOCodeList(CLOCodeList) {
    this.CLOCodeList = CLOCodeList;
}

function getCLOCodeList() {
    return this.CLOCodeList;
}

function setInitialSessionalQuestions(initialSessionalQuestions) {
    this.initialSessionalQuestions = initialSessionalQuestions
}

function getInitialSessionalQuestions() {
    return this.initialSessionalQuestions;
}

function setInitialSessionalQuestionIDs(initialSessionalQuestionIDs) {
    this.initialSessionalQuestionIDs = initialSessionalQuestionIDs
}

function getInitialSessionalQuestionIDs() {
    return this.initialSessionalQuestionIDs;
}

function setAccumulatedWeightageForSessionals(accumulatedWeightageForAssignments, accumulatedWeightageForQuizzes, acculmulatedWeightageForProjects) {
    this.accumulatedWeightageForQuizzes = accumulatedWeightageForQuizzes
    this.accumulatedWeightageForAssignments = accumulatedWeightageForAssignments
    this.accumulatedWeightageForProjects = acculmulatedWeightageForProjects
}

function setTotalProposedWeightageForSessionals(totalWeightageForAssignments, totalWeightageForQuizzes, totalWeightageForProjects) {
    this.totalProposedWeightageForAssignments = totalWeightageForAssignments
    this.totalProposedWeightageForQuizzes = totalWeightageForQuizzes
    this.totalProposedWeightageForProjects = totalWeightageForProjects
}


// Maleeha's
window.onload = function () {


//Creating a sessional
    let createSessionalBtn = document.getElementById("createSessionalBtnID")
    let updateSessionalBtn = document.getElementById("confirmSessionalBtnID")
    let addQuestionsBtn = document.getElementById("addNewSessionalQuestionBtnID")
    let sessionalQuestionsBox = document.getElementById("sessionalQuestionsBoxID")
    let totalMarksForSessional = document.getElementById("totalMarksForSessionalID")
    let weightageForCurrentQuiz = document.getElementById("assignWeightageID")
    let weightageForCurrentAssignment = document.getElementById("assignWeightageID")
    let weightageForCurrentProject = document.getElementById("assignWeightageID")
    let containsErrors = false;

    function createElement() {
        counterSessionalQuestions++; //stores the number of questions

        questionBox = "<div class='grid grid-cols-7 items-center p-2'>\n" +
            "                        <div class='col-span-1 h-full flex items-center justify-center'>\n" +
            "                            <label name='questionLabel' >Question " + counterSessionalQuestions + " </label>\n" +
            "                            <div class='verticalLine ml-2 mr-2'></div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <!--                Question Detail-->\n" +
            "                        <div class='col-span-3 flex flex-col items-center'>\n" +
            "                            <div class='textField-label-content w-full mb-0' id='question" + counterSessionalQuestions + "DetailDivID'>\n" +
            "                               <label class='hidden' name='sessionalQuestion'>New Question</label>\n" +
            "                               <input class='textField m-1' type='text' placeholder=' ' id='question" + counterSessionalQuestions + "DetailID'\n" +
            "                                       name='sessionalQuestions[" + counterSessionalQuestions + "][Detail]'>\n" +
            "                                <label class='textField-label'>Detail</label>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <!--                Marks-->\n" +
            "                        <div class='col-span-1'>\n" +
            "                            <div class='textField-label-content w-full mb-0' id='question" + counterSessionalQuestions + "MarksDivID'>\n" +
            "                                <input class='textField m-1' type='number' placeholder=' ' id='question" + counterSessionalQuestions + "MarksID'\n" +
            "                                       name='sessionalQuestions[" + counterSessionalQuestions + "][Marks]'>\n" +
            "                                <label class='textField-label'>Marks</label>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class='select-label-content col-span-1 mb-0' id='question" + counterSessionalQuestions + "CLODivID'>\n" +
            "                            <select class='select w-full m-1' name='sessionalQuestions[" + counterSessionalQuestions + "][CLO]'\n" +
            "                                    onclick=\"this.setAttribute('value', this.value);\"\n" +
            "                                    onchange=\"this.setAttribute('value', this.value);\"\n" +
            "                                    value='' id='question" + counterSessionalQuestions + "CLOID'>\n" +
            "                                   <option value='' hidden></option>\n" +
            createCLODropdown() +
            "                            </select>\n" +
            "                            <label class='select-label'>CLO</label>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class='col-span-1 flex justify-center'>\n" +
            "                               <img class='cursor-pointer' name='deleteSessionalQuestion' src='../../../../Assets/Images/vectorFiles/Icons/minus-red.svg'>" +
            "                        </div>\n" +
            "\n" +
            "                    </div>\n"

        var frag = document.createDocumentFragment();

        var elem = document.createElement('div'); //create a new div

        elem.innerHTML = questionBox; //put questionBox code inside elem div

        while (elem.childNodes[0]) { //Takes first child from questionBox
            frag.appendChild(elem.childNodes[0]); //Append a node to fragment
        }
        return frag;
    }

    //Creates CLO dropdown values
    function createCLODropdown() {
        let options = "";
        for (let i = 0; i < getCLONameList().length; i++) {
            options += "<option value='" + getCLOCodeList()[i] + "'>" + getCLONameList()[i] + "</option>\n" //Get ClO's array from addNewSessional.php file through php
        }
        return options;
    }

    //function to add questions
    function addQuestions() {
        sessionalQuestionsBox.append(createElement())
    }

    function toggleCreateSessionalConfirmDialogue() {
        let CreateSessionalConfirmDialogueBox = document.getElementById("CreateSessionalConfirmDialogueBoxID")
        let createSessional = document.getElementById("createSessionalID")
        if (CreateSessionalConfirmDialogueBox.classList.contains("hidden")) {
            CreateSessionalConfirmDialogueBox.classList.remove("hidden") //Remove the hidden class and show when create button is pressed
        } else {
            CreateSessionalConfirmDialogueBox.classList.add("hidden") //This dialog box will stay hidden until create button is pressed
        }

        if (createSessional.classList.contains("blurBackground")) {
            createSessional.classList.remove("blurBackground") //When dialog box disappear the background blur will set to normal
        } else {
            createSessional.classList.add("blurBackground") //When dialog box appears the background will become blur
        }
    }


    function toggleUpdateSessionalConfirmDialogue() {
        let updateSessionalConfirmDialogueBox = document.getElementById("updateSessionalConfirmDialogueBoxID")
        let createSessionalBox = document.getElementById("createSessionalID")
        if (updateSessionalConfirmDialogueBox.classList.contains("hidden")) {
            updateSessionalConfirmDialogueBox.classList.remove("hidden") //Remove the hidden class and show when update button is pressed
        } else {
            updateSessionalConfirmDialogueBox.classList.add("hidden") //This dialog box will stay hidden until update button is pressed
        }

        if (createSessionalBox.classList.contains("blurBackground")) {
            createSessionalBox.classList.remove("blurBackground") //When dialog box disappear the background blur will set to normal
        } else {
            createSessionalBox.classList.add("blurBackground") //When dialog box appears the background will become blur
        }
    }



    $(document).ready(function () {
        //Creating a sessional
        //Add number of question when clicked on plus sign
        $(addQuestionsBtn).click(function (event) {
            addQuestions()

            $("input").on("input", function () { //Considers all inputs
                $(this).closest('div').removeClass('textField-error-input') //Closest will go above the div and then remove class from closest
                containsErrors = false //Because it doesn't have errors
            })

            $("select").change(function () { //Considers all dropdowns
                $(this).closest('div').removeClass('select-error-input') //Closest will go above the div and then remove class from closest
                containsErrors = false
            })

            $("img[name='deleteSessionalQuestion']").click(function (event) { //Consider the image having name deleteSessionalQuestion
                //using event.stopImmediatePropagation() to stop the code in this function from
                // executing on elements other than the clicked one but with same name
                event.stopImmediatePropagation()

                //Removing the question when we click on minus sign
                $(event.target).closest('div.grid.grid-cols-7.items-center.p-2').remove()

                //Decrementing the total questions counter
                counterSessionalQuestions--;

                //Updating Question Numbers
                let newQuestionNumbers = 1;
                $('label[name = "questionLabel"]').each(function () { //Considers label with name questionLabel
                    $(this).text("Question " + newQuestionNumbers); //Takes the first label and give it question number 1
                    newQuestionNumbers++; //It will increment for the number of questions added
                })
                //Again set number of questions on deletion
                setNumberOfQuestion(counterSessionalQuestions);
            })
            //set number of questions
            setNumberOfQuestion(counterSessionalQuestions);
        })

        //When create button is clicked
        $(createSessionalBtn).click(function (event) {
            checkSessionalValidity(createSessionalBtn, event)
        })

        //function below is Hannan's
        $(updateSessionalBtn).click(function (event) {
            checkSessionalValidity(updateSessionalBtn, event)
            if (!containsErrors){
                event.preventDefault()
                toggleUpdateSessionalConfirmDialogue()
                $('#updateSessionalConfirmID').click(function (event) {
                executeEditing()
                })
            }
        })


        //Maliha's Work
        //For removing errors from inputs
        $("input").on("input", function () {
            $(this).closest('div').removeClass('textField-error-input')
            let errorLabel = $(this).closest('div.mt-3.flex.flex-col.items-center').find('label.text-red-900')
            errorLabel.addClass("hidden")
            containsErrors = false
        })

        //For removing errors from selects
        $("select").change(function () {
            $(this).closest('div').removeClass('select-error-input')
            let errorLabel = $(this).closest('div.mt-3.flex.flex-col.items-center').find('label.text-red-900')
            errorLabel.addClass("hidden")
            containsErrors = false
        })

        //If cancel button on dialog box is clicked following function will be performed
        $("#cancelBtnID").click(function () {
            toggleCreateSessionalConfirmDialogue()
        })

        $("#cancelUpdateBtnID").click(function () {
            toggleUpdateSessionalConfirmDialogue()
        })

        function checkSessionalValidity(clickedButton, event) {
            $('#numberOfQuestionsID').attr("value", counterSessionalQuestions)

            //Getting the total marks of created questions
            let totalQuestionMarks = 0;

            $(sessionalQuestionsBox).find("input[type = 'number']").each(function () {
                totalQuestionMarks += parseInt($(this).val()); //Adding the marks of each question to a single variable
            })

            //Gives error if totalQuestionMarks and totalMarksForSessional values are not matched
            if (totalQuestionMarks > totalMarksForSessional.value || totalQuestionMarks < totalMarksForSessional.value) {
                $(sessionalQuestionsBox).find("input[type = 'number']").each(function () {
                    $(this).closest('div').addClass('textField-error-input')
                    containsErrors = true;
                })
                $(totalMarksForSessional).closest('div').addClass('textField-error-input')
            }
            else {
                //Removes error if totalQuestionMarks and totalMarksForSessional values are matched
                $(sessionalQuestionsBox).find("input[type = 'number']").each(function () {
                    $(this).closest('div').removeClass('textField-error-input')
                    containsErrors = false;
                })
                $(totalMarksForSessional).closest('div').removeClass('textField-error-input')
            }

            //In order to change the error after validating the weightages
            let errorLabel = $("#assignWeightageID").closest('div.mt-3.flex.flex-col.items-center').find('label.text-red-900')
            errorLabel.text("Please enter weightage")

            //Validating weightages of Assignmnet
            if ($("#newSessionalTypeID").val() == "Assignment") {
                //Add the weightageForCurrentAssignment to accumulatedWeightageForAssignments and stores in totalWeightage variable
                let totalWeightage = (parseInt(this.accumulatedWeightageForAssignments) + parseInt($(weightageForCurrentAssignment).val()));
                //If totalWeightage and totalProposedWeightageForAssignments are not matched it gives error

                if(getEditingMode() == true){
                    totalWeightage -= parseInt($(weightageForCurrentAssignment).val())
                }

                if (totalWeightage > parseInt(this.totalProposedWeightageForAssignments)) {
                    $("#assignWeightageID").closest('div').addClass('textField-error-input')
                    let errorLabel = $("#assignWeightageID").closest('div.mt-3.flex.flex-col.items-center').find('label.text-red-900')
                    errorLabel.text("Weightage for this assignment exceeds the limit by " + (totalWeightage - parseInt(this.totalProposedWeightageForAssignments)))
                    errorLabel.removeClass("hidden")
                    containsErrors = true;
                }

            } else
                //Validating weightages of Quiz
            if ($("#newSessionalTypeID").val() == "Quiz") {
                //Add the weightageForCurrentAssignment to accumulatedWeightageForAssignments and stores in totalWeightage variable
                let totalWeightage = (parseInt(this.accumulatedWeightageForQuizzes) + parseInt($(weightageForCurrentQuiz).val()));

                if(getEditingMode() == true){
                    totalWeightage -= parseInt($(weightageForCurrentQuiz).val())
                }

                //If totalWeightage and totalProposedWeightageForAssignments are not matched it gives error
                if (totalWeightage > parseInt(this.totalProposedWeightageForQuizzes)) {
                    $("#assignWeightageID").closest('div').addClass('textField-error-input')
                    let errorLabel = $("#assignWeightageID").closest('div.mt-3.flex.flex-col.items-center').find('label.text-red-900')
                    errorLabel.text("Weightage for this quiz exceeds the limit by " + (totalWeightage - parseInt(this.totalProposedWeightageForQuizzes)))
                    errorLabel.removeClass("hidden")
                    containsErrors = true;
                }
            } else
                //Validating weightages of Project
            if ($("#newSessionalTypeID").val() == "Project") {
                //Add the weightageForCurrentAssignment to accumulatedWeightageForAssignments and stores in totalWeightage variable
                let totalWeightage = (parseInt(this.accumulatedWeightageForProjects) + parseInt($(weightageForCurrentProject).val()));


                if(getEditingMode() == true){
                    totalWeightage -= parseInt($(weightageForCurrentProject).val())
                }


                //If totalWeightage and totalProposedWeightageForAssignments are not matched it gives error
                if (totalWeightage > parseInt(this.totalProposedWeightageForProjects)) {
                    $("#assignWeightageID").closest('div').addClass('textField-error-input')
                    let errorLabel = $("#assignWeightageID").closest('div.mt-3.flex.flex-col.items-center').find('label.text-red-900')
                    errorLabel.text("Weightage for this project exceeds the limit by " + (totalWeightage - parseInt(this.totalProposedWeightageForProjects)))
                    errorLabel.removeClass("hidden")
                    containsErrors = true;
                }
            }

            $('input[type = "number"]').on("input", function () { //Considers all inputs having type number
                let totalQuestionMarks = 0;

                $(sessionalQuestionsBox).find("input[type = 'number']").each(function () {
                    totalQuestionMarks += parseInt($(this).val()); //Add marks of each question and stores in totalQuestionMarks
                })


                if (totalMarksForSessional.value != 0) { //First check totalMarksForSessional is not equal to zero
                    if (totalQuestionMarks == totalMarksForSessional.value) { //Check if totalQuestionMarks and totalMarksForSessional values are equal
                        $(sessionalQuestionsBox).find("input[type ='number']").each(function () {
                            $(this).closest('div').removeClass('textField-error-input')
                            containsErrors = false;
                        })
                        $("#totalMarksForSessionalID").closest('div').removeClass('textField-error-input')
                    }
                }
            })

            //Gives error when the input fields are empty and value is less than r equal to zero
            $("input").each(function (event) {
                if ($(this).val() == "" || $(this).val() <= 0) {
                    containsErrors = true
                    $(this).closest('div').addClass('textField-error-input')
                    let errorLabel = $(this).closest('div.mt-3.flex.flex-col.items-center').find('label.text-red-900')
                    errorLabel.removeClass("hidden")
                }
            })

            //Gives error when no option is selected in dropdown(select)
            $("select").each(function (event) {
                if ($(this).val() == "") {
                    containsErrors = true
                    $(this).closest('div').addClass('select-error-input')
                    let errorLabel = $(this).closest('div.mt-3.flex.flex-col.items-center').find('label.text-red-900')
                    errorLabel.removeClass("hidden")
                }
            })


            if (counterSessionalQuestions > 0) { //Check weather numberOfQuestion > 0
                if (containsErrors) {
                    event.preventDefault()
                    //I don't want to open dialogue box while I'm updating any sessional, which is why I'm writing this condition below
                }
                else if ($(clickedButton).attr("id") == "createSessionalBtnID") {
                    toggleCreateSessionalConfirmDialogue()
                    event.preventDefault()
                }
            }
            else {
                //Shows alert if the number of questions are zero
                showErrorBox("Please add questions")
                containsErrors = true;
                event.preventDefault()
            }
        }

        //Function to show alert
        function showErrorBox(message) {
            $('#errorID span').text(message)
            $("#errorMessageDiv").removeClass("hidden").animate({right: 34}, 1000, function () {
                $(this).delay(1000).fadeOut(); //To make alert disappear after some time
            });
        }

        //Hannan's Work
        function executeEditing() {

            let sessionalData = [];
            let performInsert = false;
            let performDelete = false;
            let performUpdate = false;

            //newQuestions array holds the newly added questions
            let allQuestionData = []; //Stores all questions present at the time of clicking update button
            let allQuestionIDs = []; //Stores IDs of all questions present at the time of clicking update button

            let updatedQuestions = []; //Stores questions that need to be updated
            let updatedQuestionIDs = []; //Stores IDs of questions that need to be updated

            let deletedQuestionIDs = []; //Stores IDs of questions that need to be added

            let addedQuestions = []; //Stores questions that need to be added
            let addedQuestionIDs = []; //Stores IDs of questions that need to be added
            let temp = []


            //Getting sessional Data into array


            //Getting sessional Questions data into a 2D array questionData
            $('#sessionalQuestionsBoxID input').add('#sessionalQuestionsBoxID select').each(function () {

                if ($(this)[0].tagName.toLowerCase() == "select") {
                    let questionID = $(this).closest('div.grid.grid-cols-7.items-center.p-2').find('label[name="sessionalQuestion"]').text()
                    //pushing questionID into allQuestionIDs array so that I can use them later
                    allQuestionIDs.push(questionID)

                    //pushing questionID at the start of temp array
                    temp.unshift(questionID)
                    //pushing value of select into temp array
                    temp.push($(this).val())

                    //pushing the question into questionData array
                    //since select box is the last thing in each question so when we reach this statement,
                    // I'd be having all data of current question, therefore I can push it into array allQuestionData
                    allQuestionData.push(temp)
                    temp = []
                } else {
                    temp.push($(this).val())
                }
            })

            //getting the main sessional data
            $('div.col-span-5.pt-5 input').each(function () {
                sessionalData.push($(this).val())
            })

            //checking for newly added questions and separating them from existing questions, if any
            for (var i = 0; i < allQuestionData.length; i++) {
                var question = allQuestionData[i];

                if (question[0] == "New Question") {
                    addedQuestions.push(allQuestionData[i])
                    addedQuestionIDs.push(allQuestionData[i][0])
                    continue
                }
                updatedQuestions.push(allQuestionData[i]) //storing question
                updatedQuestionIDs.push(allQuestionData[i][0]) //storing questionID
            }

            /*Getting IDs of deleted question
            deletedQuestionIDs would have the IDs of questions which were present in initialQuestionIDs but then were not in updatedQuestionIDs
            Compared with updatedQuestionIDs because a question which is not a new one is sent into updatedQuestions and obviously
            when we delete a question, it would not be present in updatedQuestions*/
            deletedQuestionIDs = getInitialSessionalQuestionIDs().filter(x => updatedQuestionIDs.indexOf(x) === -1);


            //storing IDs of questions that were neither deleted nor added

            console.log("Initial Questions are:", getInitialSessionalQuestions())
            console.log("Initial Question IDs are:", getInitialSessionalQuestionIDs())

            if (addedQuestions.length > 0) {
                performInsert = true;
                console.log("New Questions are:", addedQuestions)
                console.log("Ids of New Questions are:", addedQuestionIDs)
            }
            if (deletedQuestionIDs.length > 0) {
                performDelete = true;
                console.log("IDs of Questions to delete are:", deletedQuestionIDs)
            }
            if (updatedQuestionIDs.length > 0) {
                performUpdate = true;
                console.log("Questions to update are:", updatedQuestions)
                console.log("IDs Questions to update are:", updatedQuestionIDs)
            }

            console.log(performInsert, performUpdate, performDelete, "\n----------------")

            console.log(sessionalData);
            $.ajax({
                type: "POST",
                url: 'SessionalAssets/SessionalEditingAJAX.php',
                data: {
                    sessionalID: sessionalID,
                    sessionalData: sessionalData,
                    insert: performInsert,
                    update: performUpdate,
                    delete: performDelete,
                    addedQuestions: addedQuestions,
                    updatedQuestions: updatedQuestions,
                    deletedQuestionIDs: deletedQuestionIDs
                },
                success: function (result) {
                    console.log(result)
                    window.location.replace("ViewSessional.php?sessionalID="+ sessionalID);
                }
            });

        }
    })


}


