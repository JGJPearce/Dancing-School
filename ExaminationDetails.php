<?php require('include/topTemplate.php'); 

// get the database connection
require('include/db.php');
?>
<div id="content" class="row">
<?php

	if(isset($_POST["inputMaleID"])){
		if(!empty($_POST["inputFemaleID"])){
				if(!empty($_POST["dances"])){
						if(empty($_POST["proficiency"])){
							echo("<h2>something wrong with the proficiency.</h2>");
							echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");
						}else{
								// Examination table
								$Exam_ID = $db->real_escape_string($_POST["Exam_ID"]);
								$Male_Dancer_ID =  $db->real_escape_string($_POST["inputMaleID"]);
								$Female_Dancer_ID = $db->real_escape_string($_POST["inputFemaleID"]);
								$Style = $db->real_escape_string($_POST["dances"]);
								$Proficiency = $db->real_escape_string($_POST["proficiency"]);
								$dateOfExam = $db->real_escape_string($_POST["dateOfExam"]);

								//Mark Table
								$Dance_Name_One = $db->real_escape_string($_POST["danceMove1"]);
								$Dance_Name_Two = $db->real_escape_string($_POST["danceMove2"]);
								$Dance_Name_Three = $db->real_escape_string($_POST["danceMove3"]);
								$Mark_One = $db->real_escape_string($_POST["MarkOne"]);
								$Mark_Two = $db->real_escape_string($_POST["MarkTwo"]);
								$Mark_Three = $db->real_escape_string($_POST["MarkThree"]);
			
								$StudentMale = mysqli_query($db,"SELECT * FROM Student WHERE Pupil_ID = $Male_Dancer_ID");
								$StudentFemale = mysqli_query($db,"SELECT * FROM Student WHERE Pupil_ID = $Female_Dancer_ID");

								//If male and female have a match execute the querys
								if(mysqli_num_rows($StudentMale) > 0){
									if (mysqli_num_rows($StudentFemale) > 0){
										//Exam Table
										$statement = $db->prepare("INSERT INTO Examination (Exam_ID,Male_dancer_ID,Female_Dancer_ID,Style,Proficiency, Date) VALUES (?,?,?,?,?,?)");
										$statement->bind_param("iiisss",$Exam_ID, $Male_Dancer_ID, $Female_Dancer_ID, $Style, $Proficiency, $dateOfExam);
										$statement->execute();

										//Get Exam ID from last query
										$Last_Exam_ID = $db->insert_id;

										/* optional print statement for Exam ID
										echo("<pre>");
										echo ($Last_Exam_ID);
										echo("</pre>");
										*/

										//Mark Table
										//Mark One
										$statement = $db->prepare("INSERT INTO Mark (FK_Exam_ID,Dance_Name,Mark) VALUES (?,?,?)");
										$statement->bind_param("isi",$Last_Exam_ID, $Dance_Name_One, $Mark_One);
										$statement->execute();
										//Mark Two
										$statement = $db->prepare("INSERT INTO Mark (FK_Exam_ID,Dance_Name,Mark) VALUES (?,?,?)");
										$statement->bind_param("isi",$Last_Exam_ID, $Dance_Name_Two, $Mark_Two);
										$statement->execute();
										//Mark Two
										$statement = $db->prepare("INSERT INTO Mark (FK_Exam_ID,Dance_Name,Mark) VALUES (?,?,?)");
										$statement->bind_param("isi",$Last_Exam_ID, $Dance_Name_Three, $Mark_Three);
										$statement->execute();

										

										echo("<h2>entry recorded successfully!</h2>");
										echo("<p>Here is the record</p>");
										echo('<div class="table-responsive"><table class="table">');
											echo('<tbody>');
												echo('<tr>');
													echo('<td>');
														echo('Exam_ID');
													echo('</td>');
													echo('<td>');
														echo($_POST["Exam_ID"]);
													echo('</td>');
												echo('</tr>');
												echo('<tr>');
												echo('<td>');
													echo('Male ID');
												echo('</td>');
												echo('<td>');
													echo($_POST["inputMaleID"]);
												echo('</td>');
												echo('</tr>');
													echo('<td>');
														echo('Female ID');
													echo('</td>');
													echo('<td>');
														echo($_POST["inputFemaleID"]);
													echo('</td>');
												echo('</tr>');
												echo('<td>');
														echo('Style of Dance');
													echo('</td>');
													echo('<td>');
														echo($_POST["dances"]);
													echo('</td>');
												echo('</tr>');
												echo('<td>');
														echo('Proficiency of Dance');
													echo('</td>');
													echo('<td>');
														echo($_POST["proficiency"]);
													echo('</td>');
												echo('</tr>');
												echo('<td>');
														echo('Date of Exam');
													echo('</td>');
													echo('<td>');
														echo($_POST["dateOfExam"]);
													echo('</td>');
												echo('</tr>');

												//Marking Section
												echo('<br/>');
												echo('<td>');
														echo('Exam ID');
													echo('</td>');
													echo('<td>');
														echo($Last_Exam_ID);
													echo('</td>');
												echo('</tr>');

												echo('<br/>');
												echo('<td>');
														echo('Dance Move One: ');
													echo('</td>');
													echo('<td>');
														echo($_POST["danceMove1"]);
													echo('</td>');
												echo('</tr>');

												echo('<td>');
														echo('Dance Mark One:');
													echo('</td>');
													echo('<td>');
														echo($_POST["MarkOne"]);
													echo('</td>');
												echo('</tr>');

												echo('<td>');
														echo('Dance Move Two: ');
													echo('</td>');
													echo('<td>');
														echo($_POST["danceMove2"]);
													echo('</td>');
												echo('</tr>');
												
												echo('<td>');
														echo('Dance Mark Two:');
													echo('</td>');
													echo('<td>');
														echo($_POST["MarkTwo"]);
													echo('</td>');
												echo('</tr>');

												
												echo('<td>');
														echo('Dance Move Three: ');
													echo('</td>');
													echo('<td>');
														echo($_POST["danceMove3"]);
													echo('</td>');
												echo('</tr>');

													echo('<td>');
													echo('Dance Mark Three:');
													echo('</td>');
													echo('<td>');
														echo($_POST["MarkThree"]);
													echo('</td>');
												echo('</tr>');
											echo('</tbody>');					
										echo('</table></div>');
										echo('<a class="btn btn-default" href="'.$_SERVER['HTTP_REFERER'].'">Go back</a>');		
									} else{
										echo("<h2>could not record student.</h2>");
										echo("<p>Invalid Female ID</p>");
										echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");
									}
								}else{
									echo("<h2>could not record student.</h2>");								
									echo("<p>Invalid Male ID</p>");
									echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");	
								}
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
					echo("<p>no instructor id.</p>");
					echo("<button class=\"btn btn-default\" onclick=\"window.history.back()\">Go Back</button>");
				}
					
?>

</div><!-- /main content -->

<?php require('include/bottomTemplate.php'); ?>