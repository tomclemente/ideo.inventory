<?php

include('database.php');
$db = new Database();  
$db->connect();
$db->select('employee');  
$res = $db->GetResult();

?>
<html>
<head>
<title> invent</title>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="stylesheet" type="text/css" href="sample.css" />
<script type="text/javascript" src="js/charCount.js"></script>

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

		<form action="view.php" method="POST">

	<button type="submit"  class="positive"
		  />
		   <img src="images/icons/coins.png" alt=""/> 
		   View All Items

	</form>
  
</div>

</br>


</head>
<body>
<table id="rounded-corner">
	<thead>
		<tr>
			<th scope"col" id="rounded-corner"> Employee List </th>
			
		</tr>
	</thead>
	<tbody>
		
		
<?php		

		foreach($res as &$value){
		echo "<tr>";	
		echo "<td>";
		?>
		
		<a href="empdetails.php?id=<?php echo $value[emp_id];?>&fname=<?php echo $value[emp_fname];?>">
		
		<?php
		echo $value[emp_fname].', ';
		echo $value[emp_lname]; echo"</a>";echo "</br>"; 
		echo "</td>";
		echo "</tr>";
		} ?>
	
	
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