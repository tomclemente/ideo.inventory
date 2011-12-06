<?php

include('database.php');	
$db = new Database();  
$db->connect();
$db->select('ITEM',null,'*','id desc');  
$res = $db->GetResult();

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<script src="js/jquery-1.7.min.js"></script> 
<script src="js/datatables/media/js/jquery.dataTables.js"></script> 
<style type="text/css">
@import "js/datatables/media/css/demo_table.css";</style> 

<link rel="stylesheet" type="text/css" href="sample.css" />
 <script type="text/javascript" src="js/charCount.js"></script>
<script type="text/javascript" src="popup-window.js"></script> 





<script> 
$(document).ready(function(){ 
$('#hor-zebra').dataTable(); 

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

	<form action="employee.php" method="POST">
	<button type="submit"  class="positive"
		  />
		   <img src="images/icons/vcard.png" alt=""/> 
		   View All Employees

	</form>
	
	<form action="addtype.php" method="POST">

	<button type="submit"  class="positive" />
		   <img src="images/icons/application_form_add.png" alt=""/> 
		   ADD TYPE
		</div>
	Type Name <input type="text" name="typename" size="30"><br/>
	</form>


	</br>	</br>








<body>














<table border="1" id="hor-zebra">
	<thead>
		<tr class="odd">
			<th scope="col"  id="hor-zebra">id</th>
			<th scope="col"  id="hor-zebra">CATEGORY ID</th>
			<th scope="col"  id="hor-zebra">EMP ID</th>
			<th scope="col"  id="hor-zebra">NAME</th>
			<th scope="col"  id="hor-zebra">BARCODE</th>
			<th scope="col"  id="hor-zebra">PURCHASED</th>
			<th scope="col"  id="hor-zebra">DESCRIPTION</h>
			<th scope="col"  id="hor-zebra">PRICE</th>
			<th scope="col"  id="hor-zebra">DATEUSED</th>
			<th scope="col"  id="hor-zebra">DATEBROKEN</th>
			<th scope="col"  id="hor-zebra">STATUS</th>
			<th scope="col"  id="hor-zebra">MODIFY</th>
		</tr>
	</thead>
<tbody>
<?php 

foreach ($res as &$value) { ?>


	<tr>
<?php	
	$bool=false;
	foreach ($value as &$key) 
	{
	echo"<td>";
	
		if(!$bool) {
		$dum=$key;
		$bool=true;
		}	
	echo"$key"; echo "&nbsp";	
	echo"</td>";
	} 		
	?>
	<td>
	<form method="post" action="edit.php">
	
	
	 <button type="submit" class="positive">
        <img src="images/icons/page_edit.png" width="100%" alt=""/> 

	</div>

	<input type="hidden" name="data" value="<?php echo $dum; ?>" >
	</form>
	</td>
	<?php
	$bool=false;
		
	echo"</tr>";
} 

?>
	
	
	</td>
</tr>


</tbody>
</table>



<div class="sample_popup" id="popup" style="display: none;">

	<div class="menu_form_header" id="popup_drag">
	<img class="menu_form_exit" id="popup_exit" src="images/icons/cross.png" alt="" />
	&nbsp;&nbsp;&nbsp;ADD ITEM
	</div>
	
	<div class="menu_form_body">

	<?php include('add.php'); ?>
	</div>

</div>

</body>
</html>