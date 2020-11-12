<?php include './view/header.php'; ?>

<main>
    <h3><?php echo $product->getProductName(); ?></h3>
        <div id="left_column">
            <p>
                <img src="<?php echo $product->getImageURL(); ?>">
            </p>
        </div>
        <div id="right_column">
            <p><b>List Price:</b> $<?php echo $product->getPrice(); ?></p>
            <p><b>Description:</b> <?php echo $product->getDescription(); ?></p>
            <p><b>SKU:</b> <?php echo $product->getSKU(); ?></p>
            <p><b>Count:</b> <?php echo $product->getCount(); ?></p>
            
        </div>
    <form action="index.php" method="post" id="Inventory Manager">
            <input type="hidden" name="action" value="Inventory Manager" >
            <input class="button" type="submit" value="Back To Products" >
        </form>
</main>
<?php include './view/footer.php'; ?>
