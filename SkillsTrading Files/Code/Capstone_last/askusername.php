<?php session_start();
require ('database.php');
$uname = filter_input(INPUT_POST, 'uname');
$_SESSION['saveduname'] = $uname;
$message = "";
//ASK USERNAME TO DISPLAY SECURITY QUESTION
if (isset($_POST['submit'])) {
	$UnameForgotQuery = "SELECT COUNT(*) AS userexist from `user` WHERE UserName = '$uname'";
	$statement = $db -> prepare($UnameForgotQuery);

	$statement -> execute();
	$result = $statement -> fetchAll();
	foreach ($result as $res) {
		if ($res['userexist'] > 0) {
			header("Location: forgotpassword.php");
		} else {
			$message = "The User Name that you entered doesnot exist";
			/*echo "<span style='color:brown;'>The User Name that you entered doesnot exist</span>";*/
		}
	}
	$statement -> closeCursor();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Login </title>
		<link rel="stylesheet" href="css/homestyle.css">
	</head>
	<body class="cont" >
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
		<h3>
		 Enter your Details:
		
		</h3>
		
			
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<table>
				<tr>
					<span class="errormessage"> <?php echo(isset($_POST['submit']))? $message :"";?></span>
				</tr>
				<tr>
					<td> 
						<label> Enter Your user name :</label>
					</td>
					<td>
						<input type="text" name="uname" id="uname">
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
