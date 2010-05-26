<?php
/***********************************************************************
 *                           StickyChat SQL Query's.                   *
 *                    Made by Jerald Johnson. Copyright 2010           *
 *                  See LICENSE.txt to view the GPL 3.0 License        *
 ***********************************************************************/
$dev = false;
if ($dev) {
$port = ":84";
} else
$port = '';
header("Content-type: text/css");
$url = "http://".$_SERVER['SERVER_NAME'].$port."/";
?>
/*TEMPLATE Sticky Page -style.CSS - BY KALYAN CHAKRAVARTHY*/
@import url(<?=$url;?>templates/default/emotes.css);
body { text-align:center; background-color:#B7C584; }
code { font-size:12px; }
#page 
{ 
  margin:auto; 
  width:622px; 
  padding:80px;
  padding-top:70px;
  padding-bottom:50px;
  border:3px solid #6F7850;
  font:12px verdana,tahoma;
  text-align:left;
  display:block;
  z-index:-12;
  background-color:#e5dfb9;
  background-image:url(<?=$url;?>sticky.png);
  background-repeat:no-repeat;
  background-position:-10px 0; 
}

#header-   { clear:both; margin:20px; }
#header-h1 { font:35px verdana,tahoma; padding:0; margin:0px; color:#e5dfb9; }
#header-h2 { font:15px verdana,tahoma; padding:0; margin:0px; color:#00CCFF; }
#header-h1 a { color:#002200;  }

#main      { margin:20px; clear:both; height:340px; color:#EDEDE7 }


#main h2   
{
 font:150% verdana,tahoma;
 padding:2px;
 padding-left:5px;
 padding-bottom:0px;
 color:#FFCC99;
 margin:10px 0px 10px 0px;
 font-variant:small-caps;
 display:block;
}

#main   p  { margin:6px; }
#main   ul { padding:0px; margin:10px 0 10px 20px; }
#main   li { list-style: square inside; }

#footer    {  margin:20px; clear:both; text-align:center; color:#e5dfb9; font-size:10px }
#main a, #footer a { color:#e5dfb9; border-bottom:1px solid #7C8269; text-decoration:none; }
#main a:hover, #footer a:hover { color:#cec9a5; }

.img-left{ float:left; clear:left; }
.img-right{ float:right; clear:right; }
 

