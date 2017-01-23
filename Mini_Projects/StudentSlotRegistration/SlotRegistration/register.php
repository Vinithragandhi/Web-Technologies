<?php

$umid = filter_input(INPUT_POST, 'umid',FILTER_VALIDATE_INT);
$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$ptitle = filter_input(INPUT_POST, 'ptitle');
$email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone');

require_once('database.php');
require_once('classes.php');

$sql = "select count(*) from studenttable where umid = ?";
$query = $handler->prepare($sql);
$query->execute(array($umid));
$result = $query->fetch(PDO::FETCH_NUM);
$row = $result[0];
$oldSlotId = 0;

$sql = "select * from slottable";
$query = $handler->query($sql);
$result = $query->fetchAll(PDO::FETCH_CLASS,'SlotDetails');
$count =0;
if($row > 0){
	$sql = "select * from studenttable where umid = ?";
	$query = $handler->prepare($sql);
	$query->execute(array($umid));
	$query->setFetchMode(PDO::FETCH_CLASS,'StudentDetails');
	$student = $query->fetch();
	$oldSlotId = $student->slotId;
	if($oldSlotId == 0){
		$row = 0;
	}
	else{		
	$timing = $result[$oldSlotId-1]->timing;
	}
}
else{
	$sql = "insert into studenttable(umid,firstName,lastName,projectTitle,email,phone) values(?,?,?,?,?,?)";
	$query = $handler->prepare($sql);
	$query->execute(array($umid,$fname,$lname,$ptitle,$email,$phone));
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Student Registration</title>
		<script src="scripts/register.js"></script>
		<link rel="stylesheet" href="styles/main.css"/>
	</head>
	<body onload="loadPage('<?php echo $row ?>','<?php echo $timing ?>')">
		<div id="imgcontainer">
			<img id="image" src="images/student.jpg" alt="Student"/>
			<img id="image" src="images/timing.jpg" alt="timing"/>
		</div>
		
		<h3>Student Registration</h3>
		<form method="post" action ="bookslot.php">
			<div id="bookslot">	
			<table id="slots">
				<?php
				foreach($result as $slot){
					if($slot->slotsLeft !=0){
						$count++;
						if($oldSlotId != $slot->slotid){
				?>
					<tr>
						<td><?php echo $slot->slotid; ?></td>
						<td><?php echo $slot->timing; ?></td>
						<td><?php echo $slot->slotsLeft; ?> slots remaining</td>
						<td>
							<form method="post" action="bookslot.php">
								<input type="hidden" name ="rows" id="rows" value="<?php echo $row; ?>" />
								<?php 
									if($row > 0){
								?>
									<input type="hidden" name ="oldslotid" id="oldslotid" value="<?php echo $oldSlotId; ?>" />
									<input type="hidden" name ="oldslotsleft" id="oldslotsleft" value="<?php echo $result[$oldSlotId-1]->slotsLeft ?>" />
								<?php		
									}
								?>
								<input type="hidden" name ="umid" id="umid" value="<?php echo $umid; ?>" />
								<input type="hidden" name ="slotid" id="slotid" value="<?php echo $slot->slotid; ?>" />
								<input type="hidden" name ="slotsleft" id="slotsleft" value="<?php echo $slot->slotsLeft; ?>" />
								<input type="hidden" name ="timing" id="timing" value="<?php echo $slot->timing; ?>" />
								<input type="submit" id="submit" value="Book" />
							</form>
						</td>
					</tr>
				<?php
						} 
					}
				}
				?>
			</table>
			</div>
		</form>
		<?php
				if($count == 0){
					?>
					<script type="text/javascript">
						document.getElementById("slots").style.display = none;
					</script>
					<main id="announcement">
						Slots Full..No more registration/modifications allowed!
					</main>
					<?php
				}
				?>
	</body>

</html>
