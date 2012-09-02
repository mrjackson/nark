
<?php
$handle = popen('/usr/bin/heyu show dim', 'r');
$line=1;
while(!feof($handle)) {
    $buffer = fgets($handle);

    if ($line == '4')
        {
        #$housecode_a = preg_split("/\s+/",trim($buffer));
        $housecodes[A] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '5')
        {
        $housecodes[B] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '6')
        {
        $housecodes[C] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '7')
        {
        $housecodes[D] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '8')
        {
        $housecodes[E] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '9')
        {
        $housecodes[F] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '10')
        {
        $housecodes[G] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '11')
        {
        $housecodes[H] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '12')
        {
        $housecodes[I] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '13')
        {
        $housecodes[J] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '14')
        {
        $housecodes[K] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '15')
        {
        $housecodes[L] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '16')
        {
        $housecodes[M] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '17')
        {
        $housecodes[N] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '18')
        {
        $housecodes[O] = preg_split("/\s+/",trim($buffer));
        }
    if ($line == '19')
        {
        $housecodes[P] = preg_split("/\s+/",trim($buffer));
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
while(!feof($handle)) {
    $buffer = fgets($handle);
    if ($line <> '1')
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
if
($housecodes[substr($x10_status[$i][2],0,1)][substr($x10_status[$i][2],1)]
== '100')
        $brightness = "On";
elseif
($housecodes[substr($x10_status[$i][2],0,1)][substr($x10_status[$i][2],1)]
== '0')
        $brightness = "Off";
else
        $brightness =
$housecodes[substr($x10_status[$i][2],0,1)][substr($x10_status[$i][2],1)]."%";

echo $x10_status[$i][1].": ".$brightness."<br>";
}
?>

