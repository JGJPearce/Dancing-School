<?php 
//include the header
require('include/topTemplate.php'); 
// get the database connection
require('include/db.php');
// Get Examination Class
require_once('class/Examination.class.php');
// Get Examination
require_once('class/Mark.class.php');
// Get Mark
$examinations = $db->query("SELECT * FROM Examination");
$marks = $db->query("SELECT * FROM Mark");
?>

<div class="content">
    <div class="row">
        <div class="col-md-8">
            <h2> Exam Grade Table </h2>
            <br/>
            <!-- mark list -->
            <div id="mark-list" class="row">
                <!-- list-group -->
                <div class="list-group col-md-10">

                    <table data-url="data1.json" data-height="299" data-show-columns="true">
                        <thead>
                            <tr>
                                <th data-field ="examId" class="col-md-2"data-halign="right" data-align="center">Exam ID </th></div>
                                <th data-field="maleId"class="col-md-2" data-halign="center" data-align="left"> Male ID</th>
                                <th data-field="femaleId"class="col-md-2" data-halign="left" data-align="right">Female ID</th>	
                                <th data-field="style"class="col-md-2" data-halign="left" data-align="right">Sytle</th>
                                <th data-field="proficiency"class="col-md-2" data-halign="left" data-align="right">Proficiency</th>
                                <th data-field="date"class="col-md-2" data-halign="left" data-align="right">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // iterate through each mark and create a readable list
                                while($exam = $examinations->fetch_object('Examination')): ?>
                                <tr id="tr_id_1" class="tr-class-1">
                                    <td id="td_id_1" class="td-class-1"><?=$exam->Exam_ID?></td>
                                    <td> <?=$exam->Male_Dancer_ID?></td>
                                    <td> <?=$exam->Female_Dancer_ID?></td>
                                    <td> <?=$exam->Style?></td>
                                    <td> <?=$exam->Proficiency?></td>
                                    <td> <?=$exam->Date?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>	
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <h2>Mark Table</h2>
            <div id="mark-list" class="row">
                <!-- list-group -->
                <div class="list-group col-md-12">

                    <table data-url="data1.json" data-height="299" data-show-columns="true">
                        <thead>
                            <tr>
                                <th data-field ="FK_Exam_ID" class="col-md-4"data-halign="right" data-align="center">Exam ID </th>
                                <th data-field="Dance_Name"class="col-md-4" data-halign="center" data-align="left">Dance Name</th>
                                <th data-field="Mark"class="col-md-4" data-halign="left" data-align="right">Mark</th>	
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // iterate through each mark and create a readable list
                                while($mark = $marks->fetch_object('Mark')): ?>
                                <tr id="tr_id_1" class="tr-class-1">
                                    <td id="td_id_1" class="td-class-1"><?=$mark->FK_Exam_ID?></td>
                                    <td> <?=$mark->Dance_Name?></td>
                                    <td> <?=$mark->Mark?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>	
                </div>
            </div>

        </div>
    </div><!-- end row -->


    <div class="row">
        <div class="col-md-6">
            <h3> Add a new mark</h3>

            <!-- male id-->
            <form class="form-horizontal" action ="ExaminationDetails.php" role="form" method="post">
                <div class="form-group">
                	<input type="hidden" class="form-control" name="Exam_ID" id="Exam_ID" value="">
                    <label for="inputMaleID" class="col-sm-5 control-label"> Male Dancers ID </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="inputMaleID" id="inputMaleID" placeholder="Male ID" input required = "required"/>
                    </div>	
                </div>

                <!-- fmale id-->
                <div class="form-group">
                    <label for="inputFemaleID" class="col-sm-5 control-label"> Female Dancers ID </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="inputFemaleID" id="inputFemaleID" placeholder="Female ID"input required = "required"/>
                    </div>	
    			</div>

                <!-- Style of dance  -->
	<div class="row">
				<div class="input-group">
					<h4> Choose Style of Dance </h4>
                    <p> Please choose three different syles of dance</p>
                    <!-- There is also validation for if someone has not chosen three different styles -->
					<div class="col-lg-4">

						<div class="dropdown">
							<input type="radio" name="dances" id="LatAmer" value="Latin American" onclick="HideLatin()" input required = "required"/> Latin American </input>
							<P class="hidden" id="dropdownDesc1"> Dance one: </p>
							<select class="form-control hidden" name="danceMove1" id="dropdownMenu1" />
								<ul class="dropdown-menu " >
									<option name="Cha_Cha" value="Cha_Cha">Cha Cha</option></li>
									<option name="Jive" value="Jive">Jive</option></li>
									<option name="Paso_Doble" value="Paso_Doble">Paso Doble</option></li>
									<option name="Ramba" value="Ramba">Ramba</option></li>
									<option name="Samba" value="Samba">Samba</option></li>
								</ul>
							</select>
							<P class="hidden" id="dropdownDesc2"> Dance two: </p>
							<select class="form-control hidden" name="danceMove2" id="dropdownMenu2" />
								<ul class="dropdown-menu " >
									<option name="Cha_Cha" value="Cha_Cha">Cha Cha</option></li>
									<option name="Jive" value="Jive">Jive</option></li>
									<option name="Paso_Doble" value="Paso_Doble">Paso Doble</option></li>
									<option name="Ramba" value="Ramba">Ramba</option></li>
									<option name="Samba" value="Samba">Samba</option></li>
								</ul>
							</select>		
							<P class="hidden" id="dropdownDesc3"> Dance two: </p>
							<select class="form-control hidden" name="danceMove3" id="dropdownMenu3"/>
								<ul class="dropdown-menu " >
									<option name="Cha_Cha" value="Cha_Cha">Cha Cha</option></li>
									<option name="Jive" value="Jive">Jive</option></li>
									<option name="Paso_Doble" value="Paso_Doble">Paso Doble</option></li>
									<option name="Ramba" value="Ramba">Ramba</option></li>
									<option name="Samba" value="Samba">Samba</option></li>
								</ul>
							</select>
						</div>
					</div><!-- /.col-lg-6 -->

					<div class="col-lg-4">
						<div class="dropdown" >
							<input type="radio" name="dances" id="ballRoom" value="Ballroom" onclick="HideBallroom()" > Ballroom </input>
							<P class="hidden" id="dropdownDesc4"> Dance one: </p>
							<select class="form-control hidden" name="danceMove1" id="dropdownMenu4"/>
								<ul class="dropdown-menu" role="menu" >
									
									<option name="Foxtrot" value="Foxtrot">Foxtrot</option></li>
									<option name="Quickstep" value="Quickstep">Quickstep</option></li>
									<option name="Tango" value="Tango">Tango</option></li>
									<option name="Waltz" value="Waltz">Waltz</option></li>
								</ul>
							</select>		
							<P class="hidden" id="dropdownDesc5"> Dance two: </p>	
							<select class="form-control hidden" name="danceMove2" id="dropdownMenu5"/>
								<ul class="dropdown-menu" role="menu" >
									<option name="Foxtrot" value="Foxtrot">Foxtrot</option></li>
									<option name="Quickstep" value="Quickstep">Quickstep</option></li>
									<option name="Tango" value="Tango">Tango</option></li>
									<option name="Waltz" value="Waltz">Waltz</option></li>
								</ul>
							</select>

							<P class="hidden" id="dropdownDesc6"> Dance three: </p>
							<select class="form-control hidden" name="danceMove3" id="dropdownMenu6"/>
								<ul class="dropdown-menu" role="menu" >
									<option name="Foxtrot" value="Foxtrot">Foxtrot</option></li>
									<option name="Quickstep" value="Quickstep">Quickstep</option></li>
									<option name="Tango" value="Tango">Tango</option></li>
									<option name="Waltz" value="Waltz">Waltz</option></li>
								</ul>
							</select>

						</div>
					</div><!-- /.col-lg-6 -->
					<div class="col-lg-4">
						<br/>
						<P> Dance One Mark: </p>
						<select class="form-control" name="MarkOne" input required = "required">
							<?php
							    for ($i=1; $i<=100; $i++)
							    {
							        ?>
							            <option name="<?php echo $i;?>" value="<?php echo $i;?>"><?php echo $i;?></option>
							        <?php
							    }
							?>
						</select>
						<P> Dance Two Mark: </p>	
						<select class="form-control" name="MarkTwo" input required = "required">
							<?php
							    for ($i=1; $i<=100; $i++)
							    {
							        ?>
							            <option name="<?php echo $i;?>" value="<?php echo $i;?>"><?php echo $i;?></option>
							        <?php
							    }
							?>
						</select>
						<P> Dance Three Mark: </p>
						<select class="form-control" name="MarkThree" input required = "required">
							<?php
							    for ($i=1; $i<=100; $i++)
							    {
							        ?>
							            <option name="<?php echo $i;?>" value="<?php echo $i;?>"><?php echo $i;?></option>
							        <?php
							    }
							?>
						</select>
					</div>
				</div>

			</div><!-- /.row -->
                    </div>

                </div><!-- /.row -->


                <!-- Proficiency  -->

                <div class="form-group">
                    <br/><br/>
                    <p><b>Grade </b>
                        <label class="checkbox-inline" >
                            <input type="radio" name="proficiency" id="goldProf" value="Gold" input required = "required"/>
                            Gold   
                        </label>
                        <label class="checkbox-inline" >
                            <input type="radio" name="proficiency" id="silverProf" value="Silver">
                            Silver
                        </label>

                        <label class="checkbox-inline" >
                            <input type="radio" name="proficiency" id="bronzeProf" value="Bronze">
                            Bronze
                        </label>
                    </p>
                    <h4> Date of the Exam </h4><br/>
                    The format of the date to input (if you're using firefox) is YYYY / MM / DD </p>

                    <input type="date" vaule="dateOfExam" name="dateOfExam" placeholder="YYYY / MM / DD" input required = "required"/>
                    <br/> <br/>
                </div>
                <!-- may not be supported in IE -->

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </form>
    </div> <!-- end input row -->

<?php require('include/bottomTemplate.php'); ?>
