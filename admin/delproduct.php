<?php
session_start();
require_once("../dbcontroller.php");
$db_handle = new DBController();
if(isset($_GET['remove'])){	
		$db_handle->doQuery("DELETE FROM `tbl_product` WHERE `id` ='".$_GET['remove']."'");
}

?>
<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="/style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<header>
	<center>
	<h1>Canteen Billing System</h1>
	</center>
</header>	

<div id="shopping-cart">
<div class="txt-heading">Product List</div>
<a id="btnEmpty" href="addproduct.php">Add Product</a>

<br>
<br>
<br>
<br>
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tbl_product ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<tr>
				<td><img src="../<?php echo $product_array[$key]["image"]; ?>" class="cart-item-image" />
					<?php echo $product_array[$key]["name"]; ?></td>
				<td><?php echo $product_array[$key]["code"]; ?></td>
				<td  style="text-align:right;">Rs. <?php echo $product_array[$key]["price"]; ?></td>
				<td style="text-align:center;"><a href="?remove=<?php echo $product_array[$key]["id"]; ?>" class="btnRemoveAction"><img src="../icon-delete.png" alt="Remove Item" /></a></td>
		</tr>	
		
			
			
	<?php
		}
	}
	?>

				

</tbody>
</table>		
</BODY>
</HTML>