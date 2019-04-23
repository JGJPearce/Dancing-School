<?php 
// Include header
require('include/topTemplate.php');
// get the database connection
require('include/db.php');
// Get Student Class
require_once('class/Student.class.php');
// Get students
$students = $db->query("SELECT * FROM Student");
?>


<div class="content row">
	<div class="col-md-9">
		<h2> Student Information Table </h2>
		<br/>
		
				<!-- student list -->
			<div id="student-list" class="row">
				<!-- list-group -->
				<div class="list-group col-md-12">
					
					<table data-url="data1.json" data-height="299" data-show-columns="true">
						<thead>
						<tr>
							<th data-field ="id" class="col-md-1"data-halign="right" data-align="center">Pupil id </th></div>
							<th data-field="First Name"class="col-md-2" data-halign="center" data-align="left"> First Name</th>
	                        <th data-field="Last Name" class="col-md-2" data-halign="center" data-align="left">Last Name</th>
							<th data-field="Gender"class="col-md-2" data-halign="left" data-align="right">Gender</th>
							<th data-field="Email"class="col-md-4" data-halign="left" data-align="right">Email</th>
							<th data-field ="FK_Instructor_ID" class="col-md-1"data-halign="right" data-align="center">Instructor id </th></div>

						
						
						</tr>
						</thead>
						 <tbody>
						 	<?php
					// iterate through each student and create a readable list
					while($student = $students->fetch_object('Student')): ?>
							<tr id="tr_id_1" class="tr-class-1">
								<td id="td_id_1" class="td-class-1"><?=$student->Pupil_ID?></td>
								<td> <?=$student->First_Name?></td>
                                <td> <?=$student->Last_Name?></td>
								<td> <?=$student->Gender?></td>
								<td> <?=$student->Email?></td>
								<td> <?=$student->FK_Instructor_ID?></td>
							</tr>
							<?php endwhile; ?>
							</tbody>
					</table>	
				</div>
			</div>
	</div> 

		<div class="col-md-3">
		<h3> Add a new Student </h3>
            
		<!-- First Name-->
		<form class="form-horizontal" action ="studentDetails.php" method="POST" role="form">
			<div class="form-group">

				<label for="inputFirstName1" class="col-sm-3 control-label"> First Name </label>
				 	<div class="col-sm-9">
      					<input type="text" class="form-control"  name ="inputFirstName1" id="inputFirstName1" placeholder="First Name" input required = "required"/>
    				</div>	
			</div>

			<!-- Last name -->
			<div class="form-group">
				<label for="inputLastName1" class="col-sm-3 control-label"> Last Name </label>
				 	<div class="col-sm-9">
      					<input type="text" class="form-control" name ="inputLastName1" id="inputLastName1" placeholder="Last Name" input required = "required"/>
    				</div>
			</div>

			<!-- Gender Options -->
			<div class="radio">
				 <p><b>Gender </b>
				<label class="checkbox-inline" >
			    	<input type="radio" name="gender" id="gender" value="male" checked>
			    	Male   
			  	</label>
			  	<label class="checkbox-inline" >
			    	<input type="radio" name="gender" id="gender" value="female">
			    	Female
			  	</label>
			  	</p>
			</div>

			<!-- Email -->
			<div class="form-group">
    				<label for="inputEmail1" class="col-sm-3 control-label">Email</label>
    			<div class="col-sm-9">
      				<input type="email" class="form-control" name ="inputEmail1" id="inputEmail1" placeholder="Email" input required = "required"/>
    			</div>
  			</div>
			<!-- Instructor ID -->
			<div class="form-group">
    				<label for="Instructor_ID" class="col-sm-3 control-label">Instructor ID</label>
    			<div class="col-sm-9">
      				<input type="text" class="form-control" name ="Instructor_ID" id="Instructor_ID" placeholder="Instructor ID" input required = "required"/>
    			</div>
  			</div>

  			<input type="hidden" class="form-control" name="Pupil_id" id="Pupil_id" value="">

  			<!-- Submit Button-->
  			<div class="form-group">
    			<div class="col-sm-offset-3 col-sm-9">
      				<button type="submit" class="btn btn-primary">Submit</button>
    			</div>
  			</div>
		</form>
            
    <h3> Remove a Student </h3>
		<form class="form-horizontal" action ="studentDelete.php" method="POST" role="form">
			<div class="form-group">
				<label for="inputStudentID" class="col-sm-3 control-label">ID</label>
					<div class="col-sm-9">
						<input type="number" class="form-control" id="inputStudentID" name="inputStudentID" placeholder="Input Instructor ID"/>
					</div>
			</div>
			<br/><br/><br/>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
						<button type="submit" class="btn btn-danger">Remove</button>
				</div>
			</div>
		</form>
	</div> 
</div>

<?php require('include/bottomTemplate.php'); ?>