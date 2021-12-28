<?php
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
<!--    <link href="SessionalAssets/SessionalStyles.css" rel="stylesheet">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--    <script src="SessionalAssets/SessionalScripts.js"></script>-->

</head>
<body>

<div class="m-5 border border-gray-300 border-opacity-100 rounded-md">
    <div class="p-3 text-center">
        <label class="font-bold text-lg p-5 block">Add Quiz Details</label>
        <form method="post">

            <div class="grid grid-cols-12">
                <div class="col-span-5 pt-5">

                    <!--                Title-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2 mb-0" id="quizTitleDivID">
                            <input class="textField" type="text" placeholder=" " id="newQuizTitleID"
                                   name="newQuizTitle" value="">
                            <label class="textField-label">Title</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptyQuizTileError">Please enter the title</label>
                    </div>


                    <!--                Assigned Marks-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2" id="quizTotalMarksDivID">
                            <input class="textField" type="number" placeholder=" " id="totalMarksForQuizID"
                                   name="assignMarksforQuizID">
                            <label class="textField-label" >Total Marks</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptyQuizTotalMarksError">Please enter total marks</label>
                    </div>


                    <!--                Assigned Weightage-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2" id="quizWeightageDivID">
                            <input class="textField" type="number" placeholder=" " id="assignWeightageID"
                                   name="assignWeightageID">
                            <label class="textField-label">Weightage</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptyQuizWeightageError">Please enter weightage</label>
                    </div>


                    <!--                Add Number of Questions-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2" id="addNumberOfQuestionsDivID">
                            <input class="textField" type="number" min="1" placeholder=" " id="addNumberOfQuestionsID">
                            <label class="textField-label">Number of Questions</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptyQuizNumberOfQuestionsError">Please enter number of questions</label>
                    </div>


                    <!--                Button for adding questions-->
                    <button class="rounded-full text-white p-1 text-sm w-28" id="createQuestionsID">
                        Add Questions
                    </button>


                </div>

                <!--            Questions Div-->
                <div class="col-span-7 rounded-2xl border-gray-400 border border-opacity-100">
                    <div class="rounded-t-2xl" style="background-color: #0184FC; color: white"> Details of Questions
                    </div>

                    <div id="quizQuestionsBoxID">
                        <!--                    <div class='grid grid-cols-6 items-center p-2'>
                                                <div class='col-span-1 h-full flex items-center justify-center'>
                                                    <label>Question 1</label>
                                                    <div class='verticalLine ml-2 mr-2'></div>
                                                </div>


                                                <div class='col-span-3'>
                                                    <div class='textField-label-content w-full mb-0' id=''>
                                                        <input class='textField m-1' type='text' placeholder=' ' id='question1DetailID'
                                                               name='question1Detail'>
                                                        <label class='textField-label'>Detail</label>
                                                    </div>
                                                </div>

                                                <div class='col-span-1'>
                                                    <div class='textField-label-content w-full mb-0' id=''>
                                                        <input class='textField m-1' type='password' placeholder=' ' id='question1MarksID'
                                                               name='question1Marks'>
                                                        <label class='textField-label'>Marks</label>
                                                    </div>
                                                </div>

                                                <div class='select-label-content col-span-1 mb-0' id='question1CLODivID'>
                                                    <select class='select w-full m-1' name='question1CLO'
                                                            onclick="this.setAttribute('value', this.value);"
                                                            onchange="this.setAttribute('value', this.value);"
                                                            value='' id='question1CLOID'>
                                                        <option value='' hidden></option>
                                                        <option value='Alabama'>Alabama</option>
                                                        <option value='Boston'>Boston</option>
                                                        <option value='Ohaio'>Ohaio</option>
                                                        <option value='New York'>New York</option>
                                                        <option value='Washington'>Washington</option>
                                                    </select>
                                                    <label class='select-label'>CLO</label>
                                                </div>

                                            </div>-->
                    </div>

                </div>

            </div>
            <div class="mt-5 flex justify-end pr-5">
                <button class="rounded-full text-white p-1 text-sm w-28" id="createQuizID" name="createQuiz">
                    Create
                </button>
            </div>

        </form>
    </div>
</div>

</body>
</html>