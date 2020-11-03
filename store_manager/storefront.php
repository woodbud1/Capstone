<?php include './view/header.php'; ?> 
<div id="product-grid">
	<div class="txt-heading"><h1>Products</h1></div>
	<?php
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["sku"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["imageURL"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["productName"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="count" value="1" size="2" />
			<input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
<form action="." method="post" id="cart">
        <p><input type="submit" name="action" value="Cart" ></p>
</form>
<form action="." method="post" id="pay">
        <p><input type="submit" name="action" value="Pay" ></p>
</form>
<?php include './view/footer.php'; ?>