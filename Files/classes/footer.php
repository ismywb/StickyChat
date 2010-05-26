<?php
/***********************************************************************
 *                           StickyChat SQL Query's.                   *
 *                    Made by Jerald Johnson. Copyright 2010           *
 *                  See LICENSE.txt to view the GPL 3.0 License        *
 ***********************************************************************/
class Footer {
  function __construct($theme) {
    $this->JS();
    require("templates/$theme/footer.php");
  }

  function JS() {
    echo <<<end
<script type="text/javascript" src="js/js.js"></script>
end;
  }
}
?>
