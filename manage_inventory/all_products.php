<?php include './view/header.php'; ?>

<main>
    <h1>Product List</h1>
    <section>
        <!-- display a table of products -->

        <table>
            <tr>
                <!--<th></th>-->
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th class="right">Price</th>
                <th>SKU</th>
<!--                <th>&nbsp;</th>
                <th></th>-->
                <th></th>
            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
<!--                    <td>
                        <form action="." method="post"
                              id="view_product">
                            <input type="hidden" name="action"
                                   value="View Product">
                            <input type="hidden" name="product_id"
                                   value="<?php // echo htmlspecialchars($product['productID']); ?>">
                            <input class="button" type="submit" value="View Product">
                        </form>
                    </td>-->
                    <td><img src="<?php echo htmlspecialchars($product['imageURL']); ?>"></td>
                    <td><?php echo htmlspecialchars($product['productName']); ?></td>
                    <td><?php echo htmlspecialchars($product['description']); ?></td>
                    <td class="right"><?php echo htmlspecialchars($product['price']); ?>
                    </td>
                    <td><?php echo htmlspecialchars($product['sku']); ?></td>
<!--                    <td><form action="." method="post"
                              id="delete_product_form">
                            <input type="hidden" name="action"
                                   value="Delete Product">
                            <input type="hidden" name="product_id"
                                   value="<?php //echo htmlspecialchars($product['productID']); ?>">
                            <input class="button" type="submit" value="Delete Product">
                        </form></td>
                    <td>-->
<!--                        <form action="." method="post">
                            <input type="hidden" name="action" value="Show Edit Product Form">  
                            <input type="hidden" name="productName" value="<?php //echo $product['productName']; ?>">
                            <input type="hidden" name="price" value="<?php //echo $product['price']; ?>">
                            <input type="hidden" name="description" value="<?php //echo $product['description']; ?>">
                            <input type="hidden" name="imageURL" value="<?php //echo $product['imageURL']; ?>">
                            <input type="hidden" name="sku" value="<?php //echo $product['sku']; ?>">
                            <input class="button" type="submit" value="Edit Product">
                        </form>-->
                    </td>
                    <td>
                        <div class="btn-group">
                            <form action="." method="post"
                                  id="view_product">
                                <input type="hidden" name="action"
                                       value="View Product">
                                <input type="hidden" name="product_id"
                                       value="<?php echo htmlspecialchars($product['productID']); ?>">
                                <input class="button" type="submit" value="View Product" style="margin: 2px;">
                            </form>
                            <form action="." method="post"
                                  id="delete_product_form">
                                <input type="hidden" name="action"
                                       value="Delete Product">
                                <input type="hidden" name="product_id"
                                       value="<?php echo htmlspecialchars($product['productID']); ?>">
                                <input class="button" type="submit" value="Delete Product" style="margin: 2px;">
                            </form>
                            <form action="." method="post">
                                <input type="hidden" name="action" value="Show Edit Product Form">  
                                <input type="hidden" name="productName" value="<?php echo $product['productName']; ?>">
                                <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                                <input type="hidden" name="description" value="<?php echo $product['description']; ?>">
                                <input type="hidden" name="imageURL" value="<?php echo $product['imageURL']; ?>">
                                <input type="hidden" name="sku" value="<?php echo $product['sku']; ?>">
                                <input class="button" type="submit" value="Edit Product" style="margin: 2px;">
                            </form>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>
        </table>
        <div id="add_product_btn">
            <form action="." method="post" >
                <input type="hidden" name="action" value="Inventory Manager" >
                <input class="button" type="submit" value="Back" >
            </form>
            <form action="." method="post" >
                <input type="hidden" name="action" value="Show Add Product Form" >
                <input class="button" type="submit" value="Add Product">
            </form>
        </div>  

    <div id="search_product_function">
    <h2>Search for Product</h2>
    <form action="." method="post">
    <input type="hidden" name="action" value="search_SKU">
    <input type="number" name="sku" placeholder="Enter SKU">
    <input class="button" type="submit" value="Search" >
    </form>  
    </div>

    </section>
</main>

<?php include './view/footer.php'; ?>
