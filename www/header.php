<?php
	require_once('../Includes/Header.inc');
	require_once('../Includes/Modules.inc');

	if ($_SESSION['LoggedIn'])
	{
		Admin::Status('update');
	}
	elseif(!$_SESSION['LoggedIn'])
	{
		header('Location: login.php');
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>nark</title>

  <script src="jquery/jquery.js" type="text/javascript"></script>
  <script src="jquery/jquery.iphone-switch.js" type="text/javascript"></script>
  <script src="jquery/jquery.ui.core.js" type="text/javascript"></script>
  <script src="jquery/jquery.ui.mouse.js" type="text/javascript"></script>
  <script src="jquery/jquery.ui.widget.js" type="text/javascript"></script>

<style type="text/css">
ul
{
list-style-type:none;
margin:0;
padding:0;
overflow:hidden;
}
li
{
float:left;
}
a:link,a:visited
{
display:block;
width:120px;
font-weight:bold;
color:#FFFFFF;
background-color:#0099FF;
text-align:center;
padding:4px;
text-decoration:none;
text-transform:uppercase;
}
a:hover,a:active
{
background-color:#006699;
}

body{
font-family:Verdana, Geneva, sans-serif;
font-size:14px;}

.left{
float:left;
width:120px;}

#ajax{
float:left;
width:300px;
padding-top:5px;
font-weight:700;
}

.clear{clear:both;}

#slider { margin: 10px; }

</style>

  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script>
  $(document).ready(function() {
    $("#slider").slider();
  });
  </script>


</head>
<body>

<ul>
<li><a href="default.asp">Home</a></li>
<li><a href="news.asp">News</a></li>
<li><a href="contact.asp">Contact</a></li>
<li><a href="about.asp">About</a></li>
</ul>
