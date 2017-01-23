<?php

require_once('database.php');
require_once('classes.php');

$sql = "select st.email, st.firstName, st.lastName, st.phone, st.projectTitle, st.umid, s.timing, s.slotId from studenttable st,slottable s where st.slotId=s.slotId";
$query = $handler->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_CLASS,'StudentDetails');
$id = 1;
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Student Details</title>
		<link rel="stylesheet" href="styles/main.css"/>
	</head>
	<body>
		<div id="imgcontainer">
			<img id="image" src="images/student.jpg" alt="Student"/>
			<img id="image" src="images/timing.jpg" alt="timing"/>
		</div>
		<div id="link">
			<a href = "index.php"> <h3> Go to Home </h3> </a>
		</div>
		<?php 
			if(empty($result)){
				?>
				<main id="announcement">
		<h2>No students registered</h2>
		</main>
			<?php
			}else{
				?>
				
		<div id="allslots">
			<h3>Student Details</h3>
			
		<table id="studenttable">
			<tr id="all">
				<th>Index</th>
				<th>UMID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Project title</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Slot ID</th>
				<th>Slot timing</th>
			</tr>
			<?php
				foreach($result as $student){
				?>
					<tr id="all">
						<td><?php echo $id++; ?></td>
						<td><?php echo $student->umid; ?></td>
						<td><?php echo $student->firstName; ?></td>
						<td><?php echo $student->lastName; ?></td>
						<td><?php echo $student->projectTitle; ?></td>
						<td><?php echo $student->email; ?></td>
						<td><?php echo $student->phone; ?></td>
						<td><?php echo $student->slotId; ?></td>
						<td><?php echo $student->timing; ?></td>
					</tr>
				<?php } ?>
		</table>
		</div>
			<?php
			}
			?>
	</body>
</html>