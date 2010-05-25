<?php
class View {
  private $room;
  private $user;
  private $pass;
  private $all;
  function View($room,$user,$pass,$all) {
    $this->room = "chat_".$room;
    $this->user = $user;
    $this->all = $all;
    $this->pass = $pass;
    $this->createTableIfNotExists();
    $sql = $this->getQuery();
    $msg = $this->getMsgs($sql);
    echo $msg;
    die;
  }
  
  function preEmote($msg) {
    $msg = str_replace("&lt;3","<l class=\"emote heart\">",$msg);
    $msg = str_replace("^^"," <l class=\"emote joy\">",$msg);
    $msg = str_replace("&gt;:(","<l class=\"emote mad\">",$msg);
    $msg = str_replace(":d" ,"<l class=\"emote chessy\">",$msg);
    $msg = str_replace(":D","<l class=\"emote chessy\">",$msg);
    $msg = str_replace(":/","<l class=\"emote worried\">",$msg);
    $msg = str_replace("0_0","<l class=\"emote oh\">",$msg);
    $msg = str_replace("o_o","<l class=\"emote oh\">",$msg);
    $msg = str_replace("O_O","<l class=\"emote oh\">",$msg);
    $msg = str_replace(";p","<l class=\"emote tongue\">",$msg);
    $msg = str_replace(";P","<l class=\"emote tongue\">",$msg);
    $msg = str_replace(";)","<l class=\"emote wink\">",$msg);
    $msg = str_replace(":p","<l class=\"emote tongue\">",$msg);
    $msg = str_replace(":P","<l class=\"emote tongue\">",$msg);
    $msg = str_replace("-_-","<l class=\"emote fail\">",$msg);
    $msg = str_replace(":'(","<l class=\"emote cry\">",$msg);
    $msg = str_replace("B)","<l class=\"emote cool\">",$msg);
    $msg = str_replace(":(","<l class=\"emote sad\">",$msg);
    return $msg;
  }
  
  function postEmote($msg) {
    $msg = preg_replace("/\<l class=\"emote (.*?)\"\>/is","<img style=\"border:none;\" class=\"emote $1\" src=\"http://s.ytimg.com/yt/img/pixel-vfl73.gif\">",$msg);
    return $msg;
  }
  
  function parseTags($msg) {
    $msg = htmlspecialchars($msg);
    $msg = $this->preEmote($msg);
    $msg = preg_replace("/(.*?)reply:(.*?);(.*)/is","$1(<a href='javascript:void' onclick='$(\"#msg\").attr({value:\"/pm $2 \"})'>Reply</a>)$3",$msg);
    $msg = preg_replace("/(.*?)(http|https):(\/\/www.|\/\/)(.*)/","<a href='$2:$3$4' ref='nofollow'>$2:$3$4</a> ",$msg);
    $msg = $this->postEmote($msg);
    $msg = preg_replace("/(.*?)\[chan:(.*?)\](.*)/is","<a href='javascript:void(0)' onclick='changeChan(\"$2\")>Go to Channel: $2</a>",$msg);
    return $msg;
  }
  
  function getMsgs($sql) {
    $sql = mysql_query($sql) or die(mysql_error());
    $msg = '';
    while($d = mysql_fetch_array($sql)) {
      $name = $d[name];
      $name = strip_tags($name);
      $msg2 = $d[msg];
      $msg2 = $this->parseTags($msg2);
      $msg = '<p>'.$name.': '.$msg2."</b></u></i></p>\n".$msg;
    }
    if (mysql_num_rows($sql) < 10) {
      $msg = "<p>System: <i>The chat has been created/cleared</i></p>\n".$msg;
    }
    return $msg;
  }
    
  function getQuery() {
    if ($this->isLoggedIn()) {
      $to = "`to`=\"all\" or `to`=\"$this->user\"";
    } else {
      $to = "`to`=\"all\"";
    }
    if ($this->all) {
      $order = "order by id DESC";
    } else {
      $order = "order by id DESC limit 10";
    }
    return "select * from $this->room where $to $order";
  }
  
  function isLoggedIn() {
    $pass = md5($this->pass);
    $sql = mysql_query("select * from users where user='$this->user' && pass='$pass'");
    if (mysql_num_rows($sql) == 1) {
      return true;
    }
    return false;
  }
  
  function createTableIfNotExists() {
    $table1 = "CREATE TABLE IF NOT EXISTS $this->room (id int(5) NOT NULL auto_increment,name varchar(25) NOT NULL,msg varchar(255) NOT NULL,`to` varchar(50) NOT NULL default 'all',PRIMARY KEY  (id));";
    mysql_query($table1);
  }
}
?>  
