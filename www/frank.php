<?php

	$handle = popen('/usr/bin/heyu show dim', 'r');
	$line=1;

	while(!feof($handle))
	{
		$buffer = fgets($handle);

		if ($line >= 4 && $line <= 19)
		{
			$housecodes[chr((61 + $line))] = preg_split("/\s+/",trim($buffer));
		}

		ob_flush();
		flush();
		$line++;
	}

	pclose($handle);

	$x10_status = array();

	$handle = popen('/usr/bin/heyu show alias', 'r');
	$line=1;
	$item=1;

	while(!feof($handle))
	{
		$buffer = fgets($handle);

		if ($line <> 1)
		{
			$temparray = preg_split("/\s+/",trim($buffer));
			$x10_status[$item][1] = $temparray[1];
			$x10_status[$item][2] = $temparray[2];
			$item++;
		}

		ob_flush();
		flush();
		$line++;
	}

	$length = count($x10_status);

	for($i=1;$i<$length-1;$i++)
	{
		if ($housecodes[substr($x10_status[$i][2],0,1)][substr($x10_status[$i][2],1)] == 100)
		{
			$brightness = "On";
		}
		elseif ($housecodes[substr($x10_status[$i][2],0,1)][substr($x10_status[$i][2],1)] == 0)
		{
			$brightness = "Off";
		}
		else
		{
			$brightness = $housecodes[substr($x10_status[$i][2],0,1)][substr($x10_status[$i][2],1)]."%";
		}
		
		echo $x10_status[$i][1].": ".$brightness."<br>";
	}
?>
