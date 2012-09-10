<?php
	require_once('DB.inc');

	class Admin
	{
		protected static function HashThis($supstr = null)
		{
			if (!is_null($supstr))
			{
				$salt = substr(hash('sha512', $supstr),0,ceil((strlen($supstr) / 2)));
				$pass = hash('sha512', $salt . $supstr);

				return $pass;
			}
		}

		public static function Login($user,$pass)
		{
			$db = new DBCon;

			if (!is_null($user) && !is_null($pass))
			{
				$match = $db->Query("SELECT COUNT(Username) AS 'Count' FROM Credentials WHERE Username = :Username AND Userpass = :Userpass", array(':Username' => $_POST['user'], ':Userpass' => self::HashThis($_POST['pass'])));

				if ($match[0]->Count == 1)
				{
					$_SESSION['LastAction'] = time();
					$_SESSION['LoggedIn'] = true;
					$_SESSION['Username'] = $user;
				}
				else
				{
					$_SESSION['LoggedIn'] = false;
					$_SESSION['LoginError'] = true;
				}
			}
		}

		public static function Logout()
		{
			session_destroy();
			header('Location: ' . $_SERVER['HTTP_HOST']);
		}

		public static function Status($action)
		{
			switch($action)
			{
				case 'check':
					if ($_SESSION['LoggedIn'] && (time() - $_SESSION['LastAction']) > 36000)
					{
						self::Logout();
					}
					break;
				case 'update':
					$_SESSION['LastAction'] = time();
					break;
			}
		}
	}
?>
