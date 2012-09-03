<!--Start Header--!>
<?php
	require_once('header.php');
?>
<!--End Header--!>
<!--Begin Content--!>

<?php
$output = shell_exec('/usr/bin/heyu onstate e7');
print "<pre>Module E7 state is $output</pre>";
?>


<div id="container">

<div class="left" id="1"></div>
 <div id="ajax"></div>
  <div class="clear"></div>

  <script type="text/javascript">

    $('#1').iphoneSwitch("on",
     function() {
       $('#ajax').load('module.php?d=E7&a=on&n=test_Appliance&c=15');
      },
      function() {
       $('#ajax').load('module.php?d=E7&a=off&n=test_Appliance&c=15');
      },
      {
        switch_on_container_path: 'img/iphone_switch_container_off.png'
      });
  </script>
</div>





<!--End Content--!>
<!--Begin Footer--!>
<?php
        require_once('footer.php');
?>
<!--End Footer--!>
