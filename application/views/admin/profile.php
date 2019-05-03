<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	.green{
		color: green;
	}
</style>
<body>
<center><h3 class="green">Hello User  <?php echo $this->session->userdata('username');?> !!!!!!!!</h3></center>
<h3 class="green"><?php echo $this->session->flashdata('message');?></h3>

<center>
<table>
	<tr><td><a href="<?php echo(base_url('admin/addCard'))?>"><button>Add a Card</button></a></td></tr>
	<tr><td><a href="<?php echo(base_url('admin/viewCard'))?>"><button>View a Card</button></a></td></tr>
</table>
</center>

</body>
</html>