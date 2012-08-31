<?php
	require_once('../Includes/Header.inc');
	if (isset($_POST['auth']) && $_POST['auth'] == "Login")
	{
		if (isset($_POST['user']) && isset($_POST['pass']) && !is_null($_POST['user']) && !is_null($_POST['pass']))
		{
			Admin::Login($_POST['user'],$_POST['pass']);
		}
	}
	elseif (isset($_POST['auth']) && $_POST['auth'] == "Logout")
	{
		Admin::Logout();
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Login</title>
	</head>
	<body>
		<?php
			if (!$_SESSION['logged_in'])
			{
		?>		<p>Please login to administer the site.</p>
				<form action="#" method="POST">
					<table cellpadding="3">
						<tr><td><label for="user">Username:</lable></td><td><input id="user" name="user" type="text" /></td></tr>
						<tr><td><label for="pass">Password:</lable></td><td><input id="pass" name="pass" type="password" /></td></tr>
						<tr><td><input name="auth" type="submit" value="Login" /></td></tr>
					</table>
				</form>
		<?php
				if (isset($_SESSION['login_error']) && !$_SESSION['logged_in'] && $_SESSION['login_error'])
				{
					echo "<br /><span style=\"color: #ff0000; font-weight: bold;\">The username and/or password entered was incorrect.</span>";
				}
			}
			else
			{
				echo "<p>Welcome, <span style=\"font-weight: bold;\">" . $_SESSION['username'] . "</span>!</p>";
			}
		?>
	</body>
</html>
