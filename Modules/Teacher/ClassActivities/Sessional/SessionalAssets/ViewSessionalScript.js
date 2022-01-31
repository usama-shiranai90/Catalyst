window.onload = function () {

    let sessionalViewQuestionsTBody = document.getElementById("sessionalViewQuestionsTBodyID")
    // let numberOfQuestions = 2;

    //just for thw question number that would be shown on viewing page
    let viewQuestionNumber = 1;

    function showQuestions(singleQuestionArray) {

        sessionalViewQuestionsTBody.innerHTML +=
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
    }


    $(document).ready(function () {
        for (let i = 0; i < viewSessionalQuestionData.length; i++) {
            showQuestions(viewSessionalQuestionData[i])
        }
    });
}