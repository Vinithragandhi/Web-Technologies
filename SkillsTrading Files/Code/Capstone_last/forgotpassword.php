<?php session_start();
$uname = $_SESSION['saveduname'];
$message = "";
require ('database.php');

$forgotQuery = "SELECT SecurityQuestion1, SecurityQuestion2, Answer1, Answer2 fROM `user` WHERE UserName = '$uname'";
$statement = $db -> prepare($forgotQuery);

$statement -> execute();
$result = $statement -> fetchAll();
foreach ($result as $res) {
	$ques1 = $res['SecurityQuestion1'];
	$ques2 = $res['SecurityQuestion2'];
	$ansdb1 = $res['Answer1'];
	$ansdb2 = $res['Answer2'];
}

if (isset($_POST['submit'])) {
	$ans1 = filter_input(INPUT_POST, 'ans1');
	$ans2 = filter_input(INPUT_POST, 'ans2');
	if (($ans1 == $ansdb1) && ($ans2 == $ansdb2)) {
		header("Location: changepassword.php");
	} else {
		$message = "Do not match";
		//echo "<span style='color:brown;'>The answers donot match the answers you gave while registering</span>";
	}
}
$statement -> closeCursor();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Forgot Password </title>
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
								<span class="errormessage"><?php echo isset($_POST['submit']) ? $message : ""; ?>
								</span>
							</tr>
							<tr>
								<td><label> Question 1:</label></td>
								<td>
								<input type="text" id="ques1" name="ques1" style="width: 300px;" value="<?php echo $ques1; ?>"  >
								</td>
							</tr>
							<tr>
								<td><label> Answer 1:</label></td>
								<td>
								<input type="text" id="ans1" name="ans1" >
								</td>
							</tr>
							<tr>
								<td><label> Question 2:</label></td>
								<td>
								<input type="text" id="ques2" name="ques2" style="width: 300px;" value="<?php echo $ques2; ?>">
								</td>
							</tr>
							<tr>
								<td><label> Answer 1:</label></td>
								<td>
								<input type="text" id="ans1" name="ans2" >
								</td>
							</tr>
							<tr>
								<td>
								<input type="submit" value="submit" name="submit"/>
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
include('footerpage.html');
		?>
	</footer>
</html>
