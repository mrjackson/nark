<?php
$device = "";
$action = "";
$name = "";
$exist = "";
$change = "";

$device = $_GET["d"];
$action = $_GET["a"];
$name = $_GET["n"];
//if (($action == "bright") || ($action == "dim"))
//   {
//     $change = $_GET["c"];
//   }
if ($action == "level")
   {
     $exist = $_GET["e"];
     $change = $_GET["c"];
     $action = "dim";
   }



$command = "/usr/bin/heyu $action $device $change";

print "<font color='#000000'>Turning $name ($device) $action. ($exist) ($change)</font>\n";
exec($command);

?>

