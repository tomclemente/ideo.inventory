
<?php

	include('database.php');
	$data = $_POST['data'];
	$db = new Database();  
	$db->connect();
	$db->select('ITEM', "id='$data'");  
	$res = $db->GetResult();

	$db2 = new Database();  
	$db2->select('employee');  
	$res2 = $db2->GetResult();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<style type="text/css">@import "css/jquery.datepick.css";</style> 
<link rel="stylesheet" type="text/css" href="sample.css" />
<script type="text/javascript" src="js/jquery.datepick.js"></script>
<script type="text/javascript">
$(function() {
	$('#date').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#date2').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#date3').datepick({dateFormat: 'yyyy-mm-dd'});
});


</script>

</head>

<form method="post" action="update.php">

</br>


Item Name    <br/>  <input type="text" name="name" value="<?php echo $res[item_name]; ?>" size="30"><br/>   
Item Barcode   <br/>   <input type="text" name="barcode" value="<?php echo $res[item_barcode]; ?>" size="30"><br/>
Employee ID  <br/>   <select name="employee" >

<?php
foreach ($res2 as &$value) 
	{ ?>
	
	<option value=<?php echo $value[emp_id];?> >
	<?php echo $value[emp_fname].', ';
	echo $value[emp_lname]; echo "</br>";
	echo "</option>";
		foreach($value as &$key){	
		}
	}
?></select>
</br>
Item Date Purchased   <br/>   <input type="text" id="date3" name="datepurchased" value="<?php echo $res[item_date_purchased]; ?>" size="30"><br/>
Item Description   <br/>  <textarea rows="4" cols="26" name="description"  size="30"><?php echo $res[item_description]; ?> </textarea> <br/>
Item Price   <br/>   <input type="text" name="price" value="<?php echo $res[item_price]; ?>" size="30"><br/>
Item Date Used   <br/> <input type="text" id="date" name="dateused" value="<?php echo $res[item_date_used]; ?>" size="30"><br/>
Item Date Broken   <br/> <input type="text" id="date2" name="datebroken" value="<?php echo $res[item_date_broken]; ?>" size="30"><br/>
<input type="hidden" name="data" value="<?php echo $data; ?>">
<input type="submit" value="UPDATE!" name="submit" style="width: 80px"> </form>

Type Name 
</html>