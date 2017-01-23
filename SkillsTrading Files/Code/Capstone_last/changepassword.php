<?php
//IF USER CORRECTLY ANSWERS THE SECURITY QUESTION ALLOW THE USER TO RESET PASSWORD
session_start();
require('database.php');
$uname=$_SESSION['saveduname'];
$message="";
$passw=filter_input(INPUT_POST,'pass');
$confpass=filter_input(INPUT_POST,'confpass');
if(isset($_POST['submit']))
{
	if($passw==$confpass)
	{
		//IF PASSWORD MATCH THEN ENCRYPT THE PASSWORD AND UPDATE THE DATABASE WITH NEW PASSWORD
		$db->beginTransaction();
		$salt="projectdone";
		$passw=crypt($passw,$salt);
		$PassUpdate="UPDATE user SET Password =:pass WHERE UserName='$uname'";
		$statement=$db->prepare($PassUpdate);
		$statement->bindValue(':pass', $passw);		
		$statement->execute();
		
		$db->commit();
		$statement->closeCursor();
		?>
	<script>
		alert("Your password has been changed successfully");
		window.location.href = "index.php";
	</script>
	<?php }
		else
		{
		$message="The passwords donot match";

		}
		}
	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Change Password </title>
		<link rel="stylesheet" href="css/homestyle.css">
	</head>
	<body>
		<header>
			<div id="headercontainer">
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
			<h3>Answer Some Security Questions</h3>
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<table>
				<tr>
					<span class="errormessage"> <?php echo(isset($_POST['submit']))? $message :"";?></span>
				</tr>
				<tr>
					<td> 
						<label> Enter a password:</label>
					</td>
					<td>
						<input type="password" name="pass" id="pass" required />
					</td>
				</tr>
				<tr>
					<td> 
						<label> Re-enter your new password:</label>
					</td>
					<td>
						<input type="password" name="confpass" id="confpass" required />
					</td>
				</tr>
				<tr>
					
					<td>
						<input type="submit" value="Submit" name="submit">
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
