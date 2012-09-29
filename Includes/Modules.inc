<?php
	class Module
	{
		public function __construct($DeviceName)
		{
			$this->heyu = '/usr/bin/heyu';
			$this->DeviceName = trim($DeviceName);
			$this->Status = (exec($this->heyu . ' onstate ' . $this->DeviceName) == 0) ? 'Off' : 'On';
		}

		public function OffOn()
		{
			$Option = ($this->Status == 'Off') ? ' on ' : ' off ';

			exec($this->heyu . $Option . $this->DeviceName);
		}
	}

	class Dimmer extends Module
	{
		public function __construct($DeviceName)
		{
			parent::__construct($DeviceName);
			$this->Level = ($this->Status == 'On') ? exec($this->heyu . ' dimlevel ' . $this->DeviceName) : 0;
		}

		private function GetLevel()
		{
			$this->Level = ($this->Status == 'On') ? exec($this->heyu . ' dimlevel ' . $this->DeviceName) : 0;
			return $this->Level;
		}

		public function SetLevel($DimLevel)
		{
			$Option = ($DimLevel > $this->Level) ? ' bright ' : ' dim ';
			$DimChange = ($DimLevel > $this->Level) ? ($DimLevel - $this->Level) : ($this->Level - $DimLevel);
			$DimChangeInc = round($DimChange / 6);
			exec ($this->heyu . $Option . $this->DeviceName . ' ' . $DimChangeInc);
			$State = $this->GetLevel();
			{ print "State "; } { print $State; } { print "<br>"; }

			while (true)
			{
				if ($Option == ' bright ' && $State < $DimLevel)
				{
					$State++;
					print "Bright\n";
				}
				elseif($Option == ' dim ' && $State > $DimLevel)
				{
					$State--;
					print "Dim\n";
				}
				else
				{
					break;
				}

				exec ($this->heyu . $Option . $this->DeviceName . ' ' . 1);
			}
		}
	}
?>
