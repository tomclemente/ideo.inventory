<?php
include('database.php');
//include('crud.php');  

	
	$item2 = $_POST['item'];
	$type2 = $_POST['category'];
	$value = array();
	$typevalue = array();
	$i=0;
	$ii=0;
	
	foreach ($item2 as &$key) {
		if($key) {
		$value[$i]=$key;

		}
		else {
		$value[$i]="0";
		}
			
		
		$i=$i+1;
	}
	
	
	unset($_POST);
	
	$db = new Database();  
	$db->connect();
	$db->select('ITEM');
	
	$db->insert('ITEM',$value);  
	//$db->select('TYPE');
	//$db->insert('TYPE',$typevalue);  
	//$db->insert('mysqlcrud',array(3,"Name 4","this@wasinsert.ed"));
	//$db->insert('ITEM','$item');
	header("Location: view.php");


?>