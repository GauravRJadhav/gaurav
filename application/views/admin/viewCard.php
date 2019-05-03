<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	.green{
		color: green;
	}
	.card{
		background-color: #e9dddd;
		height: 80px;
    	width: 500px;

	}
</style>
<body>

	<h2><a href="<?php echo base_url().'admin/logout'?>">logout</a></h2>
<h3 class="green"><?php echo $this->session->flashdata('message');?></h3>

	<?php 
		if( !empty($viewCardData) )
		{
			foreach ($viewCardData as $key => $value) {
			?>
	<div class="card">
		<div class="row">
		<label style="float: right;">Added by : <?php echo $value['addedby'] ?> </label><br>
	</div>
	<div class="row">
		<label>Title : <?php echo $value['title'] ?> </label>
	</div>
	<div class="row">
		<label>Tags : <?php echo $value['tags'] ?></label>
	</div>
	<div class="row">
		<label>Description : <?php echo $value['description'] ?></label>
	</div>

</div><br>
<?php } } ?>

<table>
	<tr><td><a href="<?php echo(base_url('admin/ascSort'))?>"><button>Ascending Sort</button></a></td></tr>
	<tr><td><a href="<?php echo(base_url('admin/descSort'))?>"><button>Descending Sort</button></a></td></tr>
</table>
<h3>Search Filter : </h3>
<form action="<?php echo base_url().'admin/searchCard'?>" method="POST">
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
			<td><label>User :</label></td>
			<td><input type="text" name="username" id="username" placeholder="Enter Username"></td>
		</tr>
		<tr>	
			<td></td>
			<td><input type="submit" name="btn_serach" id="btn_serach" value="Search"></td>
		</tr>
	</table>
</form>
</body>
</html>