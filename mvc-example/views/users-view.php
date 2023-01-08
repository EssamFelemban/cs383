<?php
		include ('../html_lib/Table.php');
		$table_header = array("ID","Name", "Update", "Delete");
 ?>

<!DOCTYPE htm>
<html>
<body>
  <?= Table::table_header($table_header) ?>

  <?= Table::table_body($data) ?>

  <?= Table::table_footer() ?>

</body>
</html>
