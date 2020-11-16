<?php include 'header.php'; 
?>
<main>
    <div class="row">
        <div class="large-12 columns">
            <center><h1>Edit Product</h1></center>
        </div>
    </div>   
    <div id="form-wrapper" style="max-width:500px;margin:auto;">
        <form action="index.php" method="post" id="editproductinfo">
            <input type="hidden" name="action" value="Save" />

            <p>Please update the information as needed.</p>
            
            <label>Email Address: </label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><font color="red"><b><?php if (isset($errorEmail)) {
                 echo $errorEmail;} ?></b></font><br>

            <label>Password: </label>
            <input type="password" name="password"><span><font color="red"><b><?php if (isset($errorPassword)) {
                echo $errorPassword; } ?></b></font></span><br>

            <label>&nbsp;</label>
            <input class="button" type="submit" value="Save"><br>
        </form>
        <form action="index.php" method="post" id="edituserinfo">
            <input type="hidden" name="action" value="Landing" >
            <input class="button" type="submit" value="Back" >
            <input type="submit" name="action" class="button" value="Image Upload">
        </form>
    </div>
</main>
<?php include 'footer.php'; ?>