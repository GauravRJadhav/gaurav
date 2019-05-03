<!DOCTYPE html>
<html>
<head>
	<title>Add Card</title>
</head>
<style type="text/css">
	.green{
		color: green;
	}
</style>
<body>
<center><h3>Add  card !!!!!!</h3>
	<h3 class="green"><?php echo $this->session->flashdata('message');?></h3>
<form action="<?php echo base_url().'admin/addCard'?>" method="POST">
	<table border="2">
		<tr>
			<td><label>Title :</label></td>
			<td><input type="text" name="title" id="title" placeholder="Enter Title"></td>
		</tr>
		<tr>	
			<td><label>Tags / Keyword :</label></td>
			<td><input type="text" name="tags" id="tags" placeholder="Enter tags"></td>
		</tr>
		<tr>	
			<td><label>Description :</label></td>
			<td><input type="text" name="description" id="description" placeholder="Enter tags"></td>
		</tr>
		<tr>	
			<td></td>
			<td><input type="submit" name="btn_add_card" id="btn_add_card" value="Add"></td>
		</tr>
	</table>
</form>
</center>
</body>
</html>
