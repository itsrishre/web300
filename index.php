<?php
require('config.php');
session_start();
if($_SESSION['username']){
	require('secure.php');
	include 'views/home_page.php';
}
else{
	header("Location: register.php");
}