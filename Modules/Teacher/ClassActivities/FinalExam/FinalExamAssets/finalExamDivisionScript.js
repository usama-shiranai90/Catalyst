//Hannan's
let counterFinalExamQuestions = 0;
let CLONameList = new Array();
let CLOCodeList = new Array();

let initialFinalExamQuestions = [];
let initialFinalExamQuestionIDs = [];

function setNumberOfQuestion(number) {
    $('#numberOfFinalExamQuestionsID').attr("value", number)
    counterFinalExamQuestions = number;
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


function setInitialFinalExamQuestions(initialFinalExamQuestions) {
    this.initialFinalExamQuestions = initialFinalExamQuestions
}

function getInitialFinalExamQuestions() {
    return this.initialFinalExamQuestions;
}

function setInitialFinalExamQuestionIDs(initialFinalExamQuestionIDs) {
    this.initialFinalExamQuestionIDs = initialFinalExamQuestionIDs
}

function getInitialFinalExamQuestionIDs() {
    return this.initialFinalExamQuestionIDs;
}

window.onload = function () {

//Creating a FinalExam
    let createFinalExamBtn = document.getElementById("createFinalExamBtnID")
    let updateFinalExamBtn = document.getElementById("confirmFinalExamBtnID")
    let addQuestionsBtn = document.getElementById("addNewFinalExamQuestionBtnID")
    let finalExamQuestionsBox = document.getElementById("finalExamQuestionsBoxID")
    let totalMarksForFinalExam = document.getElementById("totalMarksForFinalExamID")
    let containsErrors = false

    function createElement() {
        counterFinalExamQuestions++;

        str = "<div class='grid grid-cols-7 items-center p-2'>\n" +
            "                        <div class='col-span-1 h-full flex items-center justify-center'>\n" +
            "                            <label name='questionLabel'>Question " + counterFinalExamQuestions + " </label>\n" +
            "                            <div class='verticalLine ml-2 mr-2'></div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <!--                Question Detail-->\n" +
            "                        <div class='col-span-3 flex flex-col items-center'>\n" +
            "                            <div class='textField-label-content w-full mb-0' id='question" + counterFinalExamQuestions + "DetailDivID'>\n" +
            "                            <label class='hidden' name='finalExamQuestion'>New Question</label>\n" +
            "                                <input class='textField m-1' type='text' placeholder=' ' id='question" + counterFinalExamQuestions + "DetailID'\n" +
            "                                       name='finalExamQuestions[" + counterFinalExamQuestions + "][Detail]'>\n" +
            "                                <label class='textField-label'>Detail</label>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <!--                Marks-->\n" +
            "                        <div class='col-span-1'>\n" +
            "                            <div class='textField-label-content w-full mb-0' id='question" + counterFinalExamQuestions + "MarksDivID'>\n" +
            "                                <input class='textField m-1' type='number' placeholder=' ' id='question" + counterFinalExamQuestions + "MarksID'\n" +
            "                                       name='finalExamQuestions[" + counterFinalExamQuestions + "][Marks]'>\n" +
            "                                <label class='textField-label'>Marks</label>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <!--                    CLO-->\n" +
            "                        <div class='select-label-content col-span-1 mb-0' id='question" + counterFinalExamQuestions + "CLODivID'>\n" +
            "                            <select class='select w-full m-1' name='finalExamQuestions[" + counterFinalExamQuestions + "][CLO]'\n" +
            "                                    onclick=\"this.setAttribute('value', this.value);\"\n" +
            "                                    onchange=\"this.setAttribute('value', this.value);\"\n" +
            "                                    value='' id='question" + counterFinalExamQuestions + "CLOID'>\n" +
            "                                <option value='' hidden></option>\n" +
            createCLODropdown() +
            "                            </select>\n" +
            "                            <label class='select-label'>CLO</label>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class='col-span-1 flex justify-center'>\n" +
            "                               <img class='cursor-pointer' name='deleteFinalExamQuestion' src='../../../../Assets/Images/vectorFiles/Icons/minus-red.svg'>" +
            "                        </div>\n" +
            "\n" +
            "                    </div>\n"

        var frag = document.createDocumentFragment();

        var elem = document.createElement('div');

        elem.innerHTML = str;

        while (elem.childNodes[0]) {
            frag.appendChild(elem.childNodes[0]);
        }
        return frag;
    }

    function createCLODropdown() {
        let options = "";
        for (let i = 0; i < getCLONameList().length; i++) {
            options += "<option value='" + getCLOCodeList()[i] + "'>" + getCLONameList()[i] + "</option>\n" //Get ClO's array from midtermDivision.php file through php
        }
        return options;
    }

    function addQuestions() {
        finalExamQuestionsBox.append(createElement())
    }

    function toggleCreateFinalExamConfirmDialogue() {
        let CreateFinalExamConfirmDialogueBox = document.getElementById("CreateFinalExamConfirmDialogueBoxID")
        let createFinalExam = document.getElementById("createFinalExamID")
        if (CreateFinalExamConfirmDialogueBox.classList.contains("hidden")) {
            CreateFinalExamConfirmDialogueBox.classList.remove("hidden")
        } else {
            CreateFinalExamConfirmDialogueBox.classList.add("hidden")
        }

        if (createFinalExam.classList.contains("blurBackground")) {
            createFinalExam.classList.remove("blurBackground")
        } else {
            createFinalExam.classList.add("blurBackground")
        }
    }

    function toggleUpdateFinalExamConfirmDialogue() {
        let updateFinalExamConfirmDialogueBox = document.getElementById("updateFinalExamConfirmDialogueBoxID")
        let createFinalExamBox = document.getElementById("createFinalExamID")
        if (updateFinalExamConfirmDialogueBox.classList.contains("hidden")) {
            updateFinalExamConfirmDialogueBox.classList.remove("hidden")
        } else {
            updateFinalExamConfirmDialogueBox.classList.add("hidden")
        }

        if (createFinalExamBox.classList.contains("blurBackground")) {
            createFinalExamBox.classList.remove("blurBackground")
        } else {
            createFinalExamBox.classList.add("blurBackground")
        }
    }


    $(document).ready(function () {
        //Creating a FinalExam
        $(addQuestionsBtn).click(function (event) {
            addQuestions()

            $("input").on("input", function () {
                $(this).closest('div').removeClass('textField-error-input')
                containsErrors = false
            })

            $("select").change(function () {
                $(this).closest('div').removeClass('select-error-input')
                containsErrors = false
            })

            $("img[name='deleteFinalExamQuestion']").click(function (event) {
                //using event.stopImmediatePropagation() to stop the code in this function from
                // executing on elements other than the clicked one but with same name
                event.stopImmediatePropagation()

                // Removing the question
                $(event.target).closest('div.grid.grid-cols-7.items-center.p-2').remove()

                //Decrementing the total questions counter
                counterFinalExamQuestions--;

                //Updating Question Numbers
                let newQuestionNumbers = 1;
                $('label[name = "questionLabel"]').each(function () {
                    $(this).text("Question " + newQuestionNumbers);
                    newQuestionNumbers++;
                })
                //Again set number of questions on deletion
                setNumberOfQuestion(counterFinalExamQuestions);
            })
            //set number of questions
            setNumberOfQuestion(counterFinalExamQuestions);
        })

        $(createFinalExamBtn).click(function (event) {
            checkFinalExamValidity(createFinalExamBtn, event)
        })
        
        $(updateFinalExamBtn).click(function (event) {
            checkFinalExamValidity(updateFinalExamBtn, event)
            if (!containsErrors){
                event.preventDefault()
                toggleUpdateFinalExamConfirmDialogue()
                $('#updateFinalExamConfirmID').click(function (event) {
                    executeFinalExamEditing()
                })
            }
        })

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


        $("#cancelBtnID").click(function () {
            toggleCreateFinalExamConfirmDialogue()
        })

        function checkFinalExamValidity(clickedButton, event) {
            $('#numberOfFinalExamQuestionsID').attr("value", counterFinalExamQuestions)

            //Getting the total marks of created questions
            let totalQuestionMarks = 0;
            $(finalExamQuestionsBox).find("input[type = 'number']").each(function () {
                totalQuestionMarks += parseInt($(this).val());
            })

            if (totalQuestionMarks > totalMarksForFinalExam.value || totalQuestionMarks < totalMarksForFinalExam.value) {
                $(finalExamQuestionsBox).find("input[type = 'number']").each(function () {
                    $(this).closest('div').addClass('textField-error-input')
                    containsErrors = true;
                })
                $(totalMarksForFinalExam).closest('div').addClass('textField-error-input')
            } else {
                $(finalExamQuestionsBox).find("input[type ='number']").each(function () {
                    $(this).closest('div').removeClass('textField-error-input')
                    containsErrors = false;
                })
                $(totalMarksForFinalExam).closest('div').removeClass('textField-error-input')
            }

            $('input[type = "number"]').on("input", function () {
                let totalQuestionMarks = 0;

                $(finalExamQuestionsBox).find("input[type = 'number']").each(function () {
                    totalQuestionMarks += parseInt($(this).val());
                })

                if (totalQuestionMarks == totalMarksForFinalExam.value) {
                    $(finalExamQuestionsBox).find("input[type ='number']").each(function () {
                        $(this).closest('div').removeClass('textField-error-input')
                        containsErrors = false;
                    })
                    $("#totalMarksForFinalExamID").closest('div').removeClass('textField-error-input')
                }
            })

            $("input").each(function (event) {
                if ($(this).val() == "" || $(this).val() <= 0) {
                    containsErrors = true
                    $(this).closest('div').addClass('textField-error-input')
                    let errorLabel = $(this).closest('div.mt-3.flex.flex-col.items-center').find('label.text-red-900')
                    errorLabel.removeClass("hidden")
                }
            })

            $("select").each(function (event) {
                if ($(this).val() == "" || $(this).val() < 0) {
                    containsErrors = true
                    $(this).closest('div').addClass('select-error-input')
                    let errorLabel = $(this).closest('div.mt-3.flex.flex-col.items-center').find('label.text-red-900')
                    errorLabel.removeClass("hidden")
                }
            })


            if (counterFinalExamQuestions > 0) {
                // event.preventDefault();
                if (containsErrors) {
                    event.preventDefault()
                    //I dont want to open dialogue box while I'm updating final exam, which is why I'm writing this condition below
                }
                else if ($(clickedButton).attr("id") == "createFinalExamBtnID") {
                    toggleCreateFinalExamConfirmDialogue()
                    event.preventDefault()
                }
            } else {
                // alert("Please add Questions")
                showErrorBox("Please add questions")
                event.preventDefault()
                containsErrors = true
            }
        }

        function showErrorBox(message) {
            $('#errorID span').text(message)
            $("#errorMessageDiv").removeClass("hidden").animate({right: 34}, 1000, function () {$(this).delay(1000).fadeOut();});
        }
      
        function executeFinalExamEditing() {
            event.preventDefault();

            let finalExamData = [];
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

            //Getting finalExam Questions data into a 2D array questionData
            $('#finalExamQuestionsBoxID input').add('#finalExamQuestionsBoxID select').each(function () {

                if ($(this)[0].tagName.toLowerCase() == "select") {
                    let questionID = $(this).closest('div.grid.grid-cols-7.items-center.p-2').find('label[name="finalExamQuestion"]').text()
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

            //getting the main finalExam data
            $('div.col-span-5.pt-5 input').each(function () {
                finalExamData.push($(this).val())
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
            deletedQuestionIDs = getInitialFinalExamQuestionIDs().filter(x => updatedQuestionIDs.indexOf(x) === -1);


            //storing IDs of questions that were neither deleted nor added

            console.log("Initial Questions are:", getInitialFinalExamQuestions())
            console.log("Initial Question IDs are:", getInitialFinalExamQuestions())

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

            $.ajax({
                type: "POST",
                url: 'FinalExamAssets/FinalExamEditingAJAX.php',
                data: {
                    finalExamID: finalExamID,
                    finalExamData: finalExamData,
                    insert: performInsert,
                    update: performUpdate,
                    delete: performDelete,
                    addedQuestions: addedQuestions,
                    updatedQuestions: updatedQuestions,
                    deletedQuestionIDs: deletedQuestionIDs
                },
                success: function (result) {
                    console.log(result)
                    window.location.replace("viewFinalExam.php?finalExamID="+ finalExamID);
                }
            });

        }
        
    })
}
