<?php
include '../dbcontroller.php';
$db_handle = new DBController();
if(isset($_POST['add'])){	
	
	if($_FILES['file']['size']>'0'){ 
	
	$file_loc = $_FILES['file']['tmp_name'];
	$folder="product-images/";
	$file_name = $_FILES['file']['name'];
	
	move_uploaded_file($file_loc,$folder.$file_name);
	
	$db_handle->runQuery("INSERT INTO tbl_product VALUES ('','".$_POST['name']."','". preg_replace('/\s+/','', strtolower($_POST['name']))."','".$folder.$file_name."','".$_POST['price']."')");
	}
header("Location: delproduct.php");
}
?>
<HTML>
<HEAD>
<TITLE>Add Product</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
<link href="/style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<header>
	<center>
	<h1>Canteen Billing System</h1>
	</center>
</header>	

<div class="login" style="width:600px;">
    <h1 align="center">Add Product</h1>
	<form method="post" enctype="multipart/form-data">
			<label for="file">Name:</label>
			<input type="text" name="name" placeholder="Product Name" /><br><br>
			<label for="file">Price :</label>
			<input type="text" name="price" placeholder="Product Price" /><br><br>
			<label for="file">Attach Photo :</label><br>
			<input id="file" type="file" name="file"></input><br><br>
			<input type="submit" name="add" value="Add Product" />
	</form>
</div>

</div>