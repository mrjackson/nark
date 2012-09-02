<?php
	require_once('../Includes/Header.inc');
	if ($_SESSION['LoggedIn'])
	{
		Admin::Status('update');
	}
	elseif(!$_SESSION['LoggedIn'])
	{
		header('Location: login.php');
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	</head>
	<body>
headertest
