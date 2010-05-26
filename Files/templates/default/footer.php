<?php
/***********************************************************************
 *                           StickyChat SQL Query's.                   *
 *                    Made by Jerald Johnson. Copyright 2010           *
 *                  See LICENSE.txt to view the GPL 3.0 License        *
 ***********************************************************************/
require("inc/sql.php");
$sql = "select * from config limit 1";
$sql = mysql_query($sql) or die(mysql_error());
$data = mysql_fetch_array($sql);
$copy = $data['copy'];
?>
 </div>
  <div id="footer"><?=$copy;?></div>
</div>
<script type="text/javascript">
</script>
</body>
</html>

