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
			
			while (true)
			{
				if ($return > $change)
				{
					$option = "dim";
					$return--;
				}
				elseif($return < $change)
				{
					$option = "bright";
					$return++;
				}
				else
				{
					break;
				}
				
				heyu($option, $device, $name, "1");
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
