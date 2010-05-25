<?php
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
