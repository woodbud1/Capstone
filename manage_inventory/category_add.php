<?php include './view/header.php'; ?>
<main>
    <h1>Add Category</h1>
    <div id="form-wrapper" style="max-width:500px;margin:auto;">
    <form action="index.php" method="post" id="add_category_form">
        <input type="hidden" name="action" value="Add Category" />

        <label>Category Name:</label>
        <input type="text" name="categoryName">
        
        <label>&nbsp;</label>
        <div id="add_category_btn">
        <input class="button" type="submit" value="Add Category">
        <br>
        </div>

    </div>
    </form>
    </div>    
    <form action="index.php" method="post">
            <input type="hidden" name="action" value="All Categories" >
            <input class="button" type="submit" value="Back To Categories" >
        </form> 
</main>
<?php include './view/footer.php'; ?>