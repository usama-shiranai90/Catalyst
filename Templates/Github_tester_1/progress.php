<?php
if (isset($_GET['progress_key'])) {
    $status = apc_fetch('upload_' . $_GET['progress_key']);

    // Return null if total is empty to avoid divide by zero error below.
    if (empty($status['total'])) {
        exit;
    }

    echo ($status['current'] / $status['total'] * 100);
    exit;
}

if (! isset($_GET['upload_id'])) {
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        * { margin: 0; padding: 0; }
        #progress { display: block; width: 0; height: 20px; background: green; }
    </style>
</head>

<body>
<div id="progress"></div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
    $(function() {
        setInterval(function() {
            $.get('progress.php', { progress_key: <?php echo $_GET['upload_id']; ?>, randval: Math.random() }, function(data) {
                // Multiple percentage by 2 because the progress bar is 200px wide.
                $('#progress').css('width', (Math.round(data) * 2) + 'px');
            })
        }, 1000);
    });
</script>
</body>

</html>