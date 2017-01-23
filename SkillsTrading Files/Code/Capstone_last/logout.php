<?php
//DESTROY SESSION 
if (isset($_SESSION)) {
	session_destroy();
}
$message="You have been successfully logged out!";
//REDIRECT TO LOGIN PAGE
?>

<script type="text/javascript">
	alert("You have been successfully logged out!");
	window.location.href = "index.php"; 
</script>

