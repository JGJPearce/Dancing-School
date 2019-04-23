<?php 
// Include header
require('include/topTemplate.php');
// get the database connection
require('include/db.php');
// Get Instructor Class
require_once('class/Instructor.class.php');
// Get instructor
$Instructors = $db->query("SELECT * FROM Instructor");
?>

<div class="content row">
	<div class="col-md-9">
		<h2> Instructor Information Table </h2>
		<br/>
		
				<!-- instructor list -->
			<div id="instructor-list" class="row">
				<!-- list-group -->
				    <div class="list-group col-md-12">
					  
                        <table data-url="data1.json" data-height="299" data-show-columns="true">
                            <thead>
                            <tr>
                                <th data-field ="id" class="col-md-2"data-halign="right" data-align="center">Instructor id </th></div>
                                <th data-field="First Name"class="col-md-2" data-halign="center" data-align="left"> First Name</th>
                                <th data-field="Last Name" class="col-md-2" data-halign="center" data-align="left">Last Name</th>
                                <th data-field="Gender"class="col-md-2" data-halign="left" data-align="right">Gender</th>
                                <th data-field="Email"class="col-md-2" data-halign="left" data-align="right">Email</th>
                            </tr>
                            </thead>
                             <tbody>
                                <?php
                        // iterate through each instructor and create a readable list
                        while($Instructor = $Instructors->fetch_object('Instructor')): ?>
                                <tr id="tr_id_1" class="tr-class-1">
                                    <td id="td_id_1" class="td-class-1"><?=$Instructor->Instructor_ID?></td>
                                    <td> <?=$Instructor->First_Name?></td>
                                    <td> <?=$Instructor->Last_Name?></td>
                                    <td> <?=$Instructor->Gender?></td>
                                    <td> <?=$Instructor->Email?></td>
                                </tr>
                                <?php endwhile; ?>
                                </tbody>
                        </table>
                    
				</div>
			</div>
	</div>  

	<div class="col-md-3">
		<h3> Add a new Instructor </h3>

		<!-- First Name-->
		<form class="form-horizontal" action ="instructorDetails.php" method="POST" role="form">
			<div class="form-group">
				<input type="hidden" class="form-control" name="Instructor_ID" id="Instructor_ID" value="">
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
				 <p><b>Gender  </b>
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

  			<!-- Submit Button-->
  			<div class="form-group">
    			<div class="col-sm-offset-3 col-sm-9">
      				<button type="submit" class="btn btn-primary">Submit</button>
    			</div>
  			</div>
		</form>

	

		<h3> Remove an Instructor </h3>
		<form class="form-horizontal" action ="instructorDelete.php" method="POST" role="form">
			<div class="form-group">
				<label for="inputInstructorID" class="col-sm-3 control-label">ID</label>
					<div class="col-sm-9">
						<input type="number" class="form-control" id="inputInstructorID" name="inputInstructorID" placeholder="Input Instructor ID"/>
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
		


</div>	<!-- end content -->


<?php require('include/bottomTemplate.php'); ?>