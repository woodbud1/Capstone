<?php include '../view/header.php'; ?> 
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table>
<tbody>
<tr>
<th>Name</th>
<th>Code</th>
<th>Quantity</th>
<th>Unit Price</th>
<th>Price</th>
<th>Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td><?php echo $item["quantity"]; ?></td>
				<td><?php echo "$ ".$item["price"]; ?></td>
				<td><?php echo "$ ". number_format($item_price,2); ?></td>
				<td><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td>Total:</td>
<td><?php echo $total_quantity; ?></td>
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
<form action="." method="post" >
        <p><input type="submit" name="action" value="shop" ></p>
</form>
<?php include '../view/footer.php'; ?>