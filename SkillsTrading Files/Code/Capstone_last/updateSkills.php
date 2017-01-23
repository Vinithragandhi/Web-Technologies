<?php
require ('database.php');
//OBTAIN INPUT POST FILLED BY USER
$uname = $_SESSION['saveduname'];
$skillName = filter_input(INPUT_POST, 'skillName');
$skillName2 = filter_input(INPUT_POST, 'skillName2');
$skillName3 = filter_input(INPUT_POST, 'skillName3');
$skillcategory1 = filter_input(INPUT_POST, 'skillcategory1');
$skilldet1 = filter_input(INPUT_POST, 'skilldet1');
$skillcategory2 = filter_input(INPUT_POST, 'skillcategory2');
$skilldet2 = filter_input(INPUT_POST, 'skilldet2');
$skillcategory3 = filter_input(INPUT_POST, 'skillcategory3');
$skilldet3 = filter_input(INPUT_POST, 'skilldet3');
//VALIDATE THE INPUT IF USER HAS CLICKED EDITSKILLS BUTTON
if (isset($_POST['editskills'])) {
	if (!preg_match('/^[a-z0-9 .\-]+$/i', $skillName)) {
		$response['skillNameErr'] = "Skill should contain only alphabets";
	}
	if ((!preg_match('/^[a-z0-9 .\-]+$/i', $skillName)) && ($skillName2 != "")) {
		$response['skillName2Err'] = "Skill should contain only alphabets";
	}
	if ((!preg_match('/^[a-z0-9 .\-]+$/i', $skillName)) && ($skillName3 != "")) {
		$response['skillName3Err'] = "Skill should contain only alphabets";
	}
	//UPDATE SKLLLS IF INPUT PASSES ALL THE VALIDATION
	if (empty($response)) {

		$db -> beginTransaction();
		$SkillDetailUpdate = "UPDATE skilldetails SET SkillCategory=:skillcategory1, SkillDescription=:skilldet1,Skill2Category=:skillcategory2, Skill2Description=:skilldet2, Skill3Category=:skillcategory3, Skill3Description=:skilldet3, SkillName = :skillName, Skill2Name = :skillName2, Skill3Name = :skillName3 WHERE UserName='$uname'";
		$statement = $db -> prepare($SkillDetailUpdate);

		$statement -> bindValue(':skillcategory1', $skillcategory1);
		$statement -> bindValue(':skilldet1', $skilldet1);
		$statement -> bindValue(':skillcategory2', $skillcategory2);
		$statement -> bindValue(':skilldet2', $skilldet2);
		$statement -> bindValue(':skillcategory3', $skillcategory3);
		$statement -> bindValue(':skilldet3', $skilldet3);
		$statement -> bindValue(':skillName', $skillName);
		$statement -> bindValue(':skillName2', $skillName2);
		$statement -> bindValue(':skillName3', $skillName3);

		$statement -> execute();
		$db -> commit();
		$statement -> closeCursor();
		$response['successMessage2'] = "Your changes have been saved successfully";
	}
}
//header("Location: profilepage.php");
?>

