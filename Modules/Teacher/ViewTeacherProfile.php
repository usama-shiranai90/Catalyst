<?php
include "../../Backend/Packages/DIM/Faculty.php";
session_start();


$faculty = unserialize($_SESSION['facultyInstance']);
$faculty->setPersonalDetails();
$personalDetails = $faculty->getPersonalDetails();

//print_r($personalDetails);

$currentPassword = $personalDetails['password'];
$emailOfTeacher = $personalDetails['officialEmail'];
$nameOfTeacher = $personalDetails['name'];
$departmentCode = $personalDetails['departmentCode'];
$showEmail = $personalDetails['showEmail'];
$professorImage = $personalDetails['picture'];

$encoded_image = base64_encode($professorImage);
$decoded_image = base64_decode($professorImage);
//header("Content-type: image/gif");
//echo '<img src='data:image/jpeg;base64,{$decoded_image}' src="'.$decoded_image.'"/>';
//echo $decoded_image;

$filePath = base64_to_jpeg($professorImage, "databaseImageFile.png");
echo "filepath is " . $filePath;


$emailShown = "";
if ($showEmail == '0') {
    $emailShown = "";
    $showEmail = "No";
} else {
    $emailShown = "checked";
    $showEmail = "Yes";
}

$departmentName = "";

$databaseConnection = DatabaseSingleton:: getConnection();

$sql = /** @lang text */
    "SELECT departmentName FROM department where departmentCode = \"$departmentCode\"";

$result = $databaseConnection->query($sql);

if (mysqli_num_rows($result) == 1) {
    while ($row = $result->fetch_assoc()) {
        $departmentName = $row["departmentName"];
    }
}

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

        echo "Image Type" . $imageProperties['mime'] . "<br>";
        echo "Image Properties" . $imgData;
    }
}

