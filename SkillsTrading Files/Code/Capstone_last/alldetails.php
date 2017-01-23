<?php
//OBTAIN ALL USER DETAILS FROM THE DATABASE
require ('database.php');
$uname = $_SESSION['saveduname'];
$AllDetails = "SELECT * FROM user JOIN skilldetails ON user.UserName=skilldetails.UserName WHERE user.UserName='$uname'";
$statement = $db -> prepare($AllDetails);
$statement -> execute();
$result = $statement -> fetchAll();
foreach ($result as $res) {

	$fn = $res['FirstName'];
	$ln = $res['LastName'];
	$agef = $res['Age'];
	$phonef = $res['Phone'];
	$emailf = $res['Email'];
	$add1f = $res['Address1'];
	$add2f = $res['Address2'];

	$cityf = $res['City'];
	$statef = $res['State'];
	$zipf = $res['Zip'];
	$availabilityf = $res['Availability'];
	$skillNamef = $res['SkillName'];
	$skillcategoryf = $res['SkillCategory'];
	$skillName2f = $res['Skill2Name'];
	$skilldetailsf = $res['SkillDescription'];
	$skill2categoryf = $res['Skill2Category'];
	$skillName3f = $res['Skill3Name'];
	$skill2detailsf = $res['Skill2Description'];
	$skill3categoryf = $res['Skill3Category'];

	$skill3detailsf = $res['Skill3Description'];

}
$statement -> closeCursor();
?>
