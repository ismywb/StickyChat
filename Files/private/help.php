<?php
include('../inc/sql.php');
function isAdmin($name,$pass) {


$pass = md5($pass);
$sql = mysql_query("select * from users where user='$name' && pass='$pass' && level=1");
if (mysql_num_rows($sql) == 1) {
return true;
}
return false;
}

$sql = "select * from cmds where level=0";
$sql = mysql_query($sql);
echo "<center><h1>Commands</h1></center>";
while($d = mysql_fetch_array($sql)) {
echo "<p>{$d['cmd']}: {$d['des']}</p>";
}
if (isAdmin($_REQUEST['user'],$_REQUEST['pass'])) {
$sql = "select * from cmds where level=1";
$sql = mysql_query($sql);
echo "<center><h1>Admin Commands</h1></center>";
while($d = mysql_fetch_array($sql)) {
echo "<p>{$d['cmd']}: {$d['des']}</p>";
}
}
?>
