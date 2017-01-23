<?php
require ('database.php');

$uname = $_SESSION['saveduname'];
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$age = filter_input(INPUT_POST, 'age');
$add1 = filter_input(INPUT_POST, 'add1');
$add2 = filter_input(INPUT_POST, 'add2');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zip = filter_input(INPUT_POST, 'zip');
$availability = filter_input(INPUT_POST, 'availability');
//VALIDATIONS FOR PERSONAL DETAILS
if (isset($_POST['change'])) {
	$response = array();

	if (strlen($zip) != 5) {
		$response['ziperr'] = "Zip should be 5 digits";
	}
	if (!preg_match("/^[a-zA-Z'-]+$/", $first_name)) {
		$response['fnerr'] = "First Name should contain only alphabets";
	}
	if (!preg_match("/^[a-zA-Z'-]+$/", $last_name)) {
		$response['lnerr'] = "Last Name should contain only alphabets";
	}
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
		$response['emailerr'] = "Invalid email";
	}
	if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
		$response['pherr'] = "Invalid phone";
	}
	//IF NO ERRORS , UPDATE PERSONAL DETAILS
	if (empty($response)) {
		$db -> beginTransaction();
		$PersonalDetailUpdate = "UPDATE user SET FirstName=:first_name, LastName=:last_name, Phone=:phone, Email=:email, Age=:age, Address1=:add1, Address2=:add2, City=:city, State=:state, Zip=:zip, Availability=:availability WHERE UserName='$uname'";
		$statement = $db -> prepare($PersonalDetailUpdate);

		$statement -> bindValue(':first_name', $first_name);
		$statement -> bindValue(':last_name', $last_name);
		$statement -> bindValue(':age', $age);
		$statement -> bindValue(':phone', $phone);
		$statement -> bindValue(':email', $email);
		$statement -> bindValue(':add1', $add1);
		$statement -> bindValue(':add2', $add2);
		$statement -> bindValue(':city', $city);
		$statement -> bindValue(':state', $state);
		$statement -> bindValue(':zip', $zip);
		$statement -> bindValue(':availability', $availability);
		$statement -> execute();

		$db -> commit();
		$statement -> closeCursor();
		$response['successMessage1'] = "Your changes have been saved successfully";
	}
}
?>

