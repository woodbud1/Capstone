<?php include './view/header.php'; ?>

<main>
    <h1><?php echo $product->getPrice(); ?></h1>
        <div id="left_column">
            <p>
                <img src="<?php echo $product->getDescription(); ?>">
            </p>
        </div>
        <div id="right_column">
            <p><b>List Price:</b> $<?php echo $product->getSKU(); ?></p>
            <p><b>Description:</b> <?php echo $product->getDescription(); ?></p>
            <p><b>SKU:</b> <?php echo $product->getSKU(); ?></p>
            <form action="<?php echo '../cart' ?>" method="post">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="product_id"
                       value="<?php echo $product->getID(); ?>">
                <b>Quantity:</b>
                <input type="text" name="quantity" value="1" size="2">
                <input type="submit" value="Add to Cart">
            </form>
        </div>
</main>
<?php include './view/footer.php'; ?>
