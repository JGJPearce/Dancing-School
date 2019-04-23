<?php require('include/topTemplate.php');
// get the database connection
require('include/db.php');
?>

<!-- main content -->
<div id="content" class="row">

<?php
	
	if(isset($_POST["inputInstructorID"])){
		$Instructor_ID = $_POST["inputInstructorID"];
		$InstructorRemoveID = $db->query("DELETE FROM Instructor WHERE Instructor_ID = $Instructor_ID");
		echo("<h2>entry recorded successfully!</h2>");
		echo("<p>Here is the record</p>");
		echo('<div class="table-responsive"><table class="table">');
			echo('<tbody>');
				echo('<tr>');
					echo('<td>');
						echo('Instructor Removed');
					echo('<br/>');
					echo('</td>');
					echo('<td>');
						echo($Instructor_ID);
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