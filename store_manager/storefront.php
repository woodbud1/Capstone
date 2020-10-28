<?php include '../view/header.php'; ?> 
<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
<form action="." method="post" >
        <p><input type="submit" name="action" value="cart" ></p>
</form>
<form action="." method="post" >
        <p><input type="submit" name="action" value="pay" ></p>
</form>
<?php include '../view/footer.php'; ?>