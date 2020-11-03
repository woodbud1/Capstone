<?php include './view/header.php'; ?>

<main>
    <h1>Product List</h1>
    <section>
        <!-- display a table of products -->

        <table>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Description</th>
                <th class="right">Price</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td>
                        <form action="index.php" method="post" id="<?php echo htmlspecialchars($product['productID']); ?>">
                        <input type="hidden" name="action" value="View Product" >
                        <input class="button" type="submit" value="View Product" >
                        </form>
                    </td>

                <td><?php echo htmlspecialchars($product['productName']); ?></td>
                <td><?php echo htmlspecialchars($product['description']); ?></td>
                <td class="right"><?php echo htmlspecialchars($product['price']); ?>
                </td>
                <td>
                    <form action="index.php" method="post" id="<?php echo htmlspecialchars($product['productID']); ?>">
                        <input type="hidden" name="action" value="Delete Product" >
                        <input class="button" type="submit" value="Delete Product" >
                    </form>
                </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div id="add_product_btn">
        <form action="index.php" method="post" id="Show Add Product Form">
            <input type="hidden" name="action" value="Show Add Product Form" >
            <input class="button" type="submit" value="Add Product" >
        </form>    
        </div>    
    </section>
</main>
<?php include './view/footer.php'; ?>
