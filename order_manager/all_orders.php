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
            <?php foreach ($Orders as $order) : ?>
                <tr>
                <td><?php echo htmlspecialchars($order['orderID']); ?></td>
                <td><?php echo htmlspecialchars($order['supplierName']); ?></td>
                <td><?php echo htmlspecialchars($order['supplierID']); ?></td>
                <td><?php echo htmlspecialchars($order['productID']); ?></td>
                <td><?php echo htmlspecialchars($order['categoryID']); ?></td>
                <td><?php echo htmlspecialchars($order['wholesalePrice']); ?></td>
                <td><?php echo htmlspecialchars($order['retailPrice']); ?></td>
                <td><?php echo htmlspecialchars($order['count']); ?></td>
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
