<?php
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
