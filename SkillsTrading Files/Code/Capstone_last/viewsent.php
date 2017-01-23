<?php session_start();
require_once ('database.php');
require_once ('classes.php');
//sent
$currentUser = $_SESSION['saveduname'];
$messageID = filter_input(INPUT_POST, 'messageID');
echo $messageID;
if ($messageID !== '') {
	$sqlDelete = "update messagedetails set Deleted = ? where MessageID=?";
	$query = $db -> prepare($sqlDelete);
	$query -> execute(array(",{$currentUser}", $messageID));
}
$sqlSent = "SELECT * FROM messagedetails m,user u where u.UserName=m.FromUser and m.FromUser=? and m.Deleted not like ?";
$toUserSent = $_SESSION["saveduname"];
$querySent = $db -> prepare($sqlSent);
$querySent -> execute(array($currentUser, "%{$currentUser}%"));
$querySent -> setFetchMode(PDO::FETCH_CLASS, 'StudentDetails');
$messagesSent = $querySent -> fetchAll(PDO::FETCH_CLASS, 'MessageDetails');
$messageCount = count($messagesSent);
//echo "<pre>".print_r($result)."</pre>"
//echo "<pre>".print_r($result)."</pre>"
?>
<html>
	<head>
		<title>Search Skills</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="css/homestyle.css"/>
		<script src="support.js"></script>
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
				<?php
				if($messageCount >0){?>
					<table>
		<?php
		foreach ($messagesSent as $messageSent) {
		?>
		<tr><td>To: <?php echo $messageSent->ToUser?></td></tr>
		<tr><td>Message : <?php echo $messageSent->Message?></td></tr>
		<tr><td>Time sent: <?php echo $messageSent->TimeStamp?></td></tr>
		<tr>
			<form name="sentForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="hidden" name="messageID" value="<?php echo $messageSent -> MessageID; ?>" id="messageID"/>
			<td>
				<button name="Delete" value="Delete" id="Delete" onclick="callAction('Delete')">Delete</button>
			</td>		
			</form>
		</tr>
	</table>
	
		<?php		
				}
		} else{
		echo "Sent Folder is empty";
		}
		?>
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