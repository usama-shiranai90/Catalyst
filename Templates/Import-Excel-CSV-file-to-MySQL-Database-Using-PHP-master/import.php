<?php
include 'db.php';
if(isset($_POST["Import"])){
		echo $filename=$_FILES["file"]["tmp_name"];
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
				 $databaseConnection = db:: getConnection();
	           $sql = "INSERT into subject (`SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`,COURSE_ID, `AY`, `SEMESTER`) 
	            	values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]')";

				 $result = $databaseConnection->query($sql);
				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						</script>";
				
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";

		 }
	}	 
?>		 