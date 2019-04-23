<?php require('include/topTemplate.php'); 

// get the database connection
require('include/db.php');
?>

<!-- main content -->
<div id="content" class="row">

<?php
	//print_r($_POST);
		if(!empty($_POST["Payer_ID"])){
			if(isset($_POST["method"])){
					if(!isset($_POST["paymentAmount"])){
						echo("<h2>Failed to record payment.</h2>");
						echo("<p>Please enter a numerical value.</p>");
						echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");
					}else{
						$Payer_ID = $db->real_escape_string($_POST["Payer_ID"]);
						$Pay_Method = $db->real_escape_string($_POST["method"]);
						$Amount = $db->real_escape_string($_POST["paymentAmount"]);
						$Pupil_ID = $db->real_escape_string($Payer_ID);
						$sql = mysqli_query($db,"SELECT * FROM Student WHERE Pupil_ID = $Payer_ID");
						//$result = mysqli_query($sql);
						//echo(mysqli_num_rows($result));
						if(mysqli_num_rows($sql) > 0){
						/*	if ($Payer_ID != $db->query("SELECT * FROM Student WHERE Pupil_ID = '$Payer_ID'")){
								echo("Bad id");
							}else{
								echo("Good id");
							}*/
						$statement = $db->prepare("INSERT INTO Payment (Payer_ID,Pay_Method,Amount,Date) VALUES (?,?,?,NOW())");
						$statement->bind_param("isi",$Payer_ID,$Pay_Method, $Amount);
		
						$statement->execute();
					
						echo("<h2>payment recorded successfully!</h2>");
						echo("<p>Here is the record</p>");
						echo('<div class="table-responsive"><table class="table">');
							echo('<tbody>');
								echo('<tr>');
									echo('<td>');
										echo('Payer_ID');
									echo('</td>');
									echo('<td>');
										echo($_POST["Payer_ID"]);
									echo('</td>');
								echo('</tr>');
								echo('<tr>');
								echo('<td>');
									echo('Payment method');
								echo('</td>');
								echo('<td>');
									echo($_POST["method"]);
								echo('</td>');
								echo('</tr>');
									echo('<td>');
										echo('Amount');
									echo('</td>');
									echo('<td>');
										echo($_POST["paymentAmount"]);
									echo('</td>');
								echo('</tr>');
							echo('</tbody>');					
						echo('</table></div>');
						echo('<a class="btn btn-default" href="'.$_SERVER['HTTP_REFERER'].'">Go back</a>');	
						}
						else{
							echo("<h2>could not record payment</h2>");
							echo("<p>student id invalid.</p>");
							echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");
						}
					}
				
			}
			else{
				echo("<h2>could not record payment</h2>");
				echo("<p>no payment method.</p>");
				echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");
			}		
		}
		else{
			echo("<h2>could not record payment.</h2>");
			echo("<p>no payment id.</p>");
			echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");
		}	
	?>

	</div><!-- /main content -->

<?php require('include/bottomTemplate.php'); ?>