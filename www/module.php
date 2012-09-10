<?php
	$action = $_GET['a'];
	$device = $_GET['d'];
	$name = $_GET['n'];

	$change = "";
	$exist = "";

//	if (($action == 'bright') || ($action == 'dim'))
//	{
//		$change = $_GET['c'];
//	}

	if (($action == 'on') || ($action == 'off'))
	{
		heyu($action, $device, $name);
	}

	if ($action == 'level')
	{
		$exist = $_GET['e'];
		$change = $_GET['c'];
		$action = 'dim';

		if ($exist > $change)
		{
			$dimchange = $exist - $change;
			$dimchangeinc = round($dimchange / 6);
			$return = heyu("dim", $device, $name, $dimchangeinc);
			echo $return;
			if ($return > $change)
			{
				$i = $return;
				while ($i > $change) {
					heyu("dim", $device, $name, "1");
					$i--;
				}
			break;
			} elseif ($return < $change)
			{
				$i = $return;
				while ($i < $change) {
					heyu("bright", $device, $name, "1");
					$i++;
				}
			}

		}
	}

	function heyu($action, $device, $name, $change)
	{
		$command = "/usr/bin/heyu $action $device $change";
		exec($command);
		if (($action == 'dim') || ($action == 'bright'))
		{
			$command = "/usr/bin/heyu dimlevel $device";
			return exec($command);
//			echo $return;
		}

	}

//	heyu($action, $device, $change);
//	$command = "/usr/bin/heyu $action $device $change";

	print "<font color=\"#000000\">Turning $name ($device) $action. ($exist) ($change)</font>\n";
//	exec($command);

?>
