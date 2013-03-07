<?php
require('config.php');
@session_start();
if(!isset($_SESSION['username']))
{
	header("Location: error.php?error=nl");
}
else
{
	$result=$db->query("SELECT credits FROM users WHERE username='{$_SESSION['username']}'");
	$row=$result->fetch_array();
	$_SESSION['credits']=$row[0];
	$images=$db->query("SELECT url from images WHERE `to`='{$_SESSION['username']}'");
}