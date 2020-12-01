<?php include './view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <div id="form-wrapper" style="max-width:500px;margin:auto;">
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
 
        <label>List Price:</label>
        <input type="text" name="price">
        
        <label>SKU:</label>
        <input type="text" name="sku">
        
        <label>Image:</label>
        <input type="text" name="imageURL">
        
        <label>Description:</label>
        <input type="text" name="description">
        
        <label>Count:</label>
        <input type="text" name="count">
        
        <label>&nbsp;</label>
        <div id="add_product_btn">
        <input class="button" type="submit" value="Add Product">
        <br>
        </div>
    </form>
    </div>    
    <form action="index.php" method="post" id="Inventory Manager">
            <input type="hidden" name="action" value="All Products" >
            <input class="button" type="submit" value="Back To Products" >
        </form> 
</main>
<?php include './view/footer.php'; ?>