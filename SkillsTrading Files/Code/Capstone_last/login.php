<?php
if (!isset($_SESSION)) {
	session_start();
}
require ('database.php');
$uname = filter_input(INPUT_POST, 'uname');
//ENCRYPT PASSWORD 
$pass = filter_input(INPUT_POST, 'pass');
$salt = "projectdone";
$pass = crypt($pass, $salt);
//STORE USERNAME IN SESSION FOR ALL OTHER PAGES
if ($uname != "") {
	$_SESSION['saveduname'] = $uname;
}
//CHECK USER NAME AND PASSWORD IN DATABASE
if (isset($_POST['login'])) {
	$loginQuery = "SELECT COUNT(*) AS userexist, PASSWORD as Password from `user` WHERE UserName = '$uname'";
	$statement = $db -> prepare($loginQuery);

	$statement -> execute();
	$result = $statement -> fetchAll();
	foreach ($result as $res) {
		if ($res['userexist'] > 0) {
			if ($res['Password'] == $pass) {

				header("Location: search1.php");
			} else {
				echo " The username and password you entered is incorrect";
			}
		} else {
			echo "The user name that you entered doesnot exist";
		}
	}
	$statement -> closeCursor();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">

	</head>
	<body class="cont" >

		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<table>
				<tr>
					<td><label> User Name:</label>
					<input type="text" id="uname" name="uname" required />
					</td>

					<td><label>Password:</label>
					<input type="password" id="pass" name="pass" required />
					</td>
					<td>
					<input type="submit" value="Login" name="login" id="login_button"/>
					</td>

				</tr>
				<tr>
					<td><a href="askusername.php">Forgot Password?</a></td>
					<td><a href="Registration.php">Register Now!</a></td>
				</tr>

			</table>
		</form>
	</body>
</html>

