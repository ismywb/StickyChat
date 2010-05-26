<?php
/***********************************************************************
 *                           StickyChat SQL Query's.                   *
 *                    Made by Jerald Johnson. Copyright 2010           *
 *                  See LICENSE.txt to view the GPL 3.0 License        *
 ***********************************************************************/
require('classes/header.php');
require('classes/footer.php');
class Main {
  private $theme = "default";
  function __construct() {
    $head = new Head($this->theme);
    $this->body();    
    $foot = new Footer($this->theme);
    die;
  }

  function body() {
    echo <<<end
<h2>Sticky Chat</h2>
<div id="chat">
</div>
<form action="javascript:void" id="form">  
      <p><input type="hidden" id="room" value="main"><input type="text" id="name" value="Username" size="10" 
maxlength="10"><span id="usercheck"></span><br /><input type="password" id="pass" size="10"><span 
id="pcheck"></span><br /><input id="msg" value="Message" type="text" size="25" maxlength="255"> <input type="submit" 
id="send" value="Chat"></form></p>
      <div><a id="help" href="cmd.php" rel="facebox">Commands</a> | <a href="#replace" id="viewall">View All chats in 
the Channel</a></div>
end;
  }
}
?>
