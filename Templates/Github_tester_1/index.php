<?php
if (isset($_FILES['file'])) {

    echo "hello";
}

$unique_id = uniqid();
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        iframe { display: none; width: 200px; height: 20px; border: 1px solid black; }
    </style>
</head>

<body>
<form action="index.php" method="post" enctype="multipart/form-data">
    <p>
        <input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" value="<?php echo $unique_id; ?>">
        <input type="file" name="file[]" multiple>
        <input type="submit" value="Upload">
    </p>

    <iframe frameborder="0" border="0" src="" scrolling="no" scrollbar="no"></iframe>
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
    $(function() {
        $('form').submit(function() {
            $('iframe').show();

            setTimeout(function() {
                $('iframe').attr('src', 'progress.php?upload_id=<?php echo $unique_id; ?>');
            });
        });
    });
</script>
</body>

</html>