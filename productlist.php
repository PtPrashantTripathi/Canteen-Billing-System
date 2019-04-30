<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<header>
	<center>
	<h1>Canteen Billing System</h1>
	</center>
</header>	
<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	session_start();
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	$product_array = $db_handle->runQuery("SELECT * FROM tbl_product ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="receipt.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<img src="<?php echo $product_array[$key]["image"]; ?>" style="height: 155px;width: 100%;"/>
			<div class="product-tile-footer">
			<div class="product-title">
			<?php echo $product_array[$key]["name"]; ?>
			<div class="product-price"><?php echo "Rs.".$product_array[$key]["price"]; ?></div>
			</div>
			<div class="cart-action"><input type="number" class="product-quantity" name="quantity" value="1" size="2" />
				<button type="submit" class="btnAddAction">Add to Cart</button></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>


</BODY>
</HTML>