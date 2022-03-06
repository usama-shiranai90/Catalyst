<?php
session_start();
//List of CLOs would be generated on page load for showing in the dropdown
$listOfCLOs = ['CLO-1', 'CLO-2', 'CLO-3'];
//Tables would be generated through ajax
?>

<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Catalyst - Summary Viewer</title>
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="../../../Assets/Frameworks/jQuery/jquery.min.js" type="text/javascript"></script>
    <script src="../../../Assets/Scripts/Master.js"></script>
    <link href="Assets/summaryViewerStyles.css" rel="stylesheet">
    <script src="Assets/summaryViewerScripts.js"></script>
</head>
<body>
<main>
    <div class="rounded-2xl m-10 border border-gray-100  pb-5">
        <div class="font-bold text-2xl text-center py-5" style="color: #3F575C">Summary Viewer</div>

        <!--        Filters Area-->
        <form method="post">
            <div class="grid grid-cols-12 items-center justify-items-center px-5 py-2"
                 style="background-color: #F4F8F9">

                <span class="text-lg text-center col-span-3">Filters</span>
                <div class="col-span-6">

                    <!--                CLO Dropdown-->
                    <div class="select-label-content mx-3 w-32" id="teacherSVCLODropdownDivID">
                        <select class="select dropdown" name="teacherSVCLODropdownDiv"
                                onclick="this.setAttribute('value', this.value);"
                                onchange="this.setAttribute('value', this.value);" value="" id="teacherSVCLODropdownID">
                            <option value="" hidden></option>
                            <option value="All">All</option>
                            <script>
                                setCLOsInDropdown("teacherSVCLODropdownID", <?php echo json_encode($listOfCLOs);?>)
                            </script>
                        </select>
                        <label class="select-label dropdownLabel">CLO</label>
                    </div>

                    <!--                Status Dropdown-->
                    <div class="select-label-content mx-3 w-32" id="teacherSVStatusDropdownDivID">
                        <select class="select dropdown w-40" name="teacherSVStatusDropdown"
                                onclick="this.setAttribute('value', this.value);"
                                onchange="this.setAttribute('value', this.value);" value=""
                                id="teacherSVStatusDropdownID">
                            <option value="" hidden></option>
                            <option value="Pass">Pass</option>
                            <option value="Fail">Fail</option>
                        </select>
                        <label class="select-label dropdownLabel">Status</label>
                    </div>

                </div>
                <div class="text-xl text-center col-span-3">
                    <button class="w-32 px-2 py-1 text-sm text-white rounded-md cursor-pointer" type="submit"
                            name="updateFilter" id="updateFilterID" style="background-color: #0184FC">Update
                    </button>
                </div>
            </div>

        </form>

        <!--        List starts here-->
        <div>
            <table class='w-full' style='table-layout: fixed; width: 100%'>
                <thead class='h-12 border border-t-1 border-b-1 border-r-0 border-l-0 border-gray-400 border-opacity-100'
                       style='background-color: #F4F8F9'>
                <tr id='teacherSVStudentListTableHeaderID'>
                </tr>

                </thead>
                <tbody id="teacherSVStudentListTableBodyID" class='w-full'
                       style='table-layout: fixed; width: 100%'>
                </tbody>

            </table>

        </div>
    </div>
</main>
</body>
<script>
    $("#updateFilterID").click(function (event) {
        event.preventDefault()

        if (!checkEmptyFilters()) {
            let selectedCLO = $('#teacherSVCLODropdownID').val();
            let status = $('#teacherSVStatusDropdownID').val();
            if (selectedCLO === "All") {
                createTableHeader(<?php echo json_encode($listOfCLOs);?>)
            } else {
                createTableHeader(selectedCLO)
            }
            createTableRows(selectedCLO, status)
        }
    })
</script>
</html>
