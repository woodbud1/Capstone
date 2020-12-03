<?php include './view/header.php'; ?> 
    <div class="row">
            <div class="large-12 columns">
                <center><h1>User List</h1></center>
            </div>
    </div>  
    <div id="form-wrapper" style="max-width:1000px;margin:auto;">
        <div class="row">
        <div class="small-12 column">
<form action="." method="post">
<input type="hidden" name="action" value="empty">
<input type="submit" value="Empty" >
</form>	
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
				<td>
				<form action="." method="post"
                          id="remove_cartitem">
                    <input type="hidden" name="action"
                           value="remove_cartitem">
                    <input type="hidden" name="product_id"
                           value="<?php echo $item["productID"]; ?>">
                    <input class="button" type="submit" value="Remove">
                </form>
				<td>
				<form action="." method="post"
                          id="update_count">
						  <input type="number" class="product-quantity" name="newCount" id="newCount" min="0" />
                    <input type="hidden" name="action"
                           value="update_count">
                    <input type="hidden" name="product_id"
                           value="<?php echo $item["productID"]; ?>">
                    <input class="button" type="submit" value="Update Count">
                </form>
				</td>
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
		foreach($product_array as $product){
	?>
		<div class="product-item">
			<form method="post" action=".">
			<input type="hidden" name="action" value="add_cartitem">
            <input type="hidden" name="productID" value="<?php echo $product["productID"]; ?>">
			<div class="product-image"><img src="<?php echo $product["imageURL"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product["productName"]; ?></div>
			<div class="product-price"><?php echo "$".$product["price"]; ?></div>
			<div class="cart-action"><input type="number" class="product-quantity" name="count" id="count" min="0" value="1" size="1" />
			<input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
<div>
<form method="post" action=".">
<input type="hidden" name="action" value="get_ID_invoices">
<input type="submit" value="Purchases by ID" />
</form>
</div>
<!-- I don't really have a better place to put this atm. Should be an admin only thing -->
<div>
<form method="post" action=".">
<input type="hidden" name="action" value="All Invoices">
<input type="submit" value="All Purchases" />
</form>
</div>
<?php include './view/footer.php'; ?>