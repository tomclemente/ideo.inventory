<?php


$db = new Database();  
$db->connect();
$db->select('employee');  
$res = $db->GetResult();

$db2 = new Database();
$db2->connect();
$db2->select('category');
$res1 = $db2->GetResult();

	

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<style type="text/css">@import "css/jquery.datepick.css";</style> 
<script type="text/javascript" src="js/jquery.datepick.js"></script>
<script type="text/javascript" src="js/charCount.js"></script>

<script type="text/javascript">
$(function() {
	$('#date').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#date2').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#date3').datepick({dateFormat: 'yyyy-mm-dd'});
});




</script>

</head>

<body>

<form method="post" action="append.php">
<input type="hidden" name="item[temp1]" value=""><br/>

Category Name
			<select name = "item[id]">
			<?php
				foreach ($res1 as &$ivalue) 
				{ ?>
					<option value=<?php echo $ivalue[category_id];?> >
					<?php echo $ivalue[category_name]; echo "</br>";
					echo "</option>";
				}

			?><br/> <br/> <input type="hidden"> </input>
 <br/>Employee ID  <br/>  


 <select name="item[employee]" >
 <br/>		
<?php
foreach ($res as &$value) 
	{ ?>
	<option value=<?php echo $value[emp_id];?> >
	<?php echo $value[emp_lname].', ';
	echo $value[emp_fname]; echo "</br>";
	echo "</option>";
		
	}
?>
 </select>
  <br/>			
			
Item Name    <br/>  <input type="text" name="item[name]" size="30"><br/>   
Item Barcode   <br/>   <input type="text" name="item[barcode]" size="30"><br/>


 <!-- <input type="text" name="item[employee]" size="30"><br/> !-->


Item Date Purchased   <br/>   <input type="text" id="date3" name="item[datepurchased]" size="30"><br/>
 <!--Item Description   <br/>   <textarea rows="4" cols="24" name="item[description]" size="30"></textarea><br/> !-->
Item Description
<textarea name="item[description]" id="taMessage" cols="24" rows="5"
onkeyup="CheckFieldLength(taMessage, 'charcount', 'remaining', 100);" onkeydown="CheckFieldLength(taMessage, 'charcount', 'remaining', 100);" onmouseout="CheckFieldLength(taMessage, 'charcount', 'remaining', 100);"></textarea><br>
<small><span id="charcount">0</span> ch entered.&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span id="remaining">100</span> ch remaining.</small><br>

Item Price   <br/>   <input type="text" value="<?php echo number_format($total, 2, '.', ',');?>" name="item[price]" size="30"><br/>
Item Date Used    <input type="text" id="date" name="item[dateused]" size="30"><br/>
Item Date Broken    <input type="text" id="date2" name="item[datebroken]" size="30"><br/>


			


<?php
/*foreach ($res as &$value) 
	{ ?>
	<option value=<?php echo $value[emp_id];?> >
	<?php echo $value[emp_lname].', ';
	echo $value[emp_fname]; echo "</br>";
	echo "</option>";
		foreach($value as &$key){	
		}
	}*/
?>

			</select><br/>
Type Status
			<select name = "item[status]">
				<option value = "1">Available</option>
				<option value = "0">N/A</option>
			</select><br/><br/>




<div class="buttons">

	<div>
	<button type="submit" class="positive" />
		   <img src="images/icons/tick.png" alt=""/>Add to database
	</div>

</div>	
	
	</br>
		


	</form>

</body>

</html>
