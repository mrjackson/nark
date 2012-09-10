<?php
	switch($_GET['Type'])
	{
		case 'Dimmer':
			$Dimmer = new Dimmer($_GET['Module']);

			switch($_GET['Action'])
			{
				case 'SetLevel':
					$Dimmer->SetLevel($_GET['Change']);
					break;
			}
			break;
		case 'Switch':
			$Switch = new Module($_GET['Module']);
			$Switch->OffOn();
			break;
	}
?>