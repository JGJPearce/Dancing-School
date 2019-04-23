<?php require('include/topTemplate.php'); 

// get the database connection
require('include/db.php');
?>

<!-- main content -->
<div id="content" class="row">

<?php
	
	if(isset($_POST["Pupil_id"])){
		if(!empty($_POST["inputFirstName1"])){
				if(!empty($_POST["inputLastName1"])){
					if(!empty($_POST["gender"])){
						if(empty($_POST["inputEmail1"])){
							echo("<h2>something wrong with your email.</h2>");
							echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");
						}else{
								$Pupil_ID =  $db->real_escape_string($_POST["Pupil_id"]);
								$First_Name = $db->real_escape_string($_POST["inputFirstName1"]);
								$Last_Name = $db->real_escape_string($_POST["inputLastName1"]);
								$Gender = $db->real_escape_string($_POST["gender"]);
								$Email = $db->real_escape_string($_POST["inputEmail1"]);
								$FK_Instructor_ID = $db->real_escape_string($_POST["Instructor_ID"]);
								//$FK_Instructor_ID = $db->query("SELECT Instructor_ID FROM Instructor WHERE RAND()");
								$sql = mysqli_query($db,"SELECT * FROM Instructor WHERE Instructor_ID = $FK_Instructor_ID");
								//$result = mysqli_query($sql);
								//echo(mysqli_num_rows($result));
								if(mysqli_num_rows($sql) > 0){
						
									$statement = $db->prepare("INSERT INTO Student (Pupil_ID,First_Name,Last_Name, Gender,Email,FK_Instructor_ID) VALUES (?,?,?,?,?,?)");
									$statement->bind_param("issssi",$Pupil_ID,$First_Name, $Last_Name, $Gender,$Email,$FK_Instructor_ID);
		
									$statement->execute();
					
									echo("<h2>entry recorded successfully!</h2>");
									echo("<p>Here is the record</p>");
									echo('<div class="table-responsive"><table class="table">');
										echo('<tbody>');
											echo('<tr>');
												echo('<td>');
													echo('Pupil_ID');
												echo('</td>');
												echo('<td>');
													echo($_POST["Pupil_id"]);
												echo('</td>');
											echo('</tr>');
											echo('<tr>');
											echo('<td>');
												echo('first name');
											echo('</td>');
											echo('<td>');
												echo($_POST["inputFirstName1"]);
											echo('</td>');
											echo('</tr>');
												echo('<td>');
													echo('last name');
												echo('</td>');
												echo('<td>');
													echo($_POST["inputLastName1"]);
												echo('</td>');
											echo('</tr>');
											echo('<td>');
													echo('Gender');
												echo('</td>');
												echo('<td>');
													echo($_POST["gender"]);
												echo('</td>');
											echo('</tr>');
											echo('<td>');
													echo('Email');
												echo('</td>');
												echo('<td>');
													echo($_POST["inputEmail1"]);
												echo('</td>');
											echo('</tr>');

											echo('<td>');
													echo('Instructor ID');
												echo('</td>');
												echo('<td>');
													echo($_POST["FK_Instructor_ID"]);
												echo('</td>');
											echo('</tr>');

										echo('</tbody>');					
									echo('</table></div>');
									echo('<a class="btn btn-default" href="'.$_SERVER['HTTP_REFERER'].'">Go back</a>');				
								}
						else{
							echo("<h2>could not set instructor</h2>");
							echo("<p>Instructor id invalid.</p>");
							echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");
							}
						}
					}
					else{
						echo("<h2>could not record student</h2>");
						echo("<p>no payment gender.</p>");
						echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");
					}		
				}
				else{
					echo("<h2>could not record student.</h2>");
					echo("<p>no last name.</p>");
					echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");
				}	
					}
				else{
					echo("<h2>could not record student.</h2>");
					echo("<p>no first name.</p>");
					echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");
				}	
					}
				else{
					echo("<h2>could not record student.</h2>");
					echo("<p>no pupil id.</p>");
					echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");
				}	
?>

</div><!-- /main content -->

<?php require('include/bottomTemplate.php'); ?>