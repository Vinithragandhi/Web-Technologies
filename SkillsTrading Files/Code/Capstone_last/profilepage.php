<?php
if (!isset($_SESSION)) {
	session_start();
}

include ('alldetails.php');
// TO DISPLAY USER DETAILS AFTER GETTING VALUES FROM DB WHEN USER WISHES TO VIEW HIS/HER PROFILE
include ('updatePersonalDetail.php');
//TO UPDATE PERSONAL DETAILS
include ('updateSkills.php');
//TO UPDATE SKILL DETAILS
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>My Profile</title>

		<link rel="stylesheet" href="css/homestyle.css">
		<script src="validation.js"></script>
	</head>
	<body>
		<header>
			<div id="headercontainer">
				<div id="tagline">
					<span class="site_name">Trade'A'Skill</span>
					<br>
					<span class="tag_line">Meet,share and learn.</span>
				</div>
				<div id="links">
					<?php
					include ("links.php");
 					?>
				</div>
			</div>
		</header>
		<main>
			<div id="bgimage">
				<img src="Images/Collage.jpg" />

				<div id="formsection">
					<h3>View or Edit your profile</h3>
					<!-- FORM TO VIEW/EDIT PERSONAL DETAILS-->
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="personaldetailchange">

						<table>
							<tr>
								<!-- TO DISPLAY IF THE CHANGES WERE MADE -->
									<span class="success"><?php echo isset($response['successMessage1'])? $response['successMessage1']:"" ?></span>
							
							</tr>
							<tr>
								<td><label> First Name: </label></td>
								<td>
									<!-- DISPLAY THE NAME FROM DB, ELSE IF CHANGES MADE, THEN SHOW CHANGED VALUES -->
								<input type="text" name="first_name" id="first_name" value="<?php echo isset($_POST["first_name"]) ? $_POST["first_name"] : $fn; ?>" required/>
								 
								<div id="fnerr" class="errormessage">
									<?php
								if (isset($response['fnerr'])) {echo $response['fnerr'];
								}
 ?></div></td>
							</tr>
							<tr>
								<td><label> Last Name:</label></td>
								<td>
								<input type="text" name="last_name" id="last_name" value="<?php echo isset($_POST["last_name"]) ? $_POST["last_name"] : $ln; ?>" required/>
								<div id="lnerr" class="errormessage"><?php
								if (isset($response['lnerr'])) {echo $response['lnerr'];
								}
 ?> </div></td>
							</tr>
							<tr>
								<td><label>Age:</label></td>
								<td>
								<input type="number" name="age" id="age" min="5" max="99" value="<?php echo isset($_POST["age"]) ? $_POST["age"] : $agef; ?>" required/>
								</td>
							</tr>
							<tr>
								<td><label> Phone No:</label></td>
								<td>
								<input type="tel" name="phone" id="phone" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : $phonef; ?>" pattern="\d{3}-\d{3}-\d{4}" required/>
								###-###-#### <div id="pherr" class="errormessage"> <?php
								if (isset($response['pherr'])) {echo $response['pherr'];
								}
 ?></div></td>
							</tr>

							<tr>
								<td><label> Email Id:</label></td>
								<td>
								<input type="email" name="email" id="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : $emailf; ?>" maxlength="80" required/>
								<div id="emailerr" class="errormessage"> <?php
								if (isset($response['emailerr'])) {echo $response['emailerr'];
								}
 ?></div></td>
							</tr>
							<tr>
								<td><label> Address Line 1:</label></td>
								<td>
								<input type="text" name="add1" id="add1" value="<?php echo isset($_POST["add1"]) ? $_POST["add1"] : $add1f; ?>" maxlength="100" required/>
								</td>
							</tr>
							<tr>
								<td><label> Address Line 2:</label></td>
								<td>
								<input type="text" name="add2" id="add2" value="<?php echo isset($_POST["add2"]) ? $_POST["add2"] : $add2f; ?>" maxlength="100" />
								</td>
							</tr>
							<tr>
								<td><label>City :</label></td>
								<td>
								<input type="text" name="city" id="city" value="<?php echo isset($_POST["city"]) ? $_POST["city"] : $cityf; ?>" required/>
								</td>
							</tr>
							<tr>
								<td><label>State:</label></td>
								<td>
								<input type="text" name="state" id="state" maxlength="100" value="<?php echo isset($_POST["state"]) ? $_POST["state"] : $statef; ?>" required/>
								</td>
							</tr>
							<tr>
								<td><label> Zip Code:</label></td>
								<td>
								<input type="number" name="zip" id="zip" maxlength="7" value="<?php echo isset($_POST["zip"]) ? $_POST["zip"] : $zipf; ?>" required/>
								<div id="ziperr" class="errormessage"><?php
								if (isset($response['ziperr'])) {echo $response['ziperr'];
								}
 ?></div>
								</td>
							</tr>
							<tr>
								<td><label> Availability:</label></td>
								<td>
								<select id="availability" name="availability" required aria-required="true">
									<option value='' >Please Choose</option>
									<option value="Morning" <?php echo (($availabilityf == "Morning")|| ((isset($_POST["availability"])) && $_POST["availability"] == "Morning")) ? " selected" : ""; ?>>Morning</option>
									<option value="Afternoon" <?php echo (($availabilityf == "Afternoon")|| ((isset($_POST["availability"])) && $_POST["availability"] == "Afternoon")) ? " selected" : ""; ?>>Afternoon</option>
									<option value="Evening" <?php echo (($availabilityf == "Evening")|| ((isset($_POST["availability"])) && $_POST["availability"] == "Evening")) ? " selected" : ""; ?>>Evening</option>
								</select></td>
							</tr>

							<tr>
								<td>
								<input type="submit" value="Change" name="change" onclick="return common_check();" >
								</td>
							</tr>
						</table>
					</form>
					<!-- FORM TO VIEW/EDIT SKILLS-->
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="skillupdate">
						<table>
							<tr>
								
									<span class="success"><?php echo isset($response['successMessage2'])? $response['successMessage2']:"" ?></span>
							
							</tr>
							<tr>
								<th> Skill 1: </th>
							</tr>
							<tr>
								<td><label>Skill Name:</label></td>
								<td>
								<input type="text" name="skillName" id="skillName" value="<?php echo isset($_POST["skillName"]) ? $_POST["skillName"]:$skillNamef?>" required/>
								
								<div id="skillError" class="errormessage"><?php
								if (isset($response['skillNameErr'])) {echo $response['skillNameErr'];
								}
 ?></div>
								</td>
							</tr>
							<tr>
								<td><label>Skill Category:</label></td>
								<td>
								<select id="category1" name="skillcategory1" required aria-required="true">
									<option value='' >Please Choose</option>
									<option value="Academics" <?php echo (($skillcategoryf == "Academics")|| ((isset($_POST["skillcategory1"])) && $_POST["skillcategory1"] == "Academics")) ? " selected" : ""; ?>>Academics</option>
									<option value="Music" <?php echo (($skillcategoryf == "Music")|| ((isset($_POST["skillcategory1"])) && $_POST["skillcategory1"] == "Music")) ? " selected" : ""; ?>>Music</option>
									<option value="Photography" <?php echo (($skillcategoryf == "Photography")|| ((isset($_POST["skillcategory1"])) && $_POST["skillcategory1"] == "Photography"))  ? " selected" : ""; ?>>Photography</option>
									<option value="Sports" <?php echo (($skillcategoryf == "Sports")|| ((isset($_POST["skillcategory1"])) && $_POST["skillcategory1"] == "Sports"))  ? " selected" : ""; ?>>Sports</option>
									<option value="Craft" <?php echo (($skillcategoryf == "Craft")|| ((isset($_POST["skillcategory1"])) && $_POST["skillcategory1"] == "Craft"))  ? " selected" : ""; ?>> Craft</option>
									<option value="Cooking" <?php echo (($skillcategoryf == "Cooking")|| ((isset($_POST["skillcategory1"])) && $_POST["skillcategory1"] == "Cooking"))  ? " selected" : ""; ?>>Cooking</option>
									<option value="Dance" <?php echo (($skillcategoryf == "Dance")|| ((isset($_POST["skillcategory1"])) && $_POST["skillcategory1"] == "Dance"))  ? " selected" : ""; ?>>Dance</option>
									<option value="Coding" <?php echo (($skillcategoryf == "Coding")|| ((isset($_POST["skillcategory1"])) && $_POST["skillcategory1"] == "Coding"))  ? " selected" : ""; ?>>Coding</option>
									<option value="Outdoor Activities" <?php echo (($skillcategoryf == "Outdoor Activities")|| ((isset($_POST["skillcategory1"])) && $_POST["skillcategory1"] == "Outdoor Activities")) ? " selected" : ""; ?>>Outdoor Activities</option>
									<option value="Others" <?php echo (($skillcategoryf == "Others")|| ((isset($_POST["skillcategory1"])) && $_POST["skillcategory1"] == "Others"))  ? " selected" : ""; ?>>Others</option>

								</select></td>
							<tr>
								<td><label>Skill Details</label></td>
								<td><textarea  rows="4" cols="50" maxlength="200" name="skilldet1" id="skilldet1" placeholder="200 characters Only" ><?php echo isset($_POST["skilldet1"]) ? $_POST["skilldet1"] : $skilldetailsf; ?></textarea>
								</td>
																		
							</tr>
							<tr>
								<th> Skill 2: </th>
							</tr>
							<tr>
								<td><label>Skill Name:</label></td>
								<td>
								<input type="text" name="skillName2" id="skillName2" value="<?php echo isset($_POST["skillName2"]) ? $_POST["skillName2"] : $skillName2f; ?>"/>
								
								<div id="skillError" class="errormessage"><?php
								if (isset($response['skillName2Err'])) {echo $response['skillName2Err'];
								}
 ?></div>
								</td>
							</tr>
							<tr>
								<td><label>Skill Category:</label></td>
								<td>
									<select id="category2" name="skillcategory2" >
									<option value='' >Please Choose</option>
									<option value="Academics" <?php echo (($skill2categoryf == "Academics")|| ((isset($_POST["skillcategory2"])) && $_POST["skillcategory2"] == "Academics")) ? " selected" : ""; ?>>Academics</option>
									<option value="Music" <?php echo (($skill2categoryf == "Music")|| ((isset($_POST["skillcategory2"])) && $_POST["skillcategory2"] == "Music")) ? " selected" : ""; ?>>Music</option>
									<option value="Photography" <?php echo (($skill2categoryf == "Photography")|| ((isset($_POST["skillcategory2"])) && $_POST["skillcategory2"] == "Photography"))  ? " selected" : ""; ?>>Photography</option>
									<option value="Sports" <?php echo (($skill2categoryf == "Sports")|| ((isset($_POST["skillcategory2"])) && $_POST["skillcategory2"] == "Sports"))  ? " selected" : ""; ?>>Sports</option>
									<option value="Craft" <?php echo (($skill2categoryf == "Craft")|| ((isset($_POST["skillcategory2"])) && $_POST["skillcategory2"] == "Craft"))  ? " selected" : ""; ?>> Craft</option>
									<option value="Cooking" <?php echo (($skill2categoryf == "Cooking")|| ((isset($_POST["skillcategory2"])) && $_POST["skillcategory2"] == "Cooking"))  ? " selected" : ""; ?>>Cooking</option>
									<option value="Dance" <?php echo (($skill2categoryf == "Dance")|| ((isset($_POST["skillcategory2"])) && $_POST["skillcategory2"] == "Dance"))  ? " selected" : ""; ?>>Dance</option>
									<option value="Coding" <?php echo (($skill2categoryf == "Coding")|| ((isset($_POST["skillcategory2"])) && $_POST["skillcategory2"] == "Coding"))  ? " selected" : ""; ?>>Coding</option>
									<option value="Outdoor Activities" <?php echo (($skill2categoryf == "Outdoor Activities")|| ((isset($_POST["skillcategory2"])) && $_POST["skillcategory2"] == "Outdoor Activities")) ? " selected" : ""; ?>>Outdoor Activities</option>
									<option value="Others" <?php echo (($skill2categoryf == "Others")|| ((isset($_POST["skillcategory2"])) && $_POST["skillcategory2"] == "Others"))  ? " selected" : ""; ?>>Others</option>
									</select>
								</td>
							<tr>
								<td><label>Skill Details</label></td>
								<td><textarea  rows="4" cols="50" maxlength="200" name="skilldet2" id="skilldet2" placeholder="200 characters Only"><?php echo isset($_POST["skilldet2"]) ? $_POST["skilldet2"] : $skill2detailsf; ?></textarea>
								</td>
							</tr>
							<tr>
								<th> Skill 3: </th>
							</tr>
							<tr>
								<td><label>Skill Name:</label></td>
								<td>
								<input type="text" name="skillName3" id="skillName3" value="<?php echo isset($_POST["skillName3"]) ? $_POST["skillName3"]:$skillName3f?>"/>
								
								<div id="skillError" class="errormessage">
									<?php
									if (isset($response['skillName3Err'])) {echo $response['skillName3Err'];
									}
									 ?>
								</div>
								</td>
							</tr>
							<tr>
								<td><label>Skill Category:</label></td>
								<td>
									<select id="category3" name="skillcategory3" >
									<option value='' >Please Choose</option>
									<option value="Academics" <?php echo (($skill3categoryf == "Academics")|| ((isset($_POST["skillcategory3"])) && $_POST["skillcategory3"] == "Academics")) ? " selected" : ""; ?>>Academics</option>
									<option value="Music" <?php echo (($skill3categoryf == "Music")|| ((isset($_POST["skillcategory3"])) && $_POST["skillcategory3"] == "Music")) ? " selected" : ""; ?>>Music</option>
									<option value="Photography" <?php echo (($skill3categoryf == "Photography")|| ((isset($_POST["skillcategory3"])) &&$_POST["skillcategory3"] == "Photography"))  ? " selected" : ""; ?>>Photography</option>
									<option value="Sports" <?php echo (($skill3categoryf == "Sports")|| ((isset($_POST["skillcategory3"])) && $_POST["skillcategory3"] == "Sports"))  ? " selected" : ""; ?>>Sports</option>
									<option value="Craft" <?php echo (($skill3categoryf == "Craft")|| ((isset($_POST["skillcategory3"])) && $_POST["skillcategory3"] == "Craft"))  ? " selected" : ""; ?>> Craft</option>
									<option value="Cooking" <?php echo (($skill3categoryf == "Cooking")|| ((isset($_POST["skillcategory3"])) && $_POST["skillcategory3"] == "Cooking"))  ? " selected" : ""; ?>>Cooking</option>
									<option value="Dance" <?php echo (($skill3categoryf == "Dance")|| ((isset($_POST["skillcategory3"])) && $_POST["skillcategory3"] == "Dance"))  ? " selected" : ""; ?>>Dance</option>
									<option value="Coding" <?php echo (($skill3categoryf == "Coding")|| ((isset($_POST["skillcategory3"])) && $_POST["skillcategory3"] == "Coding"))  ? " selected" : ""; ?>>Coding</option>
									<option value="Outdoor Activities" <?php echo (($skill3categoryf == "Outdoor Activities")|| ((isset($_POST["skillcategory3"])) && $_POST["skillcategory3"] == "Outdoor Activities")) ? " selected" : ""; ?>>Outdoor Activities</option>
									<option value="Others" <?php echo (($skill3categoryf == "Others")|| ((isset($_POST["skillcategory3"])) && $_POST["skillcategory3"] == "Others"))  ? " selected" : ""; ?>>Others</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><label>Skill Details</label></td>
								<td><textarea  rows="4" cols="50" maxlength="200" name="skilldet3" id="skilldet3" placeholder="200 characters Only" ><?php echo isset($_POST["skilldet3"]) ? $_POST["skilldet3"] : $skill3detailsf; ?></textarea>
								</td>
							</tr>
							<tr>
								<td>
								<input type="submit" value="Edit Skills" name="editskills">
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</main>
	</body>
	<footer>
		<?php
		include ('footerpage.html');
		?>
	</footer>
</html>
