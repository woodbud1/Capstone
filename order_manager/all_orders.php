<?php include './view/header.php'; ?>

<main>
    <h1>All Orders</h1>
    <section>
        <!-- display a table of orders -->

        <table>
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
            <?php foreach ($orders as $order) : ?>
                <tr>
                <td><?php echo htmlspecialchars($order['OrderID']); ?></td>
                <td><?php echo htmlspecialchars($order['SupplierName']); ?></td>
                <td><?php echo htmlspecialchars($order['SupplierID']); ?></td>
                <td><?php echo htmlspecialchars($order['ProductID']); ?></td>
                <td><?php echo htmlspecialchars($order['CategoryID']); ?></td>
                <td><?php echo htmlspecialchars($order['WholesalePrice']); ?></td>
                <td><?php echo htmlspecialchars($order['RetailPrice']); ?></td>
                <td><?php echo htmlspecialchars($order['Count']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div id="add_product_btn">
        <form action="." method="post" >
            <input type="hidden" name="action" value="Landing" >
            <input class="button" type="submit" value="Back" >
        </form>
        </div>    
    </section>
</main>

<?php include './view/footer.php'; ?>
