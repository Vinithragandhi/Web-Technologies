<?php
$message = filter_input(INPUT_POST, 'message');
$userId = filter_input(INPUT_POST, 'toUserID');
require_once ('database.php');
//$date =date("Y-m-d H:i:s");
$sql = "insert into messageDetails (Message,ToUser,TimeStamp) values(?,?)";
$query = $db -> prepare($sql);
$query -> execute(array($message, $userId));
?>
