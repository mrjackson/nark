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

<?php
$output = shell_exec('/usr/bin/heyu onstate c12');
echo "<pre>$output</pre>";
?>
