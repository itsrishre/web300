<?php
require('config.php');
if(isset($_POST['username']))
{
	$username=$db->escape_string($_POST['username']);
	$pwd=sha1($_POST['pwd']);
	$result=$db->query("SELECT * FROM users WHERE username='$username' AND pwd='$pwd'");
	if($result && $result->num_rows===1)
	{
		session_start();
		$_SESSION['username']=$username;
		header("Location: index.php");
		exit;
	}
	else
	{
		header("Location: error.php?error=wp");
		exit;
	}
}
else
	include "views/login_form.html";
?>