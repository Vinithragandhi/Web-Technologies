<?php

require ('database.php');
$user = $_POST['username'];
if($user!="") // check username availability after username is entered
{
	$UnameQuery = "SELECT COUNT(*) as matchcount from `user` WHERE UserName ='$user'";
	$statement = $db -> prepare($UnameQuery);
	$statement -> execute();
	$result = $statement -> fetchAll();
	foreach ($result as $res) {
		//print_r($res);
		if ($res['matchcount'] > 0) {
			echo "<span class='status-not-available' style='color:brown;'> Username Not Available.</span>";
			return 0;
		} else {
			echo "<span class='status-available'> Username Available.</span>";
			return 1;
		}
}
}
$statement -> closeCursor();
?>