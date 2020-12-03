<?php include './view/header.php'; ?>

<main>
    <!-- display a list of categories -->
    <h2>Categories</h2>
    <table>
<!--            <tr>
                <th>Name</th>
                <th></th>
            </tr>-->
        <?php foreach ($categories as $category) : ?>
            <tr>

                <td><?php echo $category->getName(); ?></td>
                <td>
                    <div class="btn-group">
                        <form action="." method="post"
                              id="delete_product_form">
                            <input type="hidden" name="action"
                                   value="Delete Category">
                            <input type="hidden" name="category_id"
                                   value="<?php echo $category->getID(); ?>">
                            <input class="button" type="submit" value="Delete Category" style="margin: 2px;">
                        </form>

                    </div>
                </td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="Show Edit Category Form">  
                        <input type="hidden" name="categoryName" value="<?php echo $category->getName(); ?>">
                        <input class="button" type="submit" value="Edit Category" style="margin: 2px;">
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
    <div>
        <form action="." method="post" >
            <input type="hidden" name="action" value="Inventory Manager" >
            <input class="button" type="submit" value="Back" >
            <input type="submit" name="action" class="button" value="Add New Category" >
        </form>
    </div>
</main>

<?php include './view/footer.php'; ?>