<?php
	class Module
	{
		public function __construct($DeviceName)
		{
			$this->heyu = '/usr/bin/heyu';
			
			$this->DeviceName = trim($DeviceName);
			$this->Status = (exec($this->heyu . ' onstate ' . $this->DeviceName) == 0) ? 'Off' : 'On';
		}
		
		// left as reference
		
		/*function heyu($action, $device, $name, $change)
		{
			$command = "/usr/bin/heyu $action $device $change";
			exec($command);
			if (($action == 'dim') || ($action == 'bright'))
			{
				$command = "/usr/bin/heyu dimlevel $device";
				return exec($command);
				echo $return;
			}
		}*/
		
		public function OffOn()
		{
			$Option = ($this->Status == 'Off') ? ' on ' : ' off ';

			exec($this->heyu . $Option . $this->DeviceName);
		}
	}
	
	class Dimmer Extends Module
	{
		public function SetLevel($DimLevel)
		{
			$State  = exec('/usr/bin/heyu dimlevel ' . $this->DeviceName);
			$Option = ($DimLevel > $State) ? ' dim ' : ' bright ';
			$DimChange = ($DimLevel > $State) ? ($DimLevel - $State) : ($State - $DimLevel);
			$DimChangeInc = round($DimChange / 6);

			$State = exec($this->heyu . $Option . $this->DeviceName . ' ' . $DimChangeInc );
			
			while (true)
			{
				if ($State > $DimChange)
				{
					$State--;
				}
				elseif($State < $DimChange)
				{
					$State++;
				}
				else
				{
					break;
				}

				exec ($this->heyu . $Option . $this->DeviceName . ' ' . $State);
			}			
		}
	}

	$Dimmer = new Dimmer($_GET['n']);
	return $Dimmer->SetLevel($_GET['c']);
?>