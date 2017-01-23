<?php
require('database.php');
//OBTAIN INPUTS FROM THE POST DATA
$first_name=filter_input(INPUT_POST,'first_name');
$last_name=filter_input(INPUT_POST,'last_name');
$phone=filter_input(INPUT_POST,'phone');
$email=filter_input(INPUT_POST,'email');
$age=filter_input(INPUT_POST,'age');
$gender=filter_input(INPUT_POST,'gender');
$uname=filter_input(INPUT_POST,'username');
$pass=filter_input(INPUT_POST,'password');
$confirmpassword=filter_input(INPUT_POST,'confirmpassword');
$secQues1=filter_input(INPUT_POST,'secQues1');
$secQues2=filter_input(INPUT_POST,'secQues2');
$ans1=filter_input(INPUT_POST,'ans1');
$ans2=filter_input(INPUT_POST,'ans2');
$add1=filter_input(INPUT_POST,'add1');
$add2=filter_input(INPUT_POST,'add2');
$city=filter_input(INPUT_POST,'city');
$state=filter_input(INPUT_POST,'state');
$zip=filter_input(INPUT_POST,'zip');
$availability=filter_input(INPUT_POST,'availability');
$skillName = filter_input(INPUT_POST, 'skillName');
$skillcategory=filter_input(INPUT_POST,'skillcategory');
$skilldet=filter_input(INPUT_POST,'skilldet');
if (isset($_POST['registerbutton']))
{
	$response = array();
		
	if(strlen($zip)!= 5){
			$response['ziperr']= "Zip should be 5 digits";	
	}
	if(!preg_match("/^[a-zA-Z'-]+$/", $first_name)){
		$response['fnerr']="First Name should contain only alphabets";
	}
	if(!preg_match("/^[a-zA-Z'-]+$/", $last_name)){
		$response['lnerr']= "Last Name should contain only alphabets";
	}
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
		$response['emailerr']="Invalid email";
	} 
	if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
		$response['pherr']="Invalid phone";
	}
	if(!preg_match('/^[a-z0-9 .\-]+$/i', $skillName)){
		$response['skillNameErr']="Skill should contain only alphabets";
	}
	if(strlen($pass) <6 && strlen($pass) >20){
		$response['passerr'] = "Password should be between 6 and 20 characters";
	}
	if($pass !== $confirmpassword){
		$response['matcherr'] = "Passwords do not match";
	}
	

	if (empty($response))
	{
		//PASSWORD ENCRYPTION
		$salt="projectdone";
		$pass=crypt($pass,$salt);
		//INSERT VALUES INTO DATABASE AFTER ALL VALIDATIONS
		$db->beginTransaction();
		$InsQuery="INSERT INTO user (UserName, FirstName, LastName, Age, Phone, Email, Gender, Password, SecurityQuestion1, SecurityQuestion2, Answer1, Answer2, Address1, Address2, City, State, Zip, Availability) VALUES (:uname, :first_name, :last_name,:age, :phone, :email, :gender,:pass, :secQues1, :secQues2, :ans1, :ans2, :add1, :add2, :city, :state, :zip, :availability)";
		$statement3=$db->prepare($InsQuery);
		$statement3->bindValue(':uname', $uname);
		$statement3->bindValue(':first_name', $first_name);
		$statement3->bindValue(':last_name', $last_name);
		$statement3->bindValue(':age', $age);
		$statement3->bindValue(':phone', $phone);
		$statement3->bindValue(':email', $email);
		$statement3->bindValue(':gender', $gender);
		$statement3->bindValue(':pass', $pass);
		$statement3->bindValue(':secQues1', $secQues1);
		$statement3->bindValue(':secQues2', $secQues2);
		$statement3->bindValue(':ans1', $ans1);
		$statement3->bindValue(':ans2', $ans2);
		$statement3->bindValue(':add1', $add1);
		$statement3->bindValue(':add2', $add2);
		$statement3->bindValue(':city', $city);
		$statement3->bindValue(':state', $state);
		$statement3->bindValue(':zip', $zip);
		$statement3->bindValue(':availability',$availability);
		
		$statement3->execute();
		$db->commit();
		$statement3->closeCursor();
		//INSERT SKILL DETAILS INTO SKILL DETAILS TABLE
		$db->beginTransaction();
		$InsSkill="INSERT INTO skilldetails(UserName,SkillName, SkillCategory, SkillDescription) VALUES (:uname,:skillName, :skillcategory, :skilldet)";
		$statement2=$db->prepare($InsSkill);
		$statement2->bindValue(':uname', $uname);
		$statement2->bindValue(':skillName', $skillName);
		$statement2->bindValue(':skillcategory', $skillcategory);
		$statement2->bindValue(':skilldet', $skilldet);
		$statement2->execute();
		$db->commit();
		$statement2->closeCursor();
		
		?>	
		<script>
			alert("You have been successfully registered!!");
			window.location.href = "index.php";
			</script>
			<?php
			}
			}
		?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Registration </title>
		<link rel="stylesheet" href="css/homestyle.css">	
		<script src="validation.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	</head>
	<body>
		<header id="headercontainer">
			<div id="container">	
				<div id="tagline">
					<span class="site_name">Trade'A'Skill</span>
					<br>
					<span class="tag_line">Meet,share and learn.</span>
				</div>
				<div id="login_section">
				<?php
				include ('login.php');
				?>
			</div>
			</div>
		</header> 
		<main>
		<div id="bgimage">
			<img src="Images/Collage.jpg" />
		<div id="formsection">
		<h3>
		 Fill Your Details below
		</h3>
		<!-- FORM SELF SUBMISSION , VALIDATION AND INSERTION INTO DATABASE HANDLED IN THE SAME PAGE -->
				<form method="POST"  action="<?php echo $_SERVER['PHP_SELF']; ?>" name="register_form">
			<table class="formtable">
				<tr>
					<td>	
						<h3>Personal Details:</h3>
					</td>
				</tr>
				<tr>
					<td>
						<span id="usererr" class="errormessage"></span>
					</td>
				</tr>
				<tr>
					<td>
					<label> First Name: </label>
					</td>
					<td>
					<input type="text" name="first_name" id="first_name" value="<?php echo isset($_POST["first_name"]) ? $_POST["first_name"] : ''; ?>" required/>
					<!-- PRINT ERRORS IF THERE ARE ANY -->
					<div id="fnerr" class="errormessage"><?php
					if (isset($response['fnerr'])) {echo $response['fnerr'];
					}
 ?></div>
					</td>
				</tr>
				<tr>
					<td>
					<label> Last Name:</label>
					</td>
					<td>
					<input type="text" name="last_name" id="last_name" value="<?php echo isset($_POST["last_name"]) ? $_POST["last_name"] : ''; ?>" required/>
					<div id="lnerr" class="errormessage"><?php
					if (isset($response['lnerr'])) {echo $response['lnerr'];
					}
 ?> </div>
					</td>
				</tr>
				<tr>
				<td>
					<label>Age:</label>
				</td>
				<td>
					<input type="number" name="age" id="age" min="5" max="99" value="<?php echo isset($_POST["age"]) ? $_POST["age"] : ''; ?>" required/>
				</td>
			</tr>
				<tr>
				<td>	
					<label> Phone No:</label>
				</td>
				<td>
					<input type="tel" name="phone" id="phone" placeholder="###-###-####" pattern="\d{3}-\d{3}-\d{4}" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : ''; ?>" required/>###-###-####
				
					<div id="pherr" class="errormessage"> <?php
					if (isset($response['pherr'])) {echo $response['pherr'];
					}
 ?></div>
				</td>
			</tr>
			
			<tr>
				<td>
					<label> Email Id:</label>
				</td>
				<td>
					<input type="email" name="email" id="email" placeholder="abc@xyz.com" maxlength="80" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" required/>
					<div id="emailerr" class="errormessage"> <?php
					if (isset($response['emailerr'])) {echo $response['emailerr'];
					}
 ?></div>
				</td>
			</tr>
			<tr>
				<td>	
					<label>Gender:</label>
				</td>
				<td>
					
					<input type="radio" name="gender" value="male"<?php echo $gender == "male" ? " checked" : ""; ?>> Male<br>
  					<input type="radio" name="gender" value="female" <?php echo $gender == "female" ? " checked" : ""; ?>> Female<br>
				</td>
			</tr>
			<tr>
				<td>
					<label> User Name:</label>
				</td>
				<td>
					<!-- CHECKS FOR USERNAME AVAILABILITY AS SOON THE THE USER LEAVES THE FIELD (ONBLUR)-->
					<input type="text" name="username" id="username" placeholder="Select a user name" maxlength="80" onblur="checkUser()" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>" required/>
					<span id="check-availability-status" class="errormessage"></span>
				</td>
			</tr>
			<tr>
				<td>
					<label> Password:</label>
				</td>
				<td>
					<input type="password" name="password" id="password"  pattern=".{6,20}"  placeholder="Minimum 6 characters" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>" required  />
					<div id="passerr"  class="errormessage"> </div>
				</td>
			</tr>
			<tr>
				<td>
					<label>Confirm Password:</label>
				</td>
				<td>
					<!-- DIV TO DISPLAY IF THE PASSWORD DONOT MATCH -->
					<input type="password" name="confirmpassword" id="confirmpassword"  pattern=".{6,20}" value="<?php echo isset($_POST["confirmpassword"]) ? $_POST["confirmpassword"] : ''; ?>" required/>
					<div id="matcherr"  class="errormessage"><?php
					if (isset($response['matcherr'])) {echo $response['matcherr'];
					}
 ?> </div>
				</td>
			</tr>
			<tr>
				<td>
					Select a security Question: Question1 :
				</td>
				<td>
					<select id="secQues1" name="secQues1" >
						<option value="Your mothers maiden name" <?php echo $secQues1 == "Your mothers maiden name" ? " selected" : ""; ?>>Your mothers maiden name</option>
						<option value="Your favourite TV series" <?php echo $secQues1 == "Your favourite TV series" ? " selected" : ""; ?>>Your favourite TV series</option>
						<option value="Your favourite cartoon character" <?php echo $secQues1 == "Your favourite cartoon character" ? " selected" : ""; ?>>Your favourite cartoon character</option>
						<option value="Name of your High School" <?php echo $secQues1 == "Name of your High School" ? " selected" : ""; ?>>Name of your High School</option>
						<option value="Name of your first pet" <?php echo $secQues1 == "Name of your first pet" ? " selected" : ""; ?>>Name of your first pet</option>
						<option value="Brand name of your refrigerator" <?php echo $secQues1 == "Brand name of your refrigerator" ? " selected" : ""; ?>>Brand name of your refrigerator</option>
						<option value="Your parents anniversary date (MM/DD/YYYY)" <?php echo $secQues1 == "Your parents anniversary date (MM/DD/YYYY)" ? " selected" : ""; ?>>Your parents anniversary date (MM/DD/YYYY)</option>
						
					</select>
				</td>
			</tr>
			<tr>
				<td> 
					<label>Answer 1:</label>
				</td>
				<td>
					<input type="text" id="ans1" name="ans1" value="<?php echo isset($_POST["ans1"]) ? $_POST["ans1"] : ''; ?>" required/>
				</td>
			</tr>
			<tr>
				<td>
					Security Question 2:
				</td>
				<td>
					<select id="secQues2" name="secQues2">
						<option value="Your mothers maiden name" <?php echo $secQues2 == "Your mothers maiden name" ? " selected" : ""; ?>>Your mothers maiden name</option>
						<option value="Your favourite TV series" <?php echo $secQues2 == "Your favourite TV series" ? " selected" : ""; ?>>Your favourite TV series</option>
						<option value="Your favourite cartoon character" <?php echo $secQues2 == "Your favourite cartoon character" ? " selected" : ""; ?>>Your favourite cartoon character</option>
						<option value="Name of your High School" <?php echo $secQues2 == "Name of your High School" ? " selected" : ""; ?>>Name of your High School</option>
						<option value="Name of your first pet" <?php echo $secQues2 == "Name of your first pet" ? " selected" : ""; ?>>Name of your first pet</option>
						<option value="Brand name of your refrigerator" <?php echo $secQues2 == "Brand name of your refrigerator" ? " selected" : ""; ?>>Brand name of your refrigerator</option>
						<option value="Your parents anniversary date (MM/DD/YYYY)" <?php echo $secQues2 == "Your parents anniversary date (MM/DD/YYYY)" ? " selected" : ""; ?>>Your parents anniversary date (MM/DD/YYYY)</option>
						
						
					</select>
					<!-- TO PROMPT IF BOTH THE SECURITY QUESTIONS SELECTED ARE SAME -->
					<div id="Queserr" class="errormessage"></div>
				</td>
			</tr>
			<tr>
				<td> 
					<label>Answer 2:</label>
				</td>
				<td>
					<input type="text" id="ans2" name="ans2" value="<?php echo isset($_POST["ans2"]) ? $_POST["ans2"] : ''; ?>" required/>
				</td>
			</tr>
			<tr>
				<td>
					<h3>Address Details:</h3>
				</td>
			</tr>
			<tr>
				<td>
					<label> Address Line 1:</label>
				</td>
				<td>
					<input type="text" name="add1" id="add1" placeholder="Building Number, Street Address" maxlength="100" value="<?php echo isset($_POST["add1"]) ? $_POST["add1"] : ''; ?>" required/>
				</td>
			</tr>
			<tr>
				<td>
					<label> Address Line 2:</label>
				</td>
				<td>
					<input type="text" name="add2" id="add2" placeholder="Apt No./ Sutie No." maxlength="100" value="<?php echo isset($_POST["add2"]) ? $_POST["add2"] : ''; ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>City :</label>
				</td>
				<td>
					<input type="text" name="city" id="city" value="<?php echo isset($_POST["city"]) ? $_POST["city"] : ''; ?>" required/>
				</td>
			</tr>
			<tr>
				<td>
					<label>State:</label>
				</td>
				<td>
					<input type="text" name="state" id="state" maxlength="100" value="<?php echo isset($_POST["state"]) ? $_POST["state"] : ''; ?>" required/>
				</td>
			</tr>
			<tr>
				<td>
					<label> Zip Code:</label>
				</td>
				<td>
					<input type="text" name="zip" id="zip" pattern="[0-9]{5}"  title="Five digit zip code" value="<?php echo isset($_POST["zip"]) ? $_POST["zip"] : ''; ?>" required/>
					<div id="ziperr" class="errormessage"><?php
					if (isset($response['ziperr'])) {echo $response['ziperr'];
					}
 ?></div>
				</td>
			</tr>
			<tr>
				<td>
					<label> Availability:</label>
				</td>
				<td>
					<select id="availability" name="availability" required aria-required="true">
						<option value="">Please Choose</option>
						<option value="Morning" <?php echo $availability == "Morning" ? " selected" : ""; ?>>Morning</option>
						<option value="Afternoon" <?php echo $availability == "Afternoon" ? " selected" : ""; ?>>Afternoon</option>
						<option value="Evening" <?php echo $availability == "Evening" ? " selected" : ""; ?>>Evening</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td>
					<h3>Skill Details: Enter Details about skills you would like to offer </h3>
					<h5>(You can add more skills after you are registered)</h5>
				</td>
			
			</tr>
			<tr>
				<td><label>Skill Name:</label></td>
				<td><input type="text" name="skillName" id="skillName" value="<?php echo isset($_POST["skillName"]) ? $_POST["skillName"] : ''; ?>" required/>
					<div id="skillError" class="errormessage">
						<?php
						if (isset($response['skillNameErr'])) {
							echo $response['skillNameErr'];
						}
	 					?>
	 				</div>
				</td>
			</tr>
			<tr>
				<td>
					<label>Skill Category:</label>
				</td>
				<td>
					<select id="category" name="skillcategory" required aria-required="true">
						<option value='' >Please Choose</option>
						<option value="Academics" <?php echo $skillcategory == "Academics" ? " selected" : ""; ?>>Academics</option>
						<option value="Music" <?php echo $skillcategory == "Music" ? " selected" : ""; ?>>Music</option>
						<option value="Photography" <?php echo $skillcategory == "Photography" ? " selected" : ""; ?>>Photography</option>
						<option value="Sports" <?php echo $skillcategory == "Sports" ? " selected" : ""; ?>>Sports</option>
						<option value="Craft" <?php echo $skillcategory == "Craft" ? " selected" : ""; ?>> Craft</option>
						<option value="Cooking" <?php echo $skillcategory == "Cooking" ? " selected" : ""; ?>>Cooking</option>
						<option value="Dance" <?php echo $skillcategory == "Dance" ? " selected" : ""; ?>>Dance</option>
						<option value="Coding" <?php echo $skillcategory == "Coding" ? " selected" : ""; ?>>Coding</option>
						<option value="Outdoor Activities" <?php echo $skillcategory == "Outdoor Activities" ? " selected" : ""; ?>>Outdoor Activities</option>
						<option value="Others" <?php echo $skillcategory == "Others" ? " selected" : ""; ?>>Others</option>
						
										
					</select>
				</td>
				</tr>
				<tr>
					<td>
						<label>Skill Details</label>
					</td>
					<td>
					<textarea  rows="4" cols="50" maxlength="200" name="skilldet" id="skilldet"  placeholder="200 characters Only" ><?php echo isset($_POST["skilldet"]) ? $_POST["skilldet"] : ''; ?></textarea>
					</td>
				</tr>
								
			</table>
			<button class="button" type="submit" value="register" name="registerbutton" id="register_button" onclick="return validate_all()">Register</button>
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