<?php
if (!isset($_SESSION)) {
	session_start();
}
require_once ('database.php');
require_once ('classes.php');
$sqlLink = "select count(*) from messagedetails where ToUser =? and Status='0'";

$toUserLink = $_SESSION["saveduname"];
$queryLink = $db -> prepare($sqlLink);
$queryLink -> execute(array($toUserLink));
$resultLink = $queryLink -> fetch(PDO::FETCH_NUM);
$unread = $resultLink[0];
//echo "<pre>".print_r($result)."</pre>"
?>
<html>
	<head>
		<style>
		</style>
	</head>
	<body>
		<!-- LINKS -->
		<a href="search1.php">Home</a>
		<a href="profilepage.php">My Profile</a>

		<div class="dropdown">
			<button class="dropbtn">
				Messages(<?php echo $unread; ?>)
			</button>
			<div class="dropdown-content">
				<a href="viewmessage.php">Inbox(<?php echo $unread; ?>)
				</a>
				<a href="viewsent.php">Sent</a>
			</div>
		</div>

		<a href="logout.php">Logout</a>
	</body>
</html>