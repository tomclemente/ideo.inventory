<?php
include('database.php');
$typename = $_POST['typename'];
unset($_POST);

$db = new Database();
$db -> connect();
$db->select('TYPE');
$db->insert('TYPE',array("0",$typename,"1"));


header('Location: view.php');
?>

	
