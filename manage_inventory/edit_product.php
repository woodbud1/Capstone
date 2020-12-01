<?php include './view/header.php'; 
?>
<main>
    <div class="row">
        <div class="large-12 columns">
            <center><h1>Edit Product</h1></center>
        </div>
    </div>   
    <div id="form-wrapper" style="max-width:500px;margin:auto;">
        <form action="index.php" method="post" id="editproductinfo">
            <input type="hidden" name="action" value="Edit Product" />

            <p>Please update the information as needed.</p>
            
            <label>Product Name: </label>
            <input type="text" name="productName" value="<?php echo htmlspecialchars($productName); ?>">
            
            <label>Price: </label>
            <input type="text" name="price" value="<?php echo htmlspecialchars($price); ?>">
            
            <label>SKU: </label>
            <input type="text" name="sku" value="<?php echo htmlspecialchars($sku); ?>">
            
            <label>Image URL: </label>
            <input type="url" name="imageURL" value="<?php echo htmlspecialchars($imageURL); ?>">
            
            <label>Description: </label>
            <input type="text" name="description" value="<?php echo htmlspecialchars($description); ?>">

            <label>&nbsp;</label>
            <input class="button" type="submit" value="Save"><br>
        </form>
        <form action="index.php" method="post" id="Inventory Manager">
            <input type="hidden" name="action" value="All Products" >
            <input class="button" type="submit" value="Back To Products" >
        </form>
    </div>
</main>
<?php include './view/footer.php'; ?>