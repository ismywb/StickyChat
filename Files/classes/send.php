<?php
/***********************************************************************
 *                           StickyChat SQL Query's.                   *
 *                    Made by Jerald Johnson. Copyright 2010           *
 *                  See LICENSE.txt to view the GPL 3.0 License        *
 ***********************************************************************/
class MysqlStringEscaper
{
    function __get($value)
    {
        return mysql_real_escape_string($value);
    }
}
$str = new MysqlStringEscaper;
class Send {
  private $name;
  private $pass;
  private $msg;
  private $room;
  function Send($name,$msg,$pass,$room) {
    $this->name = $name;
    $this->msg = $msg;
    $this->pass = $pass;
    $this->room = "chat_".$room;
    if ($name == '' || $msg == '') {
      exit;
    }
    $this->dieIfSystem();
    $this->add2UsersIfShould();
    $this->checkLoginorDie();
    if ($this->isCmd()) {
      if ($this->isAdmin()) {
        $this->doCmd($this->adminCmd());
      } else {
        $this->doCmd();
      }
    } else {
     $this->addMsg();
    }
    exit;
  }
  
  function adminCmd() {
    return "select * from cmds";
  }
  
  function doCmd($cmd = "select * from cmds where level = 0") {
    $msg1 = explode(" ",$this->msg);
    $cmd = mysql_query($cmd) or die(mysql_error());
    while($c = mysql_fetch_array($cmd)) {
      $cmdname = explode(" ",$c['cmd']);
      if ($cmdname[0] == $msg1[0] && $c['type'] != 'none/js') {
        eval($c['code']);
        break;
      } else {
        continue;
      }
    }
  }
  
  function checkLoginOrDie() {
    $sql = "select * from users where user='$this->name' limit 1";
    $sql = mysql_query($sql) or die($this->addSystemError(mysql_error()));
    if (mysql_num_rows($sql) == 1) {
      $user = mysql_fetch_array($sql);
      $pass = md5($this->pass);
      if ($pass != $user['pass']) {
        die;
      }
    }
  }
  
  function addMsg() {
    $sql = "insert into $this->room set name='$this->name',msg='{$this->msg}'";
    mysql_query($sql) or die(mysql_error());
  }
  
  function isCmd() {
    return ($this->msg[0] == "/");
  }
  
  function add2UsersIfShould() {
    $user = "select * from users where user='$this->name' limit 1";
    $user = mysql_query($user);
    if (mysql_num_rows($user) == 0 && $this->pass != '') {
      $pass = md5($this->pass);
      mysql_query("insert into users set user='$this->name',pass='$pass'") or die($this->addSystemError(mysql_error()));
    }
  }
  
  function isAdmin() {
    $pass = md5($this->pass);
    $sql = mysql_query("select * from users where user='$this->name' && pass='$pass' && level=1 limit 1");
    return(mysql_num_rows($sql) == 1);
  }

  
  function addSystemError($err) {
    mysql_query("insert into main set name='System',msg='{$str->$err}'");
  }
  
  function dieIfSystem() {
    if (strtolower($this->name) == "system")
      die;
  }
}
?>
