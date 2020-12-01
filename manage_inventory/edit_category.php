<?php include './view/header.php'; 
?>
<main>
    <div class="row">
        <div class="large-12 columns">
            <center><h1>Edit Category</h1></center>
        </div>
    </div>   
    <div id="form-wrapper" style="max-width:500px;margin:auto;">
        <form action="index.php" method="post" id="editcategoryinfo">
            <input type="hidden" name="action" value="Edit Category" />

            <p>Please update the information as needed.</p>
            
            <label>Category Name: </label>
            <input type="text" name="categoryName" value="<?php echo htmlspecialchars($categoryName); ?>">
            
            <label>&nbsp;</label>
            <input class="button" type="submit" value="Save"><br>
        </form>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="All Categories" >
            <input class="button" type="submit" value="Back To Categories" >
        </form>
    </div>
</main>
<?php include './view/footer.php'; ?>