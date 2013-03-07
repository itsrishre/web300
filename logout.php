<?php
require 'secure.php';
session_destroy();
header("Location: index.php");