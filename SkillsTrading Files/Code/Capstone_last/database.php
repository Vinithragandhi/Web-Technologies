<?php
$dsn = 'mysql:host=localhost;dbname=skillstrading';
$username = 'root';
$password = 'prasanth';
try {
	$db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
	$error_msg = $e -> getMessage();
	echo $error_msg;
	exit();
}
?>