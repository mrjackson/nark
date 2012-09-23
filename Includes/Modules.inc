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

	class Dimmer extends Module
	{
		public function __construct()
		{
			parent::__construct();
			$this->Level = ($this->Status == 'On') ? exec($this->heyu . ' dimlevel ' . $this->DeviceName) : 0;
		}

		public function SetLevel($DimLevel)
		{
			$Option = ($DimLevel > $this->Level) ? ' dim ' : ' bright ';
			$DimChange = ($DimLevel > $this->Level) ? ($DimLevel - $this->Level) : ($this->Level - $DimLevel);
			$DimChangeInc = round($DimChange / 6);
			$State = exec($this->heyu . $Option . $this->DeviceName . ' ' . $DimChangeInc );

			while (true)
			{
				if ($Option == ' bright ' && $State < $DimLevel)
				{
					$State++;
				}
				elseif($Option == ' dim ' && $State > $DimLevel)
				{
					$State--;
				}
				else
				{
					break;
				}

				exec ($this->heyu . $Option . $this->DeviceName . ' ' . $State);
			}
		}
	}
?>
