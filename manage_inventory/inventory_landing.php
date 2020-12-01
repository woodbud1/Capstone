<?php include './view/header.php'; ?>

<main>
    <div class="inventory-landing">
    <table>
        <tr>
            <td class="categories-btn">
                <form action="." method="post" >
                    <input type="hidden" name="action" value="All Categories" >
                    <input class="button" type="submit" value="View Categories" >
                </form>
            </td>
            <td class="products-btn">
                <form action="." method="post" >
                    <input type="hidden" name="action" value="All Products" >
                    <input class="button" type="submit" value="View Products" >
                </form>
            </td>
        </tr>
    </table>
        <form action="." method="post" >
                <input type="hidden" name="action" value="Landing" >
                <input class="button" type="submit" value="Back" >
            </form>
    </div>
</main>    
<?php include './view/footer.php'; ?>