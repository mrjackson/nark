<?php
$device = "";
$action = "";
$name = "";
$change = "";

$device = $_GET["d"];
$action = $_GET["a"];
$name = $_GET["n"];
if (($action == "bright") || ($action == "dim"))
   {
     $change = $_GET["c"];
   }

$command = "/usr/bin/heyu $action $device $change";

print "<font color='#000000'>Turning $name ($device) $action.</font>\n";
exec($command);

?>

