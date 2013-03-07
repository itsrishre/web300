<?php
require('config.php');
if(isset($_POST['username']))
{
	$username=$db->escape_string($_POST['username']);
	$pwd=sha1($_POST['pwd']);
	$result=$db->query("INSERT INTO users VALUES ('$username','$pwd',0)");

	if($result)
		header("Location: login.php");
	else
		header("Location: error.php?error=wu");
}
else
	include "views/registration_form.html"
?>