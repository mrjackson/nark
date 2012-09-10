<?php
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
			break;
		case 'Switch':
			$Switch = new Module($_GET['Module']);

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