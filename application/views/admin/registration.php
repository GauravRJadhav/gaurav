<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<style type="text/css">
	.green{
		color: green;
	}
	.red{
		color: red;
	}
</style>
<body>
<center><h3>Welcome To Registration !!!!!!</h3>
	<h3 class="green"><?php echo $this->session->flashdata('message');?></h3>
<form action="<?php echo base_url().'admin'?>" method="POST">
	<table border="2">
		<tr>
			<td><label>Name :</label></td>
			<td><input type="text" name="name" id="name" placeholder="Enter Name"><span id="error_name" class="red"></span></td>
			
			<td><label>Contact Number :</label></td>
			<td><input type="text" name="number" id="number" pattern="^[0-9]*$"  placeholder="Enter Number"><span id="error_number" class="red"></span></td>
			
		</tr>
		<tr>	
			<td><label>Email :</label></td>
			<td><input type="email" name="email" id="email" placeholder="Enter Email"><span id="error_email" class="red"></span></td>
			
			<td><label>Password :</label></td>
			<td><input type="Password" name="password" id="password" ><span id="error_password" class="red"></span></td>
			
		</tr>
		<tr>	
			<td></td>
			<td><input type="submit" name="btn_register" id="btn_register" value="Register"></td>
			
			<td><input type="submit" name="btn_login" id="btn_login" value="Login" ></td>
		</tr>
	</table>
</form>
</center>

<script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>

<script type="text/javascript">
	$('#btn_register').click(function(){
		var name =$('#name').val();
		var number = $('#number').val();
		var email = $('#email').val();
		var password =$('#password').val();
		 var expr =/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		 
		flag = 0;

			if( name == "")
			{
				$('#error_name').html( "Please Enter name  ");
				flag = 1;
			}
			else if( number == "")
			{
				$('#error_number').html( "Please Enter number  ");
				flag = 1;
			}
			
		else if( email == "")
			{
				$('#error_email').html( "Please Enter email  ");
				flag = 1;
			}
			else if( password == "")
			{
				$('#error_password').html( "Please Enter password  ");
				flag = 1;
			}
			else{
				$('#error_name').html( "");
				$('#error_number').html( "");
				$('#error_email').html( "");
				$('#error_password').html( "");
			}


			if( flag == 1 )
			{
				return false;
			}
			else
			{
				return true;
			}




	})
</script>

</body>
</html>
