 <?php
class User {

  function __construct($u,$p='""""""""""INVALID"""""""""""""') {
    if ($p == '""""""""""INVALID"""""""""""""') {
      $this->User2($u);
    } else {
      $this->Pass($u,$p);
    }
  }
  function User2($d) {
    $find = "select * from users where user='$d' limit 1";
    $find = mysql_query($find) or die(mysql_error());
    if (strtolower($d) == "system") {
      die("<span style='background-color: #CD5C5C'>Restricted Username</span>");
    }
    if (mysql_num_rows($find) == 1) {
      die("<span style='background-color: #CD5C5C'>Username In Use, please insert pass!</span>");
    } else {
      die("<span style='background-color: #90EE90;color: black'>Username avaliable, insert pass and send to register!</span>");
    }
  }
  
  function Pass($u,$d) {
    $d = md5($d);
    $find = "select * from users where user='$u' && pass='$d' limit 1";
    $find = mysql_query($find) or die(mysql_error());
    if (mysql_num_rows($find) == 1) {
      die("<span style='background-color: #CD5C5C'>Password correct!</span>");
    } else {
      die("<span style='background-color: #90EE90;color: black'>Password inncorrect or wrong username!</span>");
    }
  }
}
?>
