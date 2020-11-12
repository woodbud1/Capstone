<?php include './view/header.php'; ?> 
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>
<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_count = 0;
    $total_price = 0;
?>	
<table>
<tbody>
<tr>
<th>Name</th>
<th>SKU</th>
<th>Count</th>
<th>Unit Price</th>
<th>Price</th>
<th>Remove</th>
</tr>	

<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["count"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["imageURL"]; ?>" class="cart-item-image" /><?php echo $item["productName"]; ?></td>
				<td><?php echo $item["sku"]; ?></td>
				<td><?php echo $item["count"]; ?></td>
				<td><?php echo "$ ".$item["price"]; ?></td>
				<td><?php echo "$ ". number_format($item_price,2); ?></td>
				<td><a href="index.php?action=remove&productID=<?php echo $item["productID"]; ?>" class="btnRemoveAction">Remove</a></td>
				</tr>
				<?php
				$total_count += $item["count"];
				$total_price += ($item["price"]*$item["count"]);
		}
		?>
</form>
<form action="." method="post">
        <p>
		<input type="submit" name="action" value="pay" >
		<input type="hidden" name="total_price" value=<?php echo $total_price; ?> />
		</p>
</form>	
<tr>
<td>Total:</td>
<td><?php echo $total_count; ?></td>
<td><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty!</div>
<?php 
}
?>
</div>
<div id="product-grid">
	<div class="txt-heading"><h1>Products</h1></div>

	<?php
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&productID=<?php echo $product_array[$key]["productID"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["imageURL"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["productName"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="count" id="count" value="1" size="2" />
			<input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
<?php include './view/footer.php'; ?>