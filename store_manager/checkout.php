<?php include '../view/header.php'; ?> 
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>
<?php echo $sku ?>
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
				<td><a href="index.php?action=remove&code=<?php echo $item["sku"]; ?>" class="btnRemoveAction">Remove</a></td>
				</tr>
				<?php
				$total_count += $item["count"];
				$total_price += ($item["price"]*$item["count"]);
		}
		?>

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
<form action="." method="post">
<input type="hidden" name="action" value="cart">
<p><input type="submit" name="submit" value="Cart" ></p>
</form>
<form action="." method="post">
<input type="hidden" name="action" value="pay">
<p><input type="submit" name="submit" value="Pay" ></p>
</form>
<?php include '../view/footer.php'; ?>