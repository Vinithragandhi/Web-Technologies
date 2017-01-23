<?php
if (!isset($_SESSION)) {
	session_start();
}
$currentUser = $_SESSION["saveduname"];
$skillName = $_SESSION['skillName'];
$category = $_SESSION['category'];
$location = $_SESSION['location'];
$time = $_SESSION['time'];

$filter = "";
require_once ('database.php');
require_once ('classes.php');
if ($skillName !== '') {

	$filter = $filter . " and (s.SkillName like '%{$skillName}%' or s.Skill2Name like '%{$skillName}%' or s.skill3Name like '%{$skillName}%')";

}
if ($category !== '' && $category !== 'Select') {
	$filter = $filter . " and (s.SkillCategory like '{$category}' or s.Skill2Category like '{$category}' or s.Skill3Category like '{$category}')";

}
if ($location !== '') {
	$filter = $filter . " and u.City like '{$location}'";
}
if ($time !== '') {
	$filter = $filter . " and u.Availability like '{$time}'";
}
$sql = "select * from skilldetails s, user u where s.UserName = u.UserName " . $filter;

$query = $db -> query($sql);

$result = $query -> fetchAll(PDO::FETCH_CLASS, 'SkillDetails');
if (count($result) === 0) {
	$_SESSION['searchError'] = 'No results found';
	header('Location: ' . "search1.php");
}
//Code to avoid showing the current user's skills in the search result
if (count($result) === 1) {
	foreach ($result as $skill) {
		if ($skill -> UserName == $currentUser) {
			$_SESSION['searchError'] = 'No results found';
			header('Location: ' . "search1.php");
		}
	}

}
?>
<html>
	<head>
		<title>Skills Results</title>
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
		<div id="bgimage">
			<img src="Images/Collage.jpg" />
		<div id="formsection">
			<h4>Results found matching your search</h4>
<?php
foreach ($result as $skill) {
	if($skill->UserName !== $currentUser){
		
	?>
	<fieldset>		
		<table>
			<tr>				
				<td>
					<span id="important"><?php echo "{$skill->FirstName} {$skill->LastName}"; ?></span>
					Location: <span id="important"> <?php echo "{$skill->City}"; ?></span>
					Available: <span id="important"><?php echo "{$skill->Availability}"; ?></span>
				</td>
			</tr>
			<tr>
				<td><?php echo "{$skill->SkillName} - {$skill->SkillDescription}"; ?></td></tr>
				<?php if(($skill->Skill2Name)!==""){?><tr><td><?php echo "{$skill->Skill2Name} - {$skill->Skill2Description}"; ?></td></tr> <?php } ?>
				<?php if(($skill->Skill3Name)!==""){?><tr><td><?php echo "{$skill->Skill3Name} -  {$skill->Skill3Description}"; ?></td></tr> <?php } ?>
			
		</table>
				<form name="contactUser" id="contactUser" method="post" action="sendMessage.php">	
						<input type="hidden" name="userID" id="userID" value="<?php echo $skill -> UserName; ?>" readonly="readonly"/>
						<input type="hidden" name="FirstName" id="FirstName" value="<?php echo $skill -> FirstName; ?>" readonly="readonly" />
						<!--
						<input type="hidden" name="skillName" id="skillName" value="<?php echo "{$skill->SkillName} {$skill->Skill2Name} {$skill->Skill3Name}"; ?>" readonly="readonly" />
						<input type="hidden" name="category" id="category" value="<?php echo $skill->category; ?>" readonly="readonly" />
						<input type="hidden" name="description" id="description" value="<?php echo $skill->SkillDescription; ?>" readonly="readonly" />
						<input type="hidden" name="location" id="location" value="<?php echo $skill->City; ?>" readonly="readonly" />
						<input type="hidden" name="time" id="time" value="<?php echo $skill->Availability; ?>" readonly="readonly" />
												-->
						<input type="submit" id="sendMessage" name="sendMessage" value ="Send Message"/>
				</form>	
		</fieldset>
		<br>
	<?php
	}
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
