window.onload = function () {

    let midtermViewQuestionsTBody = document.getElementById("midtermViewQuestionsTBodyID")
    // let numberOfQuestions = 2;
    let viewQuestionNumber = 1;
    function showQuestions(singleQuestionArray) {

        // for (let i = 0; i < numberOfQuestions; i++) {
        midtermViewQuestionsTBody.innerHTML +=
            "                       <tr>\n" +
            "                            <td class='text-center'>\n" +
            "                                " + viewQuestionNumber++ + "\n" +
            "                            </td>\n" +
            "                            <td>\n" +
            "                                " + singleQuestionArray[1] + "\n" +
            "                            </td>\n" +
            "                            <td class='text-center'>\n" +
            "                                " + singleQuestionArray[2] + "\n" +
            "                            </td>\n" +
            "                            <td class='text-center'>\n" +
            "                                " + singleQuestionArray[3] + "\n" +
            "                            </td>\n" +
            "                        </tr>"
        // }
    }


    $(document).ready(function () {
        for (let i = 0; i < viewMidtermQuestionData.length; i++) {
            showQuestions(viewMidtermQuestionData[i])
        }
    });
}