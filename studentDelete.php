<?php require('include/topTemplate.php');
// get the database connection
require('include/db.php');
?>

<!-- main content -->
<div id="content" class="row">

<?php
	
	if(isset($_POST["inputStudentID"])){
		$Pupil_ID = $_POST["inputStudentID"];
		$StudentRemoveID = $db->query("DELETE FROM Student WHERE Pupil_ID = $Pupil_ID");
		echo("<h2>entry recorded successfully!</h2>");
		echo("<p>Here is the record</p>");
		echo('<div class="table-responsive"><table class="table">');
			echo('<tbody>');
				echo('<tr>');
					echo('<td>');
						echo('Pupil Removed');
					echo('<br/>');
					echo('</td>');
					echo('<td>');
						echo($Pupil_ID);
					echo('</td>');
				echo('</tr>');
			echo('</tbody>');					
		echo('</table></div>');
		echo('<a class="btn btn-default" href="'.$_SERVER['HTTP_REFERER'].'">Go back</a>');	
	} else {
		echo("<h2>something wrong with your ID.</h2>");
		echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");


	}


require('include/bottomTemplate.php'); ?>