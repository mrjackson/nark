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
		<?php
			if ($_SESSION['LoggedIn'])
			{
		?>		<div class="item">
					<span class="label">Admin Logout</span>
					<div class="content">
						<form action="login.php" method="POST">
							<input name="auth" type="submit" value="Logout" />
						</form>
					</div>
				</div>
		<?php
			}
		?>
	</body>
</html>
