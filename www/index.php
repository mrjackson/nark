<!--Start Header--!>
<?php
	require_once('header.php');
?>
<!--End Header--!>
<!--Begin Content--!>

<?php
$output = shell_exec('/usr/bin/heyu onstate e7');
print "<pre>Module E7 state is $output</pre>";
$outputdim = shell_exec('/usr/bin/heyu dimlevel e7');
print "<pre>Module E7 dim level is $outputdim</pre>";
?>


<div id="container">

<div class="left" id="1"></div>
 <div id="ajax"></div>
  <div class="clear"></div>

  <script type="text/javascript">

    $('#1').iphoneSwitch("on", function() {
       $('#ajax').load('module.php?Module=E5&Type=Switch&Action=Switch');
      },
      function() {
       $('#ajax').load('module.php?Module=E5&Type=Switch&Action=Switch');
      },
      {
        switch_on_container_path: 'img/iphone_switch_container_off.png'
      });
  </script>
<div class="left" id="2"></div>
 <div id="ajax2"></div>
  <div class="clear"></div>

  <script type="text/javascript">

    $('#2').iphoneSwitch("on", function() {
       $('#ajax2').load('module.php?Module=E5&Type=Switch');
      },
      function() {
       $('#ajax2').load('module.php?Module=E5&Type=Switch');
      },
      {
        switch_on_container_path: 'img/iphone_switch_container_off.png'
      });
  </script>
</div>


<br><br>

<script>
$(function() {
	$( "#slider" ).slider({
	min: 1,
	max: 100,
	step: 1,
	stop: function(event, ui) {$('#slider1').load('module.php?Module=E7&Type=Dimmer&Action=SetLevel&Change=' + ui.value);}
	});
});
</script>




<div id="slider"></div>
<div id="slider1"></div>
<!--End Content--!>
<!--Begin Footer--!>
<?php
        require_once('footer.php');
?>
<!--End Footer--!>
