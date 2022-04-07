<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
</head>
<body>
<label for="myfile">Select a file:</label>
<form id="upload_form" enctype="multipart/form-data" method="post">
    <input type="file" name="fileUploader" id="fileUploader"><br>
    <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
    <h3 id="status"></h3>
</form>
</body>
</html>
<script>
    $("#fileUploader").change(async evt => {
        const [progressBar, status] = document.querySelectorAll('#progressBar, #status')
        progressBar.value = 0
        status.innerText = 'Uploading'

        const [selectedFile] = evt.target.files;
        const data = await selectedFile.arrayBuffer()
        const workbook = XLSX.read(new Uint8Array(data), {
            type: 'array'
        })
        let totalSheets = workbook.SheetNames.length;
        let sheetsProcessed = 0;
        workbook.SheetNames.forEach(sheetName => {
            const XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName], {
                defval: ""
            });
            // const json = JSON.stringify(XL_row_object)

            sheetsProcessed++;
            let percent = (sheetsProcessed / totalSheets) * 100
            $("#progressBar").attr("value", percent)
            console.log(percent)
            // const xhr = new XMLHttpRequest()
            // xhr.open();
            // xhr.open('GET', 'http://localhost:63342/ReadExcelFile/index2.php', true)
            // xhr.upload.onprogress = evt => {
            //     const percent = (evt.loaded / evt.total) * 100;
            //     progressBar.value = Math.round(percent)
            //     console.log(percent)
            // }
            // xhr.send(json)
        })
    })

</script>
