<!--Start Header--!>
<?php
        require_once('header.php');
?>
<!--End Header--!>

<?php

	if (isset($_POST) && !empty($_POST))
	{
		require_once('../Includes/DB.inc');
		require_once('../Includes/Admin.inc');

		class User extends Admin
		{
			public static function CreateUser($Username,$Password)
			{
				$db = new DBCon;
				$db->Query("INSERT INTO Credentials VALUES(:Username,:Password)",array(':Username' => $Username, ':Password' => self::HashThis($Password)));
			}
		}

		$db = new DBCon;
		$db->Query("CREATE TABLE Credentials (Username TEXT NOT NULL PRIMARY KEY, Userpass TEXT NOT NULL)");

		User::CreateUser($_POST['Username'],$_POST['Password']);

		echo "DB \"Credentials\" created.\r\nUser: " . $_POST['Username'] . " created.<br /><br />";
	}
?>

<html>
	<head>
		<script type="text/javascript">
			function Verify()
			{
				var p1 = document.getElementById('Password').value;
				var p2 = document.getElementById('VerifyPassword').value;

				if (p1 == p2)
				{
					document.getElementById('Submit').disabled = false;
				}
				else
				{
					document.getElementById('Submit').disabled = true;
				}
			}
		</script>
	</head>
	<body>
		<form action="#" method="post">
			<label for="Username">Username:&nbsp;</label><input id="Username" name="Username" type="text" /><br />
			<label for="Password">Password:&nbsp;</label><input id="Password" name="Password" type="password" /> <label for="VerifyPassword">Retype Password:&nbsp;</label><input id="VerifyPassword" name="VerifyPassword" type="password" onKeyUp="Verify();" /><br/><br/>
			<input disabled id="Submit" type="submit" value="Submit" />
		</form>
	</body>
</html>
