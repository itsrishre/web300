<?php
require('secure.php');
$username=$db->escape_string($_GET['username']);
$credits=(int)$db->escape_string($_GET['credits']);

//Credits has to be a positive integer
if(!is_integer($credits) || $credits<0)
{
	header("Location: error.php?error=ic");
	exit;
}
if($credis>10)
{
	//You can't transfer more than 10 credits.
	header("Location: error.php?error=tc");
	exit;
}
if($_SESSION['credits']>$credits)
{
	//Transfer credits
	$db->query("UPDATE users SET credits=credits+$credits WHERE username='$username'");
	$result=$db->query("UPDATE users SET credits=credits-$credits WHERE username='{$_SESSION['username']}'");
}
else
{
	//Not enough credits
	header("Location: error.php?error=nc");
	exit;
}
if($result)
{
	$_SESSION['flash']="Credits Sent Successfully";
	header("Location: index.php");
}
else
	header("Location: error.php?error=im");