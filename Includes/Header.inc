<?php
	require_once('Admin.inc');

	session_start();

	if (!isset($_SESSION['LoggedIn']))
	{
		$_SESSION['LoggedIn'] = false;
	}

	Admin::Status('check');
?>
