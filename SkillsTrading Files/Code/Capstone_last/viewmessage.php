<?php session_start();
require_once ('database.php');
require_once ('classes.php');
$currentUser = $_SESSION["saveduname"];
$action = filter_input(INPUT_POST, 'action'); // variable to denote if its a reply action or delete action
$messageID = filter_input(INPUT_POST, 'messageID');
echo "action:" . $action . "id:" . $messageID;
if ($action === 'Delete') {
	$sqlDelete = "update messagedetails set Deleted = ? where MessageID=?";
	$query = $db -> prepare($sqlDelete);
	$query -> execute(array(",{$currentUser}", $messageID));
} else if ($action === 'Reply') {
	$toUser = filter_input(INPUT_POST, 'toUser');
	$_SESSION['toUser'] = $toUser;
	echo "forwarding";
	header("Location: sendMessage.php");
}
$sql = "SELECT * FROM messagedetails m,user u where u.UserName=m.FromUser and m.ToUser=? and m.Deleted not like ? order by m.Status asc ";
$query = $db -> prepare($sql);
$query -> execute(array($currentUser, "%{$currentUser}%"));
$query -> setFetchMode(PDO::FETCH_CLASS, 'StudentDetails');
$messages = $query -> fetchAll(PDO::FETCH_CLASS, 'MessageDetails');
$messageCount = count($messages);
$sql = "update messagedetails set Status='1'where Status='0' and ToUser=?";
$query = $db -> prepare($sql);
$query -> execute(array($currentUser));
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
	if($messageCount !== 0){
		?>		
	<table>
		<?php
		foreach ($messages as $message) {
				
			if($message->Status === '0'){?> 
				<tr><td>New:</td></tr><?php } ?>
		<tr id="message" rowspan ="2">
			<td id="from"><?php echo $message -> FromUser; ?>:</td>
			<td><?php echo $message->Message?></td>
			<td>Time sent: <?php echo $message->TimeStamp?></td>
		</tr>
		<tr>
			<form name="inboxForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="hidden" name="messageID" value="<?php echo $message -> MessageID; ?>" id="messageID"/>
				<input type="hidden" name="action" id="action"/>
				<input type="hidden" name="toUser" value="<?php echo $message -> FromUser; ?>"/>
			<td>
				<button name="Reply" value="Reply" id="Reply" onclick="callAction('Reply')">Reply</button>
			</td>	
			<td>
				<button name="Delete" value="Delete" id="Delete" onclick="callAction('Delete')">Delete</button>
			</td>		
				
			</form>
		</tr>
		<?php } ?>
	</table>
	<?php }
		else{
		echo "Inbox is empty";
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