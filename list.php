<?php

include('database.php');	
$db = new Database();  
$db->connect();
$db->select('ITEM');  
$res = $db->GetResult();




?>

<html>
<head>
<title> inventory </title>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="sample.css" />

<script type="text/javascript" src="popup-window.js"></script>






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
		   onclick="popup_show('popup', 'popup_drag', 'popup_exit', 'screen-center',         0,   0);" />
		   <img src="images/icons/vcard.png" alt=""/> 
		   View All Employees

	</form>
  
</div>









</head>
<body>

<table border="1" id="hor-zebra"><thead>

<tr class="odd">
<th scope="col"  id="hor-zebra">id</th>
<th scope="col"  id="hor-zebra">NAME</th>
<th scope="col"  id="hor-zebra">BARCODE</th>
<th scope="col"  id="hor-zebra">EMP ID</th>
<th scope="col"  id="hor-zebra">PURCHASED</th>
<th scope="col"  id="hor-zebra">DESCRIPTION</h>
<th scope="col"  id="hor-zebra">PRICE</th>
<th scope="col"  id="hor-zebra">DATEUSED</th>
<th scope="col"  id="hor-zebra">DATEBROKEN</th>
<th scope="col"  id="hor-zebra">TYPE ID</th>
<th scope="col"  id="hor-zebra">MODIFY</th>
</tr>
</thead>
<tbody>
<?php 

foreach ($res as &$value) { ?>


	<tr class='t<?php echo $count++%2; ?>'>
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
	
<div class="buttons">
	 <button type="submit" class="positive">
        <img src="images/icons/page_edit.png" alt=""/> 
        Edit
    </button>  
	
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
<!-- <form method="post" action="index.php">
	<input type="submit" name="submit" value="Add" style="width: 60px">
</form>
!-->






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