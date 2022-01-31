//Hannan's
let counterMidtermQuestions = 0;
let CLONameList = new Array();
let CLOCodeList = new Array();

let initialMidtermQuestions = [];
let initialMidtermQuestionIDs = [];

function setNumberOfQuestion(number) {
    $('#numberOfMidtermQuestionsID').attr("value", number)
    counterMidtermQuestions = number;
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


function setInitialMidtermQuestions(initialMidtermQuestions) {
    this.initialMidtermQuestions = initialMidtermQuestions
}

function getInitialMidtermQuestions() {
    return this.initialMidtermQuestions;
}

function setInitialMidtermQuestionIDs(initialMidtermQuestionIDs) {
    this.initialMidtermQuestionIDs = initialMidtermQuestionIDs
}

function getInitialMidtermQuestionIDs() {
    return this.initialMidtermQuestionIDs;
}

// Maleeha's'

window.onload = function () {

//Creating a Midterm
    let createMidtermBtn = document.getElementById("createMidtermBtnID")
    let updateMidtermBtn = document.getElementById("confirmMidtermBtnID")
    let addQuestionsBtn = document.getElementById("addNewMidtermQuestionBtnID")
    let midtermQuestionsBox = document.getElementById("midtermQuestionsBoxID")
    let totalMarksForMidterm = document.getElementById("totalMarksForMidtermID")
    let containsErrors = false

    function createElement() {
        counterMidtermQuestions++;

        str = "<div class='grid grid-cols-7 items-center p-2'>\n" +
            "                        <div class='col-span-1 h-full flex items-center justify-center'>\n" +
            "                            <label name='questionLabel'>Question " + counterMidtermQuestions + " </label>\n" +
            "                            <div class='verticalLine ml-2 mr-2'></div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <!--                Question Detail-->\n" +
            "                        <div class='col-span-3 flex flex-col items-center'>\n" +
            "                            <div class='textField-label-content w-full mb-0' id='question" + counterMidtermQuestions + "DetailDivID'>\n" +
            "                            <label class='hidden' name='midtermQuestion'>New Question</label>\n" +
            "                                <input class='textField m-1' type='text' placeholder=' ' id='question" + counterMidtermQuestions + "DetailID'\n" +
            "                                       name='midtermQuestions[" + counterMidtermQuestions + "][Detail]'>\n" +
            "                                <label class='textField-label'>Detail</label>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <!--                Marks-->\n" +
            "                        <div class='col-span-1'>\n" +
            "                            <div class='textField-label-content w-full mb-0' id='question" + counterMidtermQuestions + "MarksDivID'>\n" +
            "                                <input class='textField m-1' type='number' placeholder=' ' id='question" + counterMidtermQuestions + "MarksID'\n" +
            "                                       name='midtermQuestions[" + counterMidtermQuestions + "][Marks]'>\n" +
            "                                <label class='textField-label'>Marks</label>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <!--                    CLO-->\n" +
            "                        <div class='select-label-content col-span-1 mb-0' id='question" + counterMidtermQuestions + "CLODivID'>\n" +
            "                            <select class='select w-full m-1' name='midtermQuestions[" + counterMidtermQuestions + "][CLO]'\n" +
            "                                    onclick=\"this.setAttribute('value', this.value);\"\n" +
            "                                    onchange=\"this.setAttribute('value', this.value);\"\n" +
            "                                    value='' id='question" + counterMidtermQuestions + "CLOID'>\n" +
            "                                <option value='' hidden></option>\n" +
            createCLODropdown() +
            "                            </select>\n" +
            "                            <label class='select-label'>CLO</label>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class='col-span-1 flex justify-center'>\n" +
            "                               <img class='cursor-pointer' name='deleteMidtermQuestion' src='../../../../Assets/Images/vectorFiles/Icons/minus-red.svg'>" +
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

    //Creates CLO dropdown values
    function createCLODropdown() {
        let options = "";
        for (let i = 0; i < getCLONameList().length; i++) {
            options += "<option value='" + getCLOCodeList()[i] + "'>" + getCLONameList()[i] + "</option>\n" //Get ClO's array from midtermDivision.php file through php
        }
        return options;
    }

    function addQuestions() {
        midtermQuestionsBox.append(createElement())
    }

    function toggleCreateMidtermConfirmDialogue() {
        let CreateMidtermConfirmDialogueBox = document.getElementById("CreateMidtermConfirmDialogueBoxID")
        let createMidterm = document.getElementById("createMidtermID")
        if (CreateMidtermConfirmDialogueBox.classList.contains("hidden")) {
            CreateMidtermConfirmDialogueBox.classList.remove("hidden")
        } else {
            CreateMidtermConfirmDialogueBox.classList.add("hidden")
        }

        if (createMidterm.classList.contains("blurBackground")) {
            createMidterm.classList.remove("blurBackground")
        } else {
            createMidterm.classList.add("blurBackground")
        }
    }

    function toggleUpdateMidtermConfirmDialogue() {
        let updateMidtermConfirmDialogueBox = document.getElementById("updateMidtermConfirmDialogueBoxID")
        let createMidtermBox = document.getElementById("createMidtermID")
        if (updateMidtermConfirmDialogueBox.classList.contains("hidden")) {
            updateMidtermConfirmDialogueBox.classList.remove("hidden")
        } else {
            updateMidtermConfirmDialogueBox.classList.add("hidden")
        }

        if (createMidtermBox.classList.contains("blurBackground")) {
            createMidtermBox.classList.remove("blurBackground")
        } else {
            createMidtermBox.classList.add("blurBackground")
        }
    }


    $(document).ready(function () {
        //Creating a Midterm
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

            $("img[name='deleteMidtermQuestion']").click(function (event) {
                //using event.stopImmediatePropagation() to stop the code in this function from
                // executing on elements other than the clicked one but with same name
                event.stopImmediatePropagation()

                // Removing the question
                $(event.target).closest('div.grid.grid-cols-7.items-center.p-2').remove()

                //Decrementing the total questions counter
                counterMidtermQuestions--;

                //Updating Question Numbers
                let newQuestionNumbers = 1;
                $('label[name = "questionLabel"]').each(function () {
                    $(this).text("Question " + newQuestionNumbers);
                    newQuestionNumbers++;
                })
                //Again set number of questions on deletion
                setNumberOfQuestion(counterMidtermQuestions);
            })
            //set number of questions
            setNumberOfQuestion(counterMidtermQuestions);
        })

        $(createMidtermBtn).click(function (event) {
            checkMidtermValidity(createMidtermBtn, event)
        })
        $(updateMidtermBtn).click(function (event) {
            checkMidtermValidity(updateMidtermBtn, event)
            if (!containsErrors){
                event.preventDefault()
                toggleUpdateMidtermConfirmDialogue()
                $('#updateMidtermConfirmID').click(function (event) {
                    executeMidtermEditing()
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
            toggleCreateMidtermConfirmDialogue()
        })

        $("#cancelMidtermUpdateBtnID").click(function () {
            toggleUpdateMidtermConfirmDialogue()
        })


        function checkMidtermValidity(clickedButton, event) {
            $('#numberOfMidtermQuestionsID').attr("value", counterMidtermQuestions)

            //Getting the total marks of created questions
            let totalQuestionMarks = 0;
            $(midtermQuestionsBox).find("input[type = 'number']").each(function () {
                totalQuestionMarks += parseInt($(this).val());
            })

            if (totalQuestionMarks > totalMarksForMidterm.value || totalQuestionMarks < totalMarksForMidterm.value) {
                $(midtermQuestionsBox).find("input[type = 'number']").each(function () {
                    $(this).closest('div').addClass('textField-error-input')
                    containsErrors = true;
                })
                $(totalMarksForMidterm).closest('div').addClass('textField-error-input')
            } else {
                $(midtermQuestionsBox).find("input[type = 'number']").each(function () {
                    $(this).closest('div').removeClass('textField-error-input')
                    containsErrors = false;
                })
                $(totalMarksForMidterm).closest('div').removeClass('textField-error-input')
            }

            $('input[type = "number"]').on("input", function () {
                let totalQuestionMarks = 0;

                $(midtermQuestionsBox).find("input[type = 'number']").each(function () {
                    totalQuestionMarks += parseInt($(this).val());
                })

                if (totalQuestionMarks == totalMarksForMidterm.value) {
                    $(midtermQuestionsBox).find("input[type ='number']").each(function () {
                        $(this).closest('div').removeClass('textField-error-input')
                        containsErrors = false;
                    })
                    $("#totalMarksForMidtermID").closest('div').removeClass('textField-error-input')
                }
            })


            $("input").each(function (event) {
                if ($(this).val() == "" || $(this).val() <= 0) {
                    containsErrors = true;
                    $(this).closest('div').addClass('textField-error-input')
                    let errorLabel = $(this).closest('div.mt-3.flex.flex-col.items-center').find('label.text-red-900')
                    errorLabel.removeClass("hidden")
                }
            })

            $("select").each(function (event) {
                if ($(this).val() == "" || $(this).val() < 0) {
                    containsErrors = true;
                    $(this).closest('div').addClass('select-error-input')
                    let errorLabel = $(this).closest('div.mt-3.flex.flex-col.items-center').find('label.text-red-900')
                    errorLabel.removeClass("hidden")
                }
            })

            if (counterMidtermQuestions > 0) {

                if (containsErrors) {
                    event.preventDefault()
                    //I dont want to open dialogue box while I'm updating midterm exam, which is why I'm writing this condition below
                } else if ($(clickedButton).attr("id") == "createMidtermBtnID") {
                    toggleCreateMidtermConfirmDialogue()
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

        function executeMidtermEditing() {
            event.preventDefault();

            let midtermData = [];
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

            //Getting midterm Questions data into a 2D array questionData
            $('#midtermQuestionsBoxID input').add('#midtermQuestionsBoxID select').each(function () {

                if ($(this)[0].tagName.toLowerCase() == "select") {
                    let questionID = $(this).closest('div.grid.grid-cols-7.items-center.p-2').find('label[name="midtermQuestion"]').text()
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

            //getting the main midterm data
            $('div.col-span-5.pt-5 input').each(function () {
                midtermData.push($(this).val())
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
            deletedQuestionIDs = getInitialMidtermQuestionIDs().filter(x => updatedQuestionIDs.indexOf(x) === -1);


            //storing IDs of questions that were neither deleted nor added

            console.log("Initial Questions are:", getInitialMidtermQuestions())
            console.log("Initial Question IDs are:", getInitialMidtermQuestions())

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
                url: 'MidtermAssets/MidtermEditingAJAX.php',
                data: {
                    midtermID: midtermID,
                    midtermData: midtermData,
                    insert: performInsert,
                    update: performUpdate,
                    delete: performDelete,
                    addedQuestions: addedQuestions,
                    updatedQuestions: updatedQuestions,
                    deletedQuestionIDs: deletedQuestionIDs
                },
                success: function (result) {
                    console.log(result)
                    window.location.replace("viewMidterm.php?midtermID="+ midtermID);
                }
            });

        }
    })
}