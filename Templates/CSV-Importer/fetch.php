<?php

//fetch.php

if(!empty($_FILES['csv_file']['name']))
{
    $file_data = fopen($_FILES['csv_file']['tmp_name'], 'r');
    $column = fgetcsv($file_data);
    while($row = fgetcsv($file_data))
    {
        $row_data[] = array(
            'sno'  => $row[0],
            'sname'  => $row[1],
            'email'  => $row[2],
            'phone'  => $row[3],
            'type'  => $row[4],
            'area'  => $row[5],
            'budge'  => $row[6]
        );
    }
    $output = array(
        'column'  => $column,
        'row_data'  => $row_data
    );

    echo json_encode($output);

}

?>
