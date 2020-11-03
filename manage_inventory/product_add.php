<?php include './view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="Add Product" />

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category->getID(); ?>">
                <?php echo $category->getName(); ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Name:</label>
        <input type="text" name="productName">
        
<!--        $product = new Product($results['productID'],
                             $results['categoryID'],
                             $results['productName'],
                             $results['price'],
                             $results['sku'],
                             $results['imageURL'],
                             $results['description'],
                             $results['count']);-->

        <label>List Price:</label>
        <input type="text" name="price">
        
        <label>SKU:</label>
        <input type="text" name="sku">
        
        <label>Description:</label>
        <input type="text" name="description">
        
        <label>Count:</label>
        <input type="text" name="count">
        
        <label>&nbsp;</label>
        <input type="submit" value="Add Product">
        <br>
    </form>
    <form action="index.php" method="post" id="Inventory Manager">
            <input type="hidden" name="action" value="Inventory Manager" >
            <input class="button" type="submit" value="Back To Products" >
        </form> 
</main>
<?php include './view/footer.php'; ?>