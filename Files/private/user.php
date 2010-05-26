<?php
/***********************************************************************
 *                           StickyChat SQL Query's.                   *
 *                    Made by Jerald Johnson. Copyright 2010           *
 *                  See LICENSE.txt to view the GPL 3.0 License        *
 ***********************************************************************/
extract($_GET);
require('../inc/sql.php');
require_once("../classes/user.php");
if ($a == "u") {
$u = new User($d);
/*

*/
} else if ($a == 'p') {

$u = new User($u,$d);

}

?>
