<?php
class Head {
  function __construct($theme) {
    require("templates/".$theme."/header.php");
  }
}
?>
