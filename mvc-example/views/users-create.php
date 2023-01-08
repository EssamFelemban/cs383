<?php
  //include ('../html_lib/Table.php');
  include ('../html_lib/Form.php');

  $createUserForm = new Form('createuser','post','controller.php?action=save');
 ?>

<!DOCTYPE htm>
<html>
<body>
<h3> Create new User</h3>

<?=$createUserForm->form_start()?>

  <?=$createUserForm->form_label("labelname", "Name: ")?>
  <?=$createUserForm->form_text("name")?>
  <?=$createUserForm->form_submit("submit", "..Add..")?>
<?=$createUserForm->form_end()?>
</body>
</html>
