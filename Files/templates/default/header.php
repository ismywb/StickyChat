<?php
/***********************************************************************
 *                           StickyChat SQL Query's.                   *
 *                    Made by Jerald Johnson. Copyright 2010           *
 *                  See LICENSE.txt to view the GPL 3.0 License        *
 ***********************************************************************/
require("inc/sql.php");
$sql = "select * from config limit 1";
$sql = mysql_query($sql) or die(mysql_error());
$data = mysql_fetch_array($sql);
$title = $data['title'];
$des = $data['des'];
$words = $data['words'];
$name = $data['name'];
$line = $data['line'];
$copy = $data['copy'];
$url = "http://".$_SERVER['SERVER_NAME']."/templates/default";
echo <<<end
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">
<head>
<title>$title</title>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<meta name="description" content="$des" />
<meta name="keywords" content="$words" />
<link href="$url/style.css" rel="stylesheet" />
<link rel="shortcut icon" type="image/x-icon" href="$url/images/favicon.ico">
<script type="text/javascript" src="js/jquery.js"></script>
<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="facebox/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox()
})
</script>
</head>
<body>
<div id="page">
  <div id="header">
    <h2>$name Fast Chat</h2>
    <h4>$line</h4>
  </div>
  <div id="main">
    <div id="content">

end;
?>