<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<style type="text/css">
	.green{
		color: green;
	}
</style>
<body>
<center><h3>Welcome To Registration !!!!!!</h3>
	<h3 class="green"><?php echo $this->session->flashdata('message');?></h3>
<form action="<?php echo base_url().'admin/login'?>" method="POST">
	<table border="2">
		<tr>	
			<td><label>Email :</label></td>
			<td><input type="text" name="email" id="email" placeholder="Enter Email"></td>
			<td><label>Password :</label></td>
			<td><input type="Password" name="password" id="password" ></td>
		</tr>
		<tr>	
			<td></td>
			<td><input type="submit" name="btn_login" id="btn_login" value="Login" ></td>
		</tr>
	</table>
</form>
</center>
</body>
</html>
