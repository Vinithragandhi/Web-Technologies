<?php session_start();
$toUserID = filter_input(INPUT_POST, 'userID');
$firstName = filter_input(INPUT_POST, 'FirstName');
//added for reply option in inbox
if (empty($toUserID)) {
	if(isset($_SESSION['toUser'])){
		$toUserID = $_SESSION['toUser'];
	}
}
$successMessage = "";
if (isset($_POST['send'])) {

	$successMessage = "Message not sent. Please try again later.";
	$message = trim(filter_input(INPUT_POST, 'message'));
	$toUserID = trim(filter_input(INPUT_POST, 'toUserID'));
	$fromUserID = trim($_SESSION["saveduname"]);
	if (empty($message)) {
		$successMessage = "Message cannot be empty";
	} else {
		require_once ('database.php');
		$sql = "insert into messageDetails (Message,ToUser,FromUser) values(?,?,?)";
		$query = $db -> prepare($sql);
		$query -> execute(array($message, $toUserID, $fromUserID));
		$successMessage = "Message sent.";
	}

}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Send Message</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="css/homestyle.css"/>
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
			<div id="error" class="errormessage"><?php echo $successMessage; ?></div>
			<form name="send" id="send" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
				<label>To : </label><?php echo $toUserID; ?><br/>
				<input type="hidden" name="toUserID" id="toUserID" value=" <?php echo $toUserID; ?>" readonly="readonly"/>
				<label>Message : </label><br/>
				<textarea row="8" cols="50" id="message" name="message">"Hi <?php
					{
						$firstName;
					}
 ?>, I would like to exchange my skills with you."</textarea><br/>
				<input type="submit" name="send" id="send" value="Send" onclick="return validateMessage()"/>
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
