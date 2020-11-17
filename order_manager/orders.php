<?php include './view/header.php'; ?> 
<div class="txt-heading">Orders</div>
<?php
if (isset($_SESSION[""])) {
    
}
?>
<table>
    <tbody>
        <tr>
            <th>Order ID</th>
            <th>Supplier Name</th>
            <th>Supplier ID</th>
            <th>Product ID</th>
            <th>Category ID</th>
            <th>Wholesale Price</th>
            <th>Retail Price</th>
            <th>Count</th>
        </tr>
        <?php
        foreach ($_SESSION[""] as $order) {
            ?>
            <tr>
                <td><?php echo $order["OrderID"]; ?></td>
                <td><?php echo $order["SupplierName"]; ?></td>
                <td><?php echo $order["SupplierID"]; ?></td>
                <td><?php echo $order["ProductID"]; ?></td>
                <td><?php echo $order[CategoryID]; ?></td>
                <td><?php echo $order[WholesalePrice]; ?></td>
                <td><?php echo $order[RetailPrice]; ?></td>
                <td><?php echo $order[Count]; ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<?php include './view/footer.php'; ?>