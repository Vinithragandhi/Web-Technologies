<?php
$value = $_GET['query'];
$formfield = $_GET['field'];
// Check Valid or Invalid user name when user enters user name in username input field.
 
if ($formfield == "error1") {
if(!is_numeric($value)){
echo "UMID should contain only numbers";	
}
else if (strlen($value) != 8) {
echo "UMID should be 8 digits";
}
}
if ($formfield == "error2") {
if(!preg_match("/^[a-zA-Z'-]+$/", $value)){
echo "First Name should contain only alphabets";
} 
}
if ($formfield == "error3") {
if(!preg_match("/^[a-zA-Z'-]+$/", $value)){
	echo "Last Name should contain only alphabets";
} 
}
if ($formfield == "error6") {
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {
echo "Invalid email";
}
} 
if ($formfield == "error5") {	
if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $value)) {
echo "Invalid phone";
}	
}