<?php
try{
	$handler = new PDO('mysql:host=127.0.0.1;dbname=student_registration','root','prasanth');
	$handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
	echo $e->getMessage();
}
