<?php
/***********************************************************************
 *                           StickyChat SQL Query's.                   *
 *                    Made by Jerald Johnson. Copyright 2010           *
 *                  See LICENSE.txt to view the GPL 3.0 License        *
 ***********************************************************************/
if (isset($_GET['all'])) {
?>
<style>
@import url(emote.dat);
</style>
<?php
  require("../classes/view.php");
  require('../inc/sql.php');
  $v = new View($_REQUEST['room'],'','',true);
} elseif (!isset($_REQUEST['name'])) {
  require('../inc/sql.php');
  require("../classes/view.php");
  $v = new View($_REQUEST['room'],$_REQUEST['user'],$_REQUEST['pass'],false);
} else {
  require('../inc/sql.php');
  require("../classes/send.php");
  $send = new Send($_REQUEST['name'],$_REQUEST['msg'],$_REQUEST['pass'],$_REQUEST['room']);
}
die;
?>
