<?php
	require_once('../Includes/Modules.inc');

	switch($_GET['Type'])
	{
		case 'Dimmer':
			$Dimmer = new Dimmer($_GET['Module']);

			switch($_GET['Action'])
			{
				case 'GetStatus':
					return $Dimmer->Status;
				case 'SetLevel':
					$Dimmer->SetLevel($_GET['Change']);
					break;
			}
		}
		elseif ($change > $exist)
		{
			$dimchange = $change - $exist;
			$dimchangeinc = round($dimchange / 6);
			$return = heyu("bright", $device, $name, $dimchangeinc);

			while (true)
			{
				if ($return < $change)
				{
					$option = "dim";
					$return--;
				}
				elseif($return > $change)
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
=======
			break;
		case 'Switch':
			$Switch = new Module($_GET['Module']);
>>>>>>> test

			switch($_GET['Action'])
			{
				case 'GetStatus':
					return $Dimmer->Status;
					break;
				case 'Switch':
					$Switch->OffOn();
					break;
			}
			break;
	}
?>
