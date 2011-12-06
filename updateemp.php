<?php
	$bool = false;
	include('database.php');
	$data = $_POST['data'];
	$db = new Database();  
	$db->connect();
	$db->select('ITEM', "id='$data'");  
	$res = $db->GetResult();
if (isset($_POST["submit"])) 
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$barcode=$_POST['barcode'];
	$empid=$_POST['employee'];
	$datepurchased=$_POST['datepurchased'];
	$description=$_POST['description'];
	$itemprice=$_POST['price'];
	$dateused=$_POST['dateused'];
	$datebroken=$_POST['datebroken'];
	$bool=true;
	
	
	
	$db->update('ITEM',array('item_name'=>$name,'item_barcode'=>$barcode,'emp_id'=>$empid,'item_date_purchased'=>$datepurchased,'item_description'=>$description,'item_price'=>$itemprice,'item_date_used'=>$dateused,'item_date_broken'=>$datebroken),array('id',$data));  
	//$db->update('ITEM',array('item_name'=>'WEEE!'),array('id',$data));  
		
		$url = "empdetails.php?id=".$empid;
		header("Location: $url");
	
		
}
?>