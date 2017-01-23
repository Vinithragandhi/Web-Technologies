<?php
$slotid = filter_input(INPUT_POST, 'slotid');
$slotsLeft = filter_input(INPUT_POST, 'slotsleft');
$timing = filter_input(INPUT_POST, 'timing');
$umid = filter_input(INPUT_POST, 'umid');
$row = filter_input(INPUT_POST, 'rows');
//echo "{$slotid},{$slotsLeft},{$timing}";
require_once('database.php');
if($row > 0){
	$oldSlotId = filter_input(INPUT_POST, 'oldslotid');
	$oldSlotsLeft = filter_input(INPUT_POST, 'oldslotsleft');
	$sql = "update slottable set slotsLeft = ? where slotid = ?";
	$query = $handler->prepare($sql);
	$query->execute(array($oldSlotsLeft+1,$oldSlotId));
}


$sql = "update slottable set slotsLeft = ? where slotid = ?";
$query = $handler->prepare($sql);
$query->execute(array($slotsLeft-1,$slotid));
$sql = "update studenttable set slotId =? where umid = ?";
$query = $handler->prepare($sql);
$query->execute(array($slotid,$umid));
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Booking Successful</title>
		<meta charset ="UTF-8"/>
		<link rel="stylesheet" href="styles/main.css"/>
	</head>
	<body>
		<div id="link">
			<a href = "index.php"> <h3> Go to Home </h3> </a>
		</div>
		<div id="imgcontainer">
			<img id="image" src="images/success.jpg" alt="success"/>
			<img id="image" src="images/timing.jpg" alt="timing"/>
		</div>
		<main id="announcement">
		<h2>Your slot has been booked for <?php echo $timing ?></h2>
		</main>
	</body>
<html>