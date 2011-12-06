<?php

$id = $_GET['id'];
$fname = $_GET['fname'];

include('database.php');	
$db = new Database();  
$db->connect();
$db->select('ITEM', "emp_id='$id'");   
$res = $db->GetResult();


?>

<html>
<head>


<title> Inventory System </title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="sample.css" />

<script type="text/javascript" src="js/charCount.js"></script>
<script type="text/javascript" src="popup-window.js"></script>

<script src="js/jquery-1.7.min.js"></script> 
<script src="js/datatables/media/js/jquery.dataTables.js"></script> 
<style type="text/css">
@import "js/datatables/media/css/demo_table.css";</style> 

<script> 
$(document).ready(function(){ 
$('#rounded-corner').dataTable(); 

}); 
</script> 
</head>
<div class="buttons">
	<form action="" onsubmit="return false;">
	<div>
	<button type="submit"  class="positive"
		   onclick="popup_show('popup', 'popup_drag', 'popup_exit', 'screen-center',         0,   0);" />
		   <img src="images/icons/add.png" alt=""/> 
		   ADD
	</div>
	</form>

		<form action="view.php" method="POST">

	<button type="submit"  class="positive"
		  />
		   <img src="images/icons/coins.png" alt=""/> 
		   View All Items

	</form>
	
	<form action="employee.php" method="POST">

	<button type="submit"  class="positive"
		  />
		   <img src="images/icons/vcard.png" alt=""/> 
		   View All Employees

	</form>
  
</div>

</br>



<body>



<table id="rounded-corner">
	<thead>
		<tr>
			<th scope="col"  id="rounded-corner">id</th>
			<th scope="col"  id="rounded-corner">CATEGORY ID</th>
			<th scope="col"  id="rounded-corner">EMP ID</th>
			<th scope="col"  id="rounded-corner">NAME</th>
			<th scope="col"  id="rounded-corner">BARCODE</th>
			<th scope="col"  id="rounded-corner">PURCHASED</th>
			<th scope="col"  id="rounded-corner">DESCRIPTION</h>
			<th scope="col"  id="rounded-corner">PRICE</th>
			<th scope="col"  id="rounded-corner">DATEUSED</th>
			<th scope="col"  id="rounded-corner">DATEBROKEN</th>
			<th scope="col"  id="rounded-corner">STATUS</th>
			<th scope="col"  id="rounded-corner">MODIFY</th>
			
			
		</tr>
	</thead>
	
<tbody>
		
			
<?php	
		if(!$res){
			echo "<tr>";	
			echo "<td>"; echo "no items";echo "</td>";
			echo "<td>"; echo "registered";echo "</td>";
			echo "<td>"; echo "in";echo "</td>";
			echo "<td>"; echo "the";echo "</td>";
			echo "<td>"; echo "database";echo "</td>";
			echo "<td>"; echo "for this";echo "</td>";
			echo "<td>"; echo "user"; echo "</td>";		echo "<td>"; echo "</td>";
			echo "</tr>";	
		}
		
		
		foreach($res as &$value){

		
			if(is_array($value)) 
			{
				$bool=false;
				echo "<tr>";	
				echo "<td>"; echo $value[id];	echo "</td>";
				echo "<td>"; echo $value[category_id];	echo "</td>";
				echo "<td>"; echo $value[emp_id];	echo "</td>";
				echo "<td>"; echo $value[item_name];	echo "</td>";
				echo "<td>"; echo $value[item_barcode];	echo "</td>";	
				echo "<td>"; echo $value[item_date_purchased];	echo "</td>";
				echo "<td>"; echo $value[item_description];	echo "</td>";
				echo "<td>"; echo $value[item_price];	echo "</td>";
				echo "<td>"; echo $value[item_date_used];	echo "</td>";
				echo "<td>"; echo $value[item_date_purchased];	echo "</td>";
				echo "<td>"; echo $value[status];	echo "</td>";
				
				?>
				<td>
				<form method="post" action="editemp.php">
	
				 <button type="submit" class="positive">
				 <img src="images/icons/page_edit.png" width="100%" alt=""/> 

				

				<input type="hidden" name="data" value="<?php echo $value[id]; ?>" >
				</form>
				</td>
				
				
			</tr>
			<?php
			}
			
			else {
				$bool=true;
		
			}
			
		} 
		if($bool) {
		echo"<tr>";
		echo "<td>"; echo $res[id];	echo "</td>";
		echo "<td>"; echo $res[category_id];	echo "</td>";
		echo "<td>"; echo $res[emp_id];	echo "</td>";
		echo "<td>"; echo $res[item_name];	echo "</td>";
		echo "<td>"; echo $res[item_barcode];	echo "</td>";	
		echo "<td>"; echo $res[item_date_purchased];	echo "</td>";
		echo "<td>"; echo $res[item_description];	echo "</td>";
		echo "<td>"; echo $res[item_price];	echo "</td>";
		echo "<td>"; echo $res[item_date_used];	echo "</td>";
		echo "<td>"; echo $res[item_date_purchased];	echo "</td>";
		echo "<td>"; echo $res[status];	echo "</td>";
		?>
			<td>
				<form method="post" action="editemp.php">
	
				 <button type="submit" class="positive">
				 <img src="images/icons/page_edit.png" width="100%" alt=""/> 

				

				<input type="hidden" name="data" value="<?php echo $res[id]; ?>" >
				</form>
				</td>
		
		<?php
				echo"</tr>";
				
				
		}
		
		?>
		
	
	
	</tbody>

</table>





	<div class="sample_popup"     id="popup" style="display: none;">

		<div class="menu_form_header" id="popup_drag">
		<img class="menu_form_exit"   id="popup_exit" src="form_exit.png" alt="" />
		&nbsp;&nbsp;&nbsp;ADD ITEM
		
		</div>
		<div class="menu_form_body">
		<?php include('add.php'); ?>
		</div>

	</div>
	
</body>
</html>