function base64_to_jpeg($base64_string, $output_file)
{
    // file_put_contents($output_file, file_get_contents($base64_string));
    $ifp = fopen($output_file, 'wb');    // open the output file for writing
    $data = explode(',', $base64_string); // data:image/png;base64
    fwrite($ifp, base64_decode($data[0]));  // we could add validation here with ensuring count( $data ) > 1
    fclose($ifp);
    return $output_file;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../Assets/Scripts/Master.js" rel="script"></script>
    <style>

        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 23px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 17px;
            width: 17px;
            left: 2px;
            bottom: 3px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(17px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .disabled {
            background-color: #6b7280;
        }

    </style>
</head>
<body class="h-auto">

<main class="border border-gray-200 m-8 h-auto bg-white rounded-lg p-8 pt-2">
    <div id="tabs" class="flex justify-center my-5">
        <div id="myProfileTab" class="mx-3 cursor-pointer">
            <label class="cursor-pointer">My Profile</label>
            <div class="w-full mt-2 bg-blue-500 h-1"></div>
        </div>
        <!--        <div id="passwordTab" class="mx-3 cursor-pointer">
                    <label class="cursor-pointer">Password</label>
                    <div class="w-full mt-2"></div>
                </div>-->

    </div>

    <div class="bg-blue-500 h-1/6 w-full p-3 rounded-lg grid grid-cols-8 place-items-center place-content-center">
        <div class="col-span-2">
            <?php

            ?>
            <!--            <img class="rounded-full " src="../../Assets/Images/vectorFiles/Others/profilePicAvatar.jpg" width="100">-->
        </div>
        <div class="flex flex-col justify-center items-center pl-4 pt-1 text-white col-span-4">
            <label class="my-2"><?php echo $nameOfTeacher; ?></label>
            <hr class="w-96 bg-white">
            <label class="my-2">Department of <?php echo $departmentName; ?></label>
        </div>
        <div class="col-span-2">

        </div>
    </div>

    <div class="pt-8">
        <div class="flex-col">
            <div class="flex">
                <div id="teacherProfileInfoID" class="w-3/6 flex pl-10">
                    <div class="flex flex-col justify-center">
                        <label class="font-sans text-md text-gray-500 font-bold font-bold m-2 text-left ">Name</label>
                        <label class="font-sans text-md text-gray-500 font-bold font-bold m-2 text-left">Email</label>
                        <label class="font-sans text-md text-gray-500 font-bold font-bold m-2 text-left">Show Email To
                            Students</label>
                    </div>
                    <div class="flex flex-col justify-center">
                        <label class="m-2 font-sans text-md text-gray-500 text-left"
                               id="nameOfUser"><?php echo $nameOfTeacher ?></label>
                        <label class="m-2 font-sans text-md text-gray-500"
                               id="viewFinalExamTitleID"><?php echo $emailOfTeacher ?></label>
                        <label class="m-2 font-sans text-md text-gray-500"
                               id="viewShowEmailID"><?php echo $showEmail ?></label>
                    </div>


                    <!--                    <div class="flex items-center pl-10">
                                            <label class="text-md text-gray-500 font-bold m-2">Show email to students</label>
                                            <div>
                                                <label class="switch">
                                                    <input type="checkbox" name="showEmailToStudents" disabled checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>-->


                </div>

                <!--                Editing Section                     -->
                <div id="teacherProfileEditingSectionID" class="w-3/6 hidden">
                    <form method="post" class="w-full  flex flex-col pl-10">
                        <div class="mt-3 w-3/6">
                            <div class="textField-label-content w-full">
                                <input class="textField" type="text" placeholder=" " name="teacherNameToShowToStudents"
                                       value="<?php echo $nameOfTeacher; ?>">
                                <label class="textField-label">Name</label>
                            </div>
                        </div>
                        <div class="mt-3 w-3/6">
                            <div class="textField-label-content w-full">
                                <input class="textField" type="email" placeholder=" " name="emailToShowToStudents"
                                       value="<?php echo $emailOfTeacher; ?>">
                                <label class="textField-label">Email</label>
                            </div>
                            <label id="teacherProfileInvalidEmailFormat" class="text-red-900 hidden ml-3">Invalid email
                                format</label>
                        </div>

                        <div class="flex items-center">
                            <label class="text-md text-gray-500 font-bold m-2">Show email to students</label>
                            <div>
                                <label class="switch">
                                    <input type="checkbox" name="showEmailToStudents" <?php echo $emailShown ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>


                    </form>
                </div>

                <!--                Password Section-->
                <div id="teacherProfilePasswordSection" class="w-3/6 hidden">
                    <form method="post" class="w-full flex flex-col items-center p-5">

                        <div class="mt-3 w-3/6">
                            <div class="textField-label-content w-full">
                                <input class="textField" type="password" placeholder=" "
                                       name="currentPassword">
                                <label class="textField-label">Current Password</label>
                            </div>
                            <label id="wrongTeacherCurrPass" class="text-red-900 hidden">Current password is
                                wrong</label>
                        </div>

                        <div class="mt-3 w-3/6">
                            <div class="textField-label-content w-full">
                                <input class="textField" type="password" placeholder=" " name="newPassword">
                                <label class="textField-label">New Password</label>
                            </div>
                        </div>

                        <div class="mt-3 w-3/6">
                            <div class="textField-label-content w-full">
                                <input class="textField" type="password" placeholder=" "
                                       name="confirmPassword">
                                <label class="textField-label">Confirm Password</label>
                            </div>
                            <label id="teacherNewPassDontMatch" class="text-red-900 hidden">New passwords do not
                                match</label>
                        </div>

                        <button type="submit"
                                class="rounded-full text-white p-1 my-5 text-sm w-32 cursor-pointer bg-blue-500"
                                id="updateTeacherPasswordID" name="updateTeacherPassword">
                            Update Password
                        </button>

                    </form>
                </div>

            </div>

        </div>
    </div>

    <div class="mb-1 mt-5 flex justify-end">
        <button class="rounded-full text-white p-1 mx-2 text-sm w-32 cursor-pointer bg-blue-500 hidden"
                id="updateTeacherProfileID" name="updateTeacherProfile">
            Update Profile
        </button>

        <button class="rounded-full text-white p-1 mx-2 text-sm w-32 cursor-pointer bg-blue-500"
                id="editTeacherProfileID" name="editTeacherProfile">
            Edit Profile
        </button>

        <button class="rounded-full text-white p-1 mx-2 text-sm w-32 cursor-pointer bg-blue-500"
                id="changeTeacherPasswordID" name="changeTeacherPassword">
            Change Password
        </button>
    </div>

</main>
</body>
</html>
<script>
    $(document).ready(function () {
        /*            $('#tabs div.mx-3').click(function (event) {
                        if ($(this).attr("id") == "myProfileTab") {
                            $(this).find('div.w-full').toggleClass('bg-blue-500 h-1', 5000)
                            $('#passwordTab').find('div.w-full').toggleClass('bg-blue-500 h-1')
                        } else {
                            $(this).find('div.w-full').toggleClass('bg-blue-500 h-1')
                            $('#myProfileTab').find('div.w-full').toggleClass('bg-blue-500 h-1')
                        }
                    })*/

        let currentPassword = <?php echo json_encode($currentPassword);?>;
        let containsErrors = false
        let newPassword = "";
        let newName = "";
        let newEmail = "";

        $("#changeTeacherPasswordID").click(function () {
            $("#teacherProfilePasswordSection").removeClass("hidden")
            $("#changeTeacherPasswordID").toggleClass("disabled")
            $("#changeTeacherPasswordID").attr("disabled", "true")
        })

        $("#updateTeacherPasswordID").click(function (event) {
            event.preventDefault()
            $("#teacherProfilePasswordSection input").each(function () {
                if ($(this).val() == "") {
                    $(this).closest('div').addClass('textField-error-input')
                    containsErrors = true
                }
            });

            if ($("input[name='currentPassword']").val() != "" && $("input[name='currentPassword']").val() != currentPassword) {
                $('#wrongTeacherCurrPass').removeClass("hidden")
                $('#wrongTeacherCurrPass').closest('div').addClass('textField-error-input')
                containsErrors = true
            }

            if ($("input[name='newPassword']").val() != "" || $("input[name='confirmPassword']").val() != "") {
                if ($("input[name='newPassword']").val() != $("input[name='confirmPassword']").val()) {
                    $('#teacherNewPassDontMatch').removeClass("hidden")
                    $("input[name='newPassword']").add("input[name='confirmPassword']").closest('div').addClass('textField-error-input')
                    containsErrors = true
                } else {
                    newPassword = $("input[name='newPassword']").val();
                }
            }

            if (!containsErrors) {
                $.ajax({
                        type: "POST",
                        url: 'TeacherAssets/teacherProfileAJAX.php',
                        data: {newPassword: newPassword},
                        success: function (result) {
                            alert("Password Updated")
                            $("#teacherProfilePasswordSection").addClass("hidden")
                            $("#changeTeacherPasswordID").toggleClass("disabled")
                            $("#changeTeacherPasswordID").removeAttr("disabled")
                        }
                    }
                );
            }
        })

        $("#teacherProfilePasswordSection input").on("input", function () {
            $(this).closest('div').removeClass('textField-error-input')
            $(this).closest("div.mt-3").find("label.text-red-900").addClass("hidden")
            containsErrors = false
        });

        $("#teacherProfileEditingSectionID input").on("input", function () {
            $(this).closest('div').removeClass('textField-error-input')
            $(this).closest("div.mt-3").find("label.text-red-900").addClass("hidden")
            containsErrors = false
        });

        $("#editTeacherProfileID").click(function () {
            $("#teacherProfileEditingSectionID").removeClass("hidden")
            $("#teacherProfileInfoID").addClass("hidden")
            $("#editTeacherProfileID").addClass("hidden")
            $("#updateTeacherProfileID").removeClass("hidden")

        })

        $("#updateTeacherProfileID").click(function () {
            $("#teacherProfileEditingSectionID input").each(function () {
                if ($(this).val() == "") {
                    $(this).closest('div').addClass('textField-error-input')
                    containsErrors = true
                }
            });


            if ($("input[name='emailToShowToStudents']").val() !== "" && !validateEmail($("input[name='emailToShowToStudents']").val())) {
                $("input[name='emailToShowToStudents']").closest('div').addClass('textField-error-input');
                $("input[name='emailToShowToStudents']").closest("div.mt-3").find("label").removeClass("hidden")
                containsErrors = true
            }

            if (!containsErrors) {
                newName = $("input[name='teacherNameToShowToStudents']").val()
                newEmail = $("input[name='emailToShowToStudents']").val()
                if ($("input[name='showEmailToStudents']").is(":checked")) {
                    newEmailShowStatus = 1;
                } else {
                    newEmailShowStatus = 0;
                }

                $.ajax({
                        type: "POST",
                        url: 'TeacherAssets/teacherProfileAJAX.php',
                        data: {newName: newName, newEmail: newEmail, newEmailShowStatus: newEmailShowStatus},
                        success: function (result) {
                            // alert("Profile Updated")
                            $("#teacherProfileEditingSectionID").addClass("hidden")
                            $("#updateTeacherProfileID").addClass("hidden")
                            $("#teacherProfileInfoID").removeClass("hidden")
                            $("#editTeacherProfileID").removeClass("hidden")
                            $("#nameOfUser").text(newName)
                            $("#viewFinalExamTitleID").text(newEmail)
                            // alert(result)
                            console.log(result)
                            if (result == "1") {
                                $("#nameOfUser").text(newName)
                                $("#viewFinalExamTitleID").text(newEmail)
                                if (newEmailShowStatus == "1")
                                    $("#viewShowEmailID").text("Yes")
                                else
                                    $("#viewShowEmailID").text("No")
                            }

                        }
                    }
                );
            }
        })


        function validateEmail(mail) {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
                return (true)
            }
            return (false)
        }


    })
</script>
