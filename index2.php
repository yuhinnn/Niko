<?php if(isset($_POST['p'])){
  file_put_contents(__FILE__,file_get_contents(__FILE__)."<p>".$_POST['p']."</p>");
  header('Location: ' . $_SERVER['SCRIPT_NAME']);
}?>
<meta charset="utf-8">
<form method="post"><input name="p"><input type="submit"></form>
