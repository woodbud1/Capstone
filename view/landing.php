<?php include 'header.php'; ?> 
        <div id="form-wrapper" style="max-width:500px;margin:auto;">
            <div class="row"><center>
                <div class="large-12 columns">
                    <center><h1>Welcome <?php { echo $user->getname(); }?>!</h1></center>
                </div><br><br>
        <form action="." method="post" id="landing">
            <input type="submit" name="action" class="button" value="Edit Profile" >
            <input type="submit" name="action" class="button" value="About" >
            <input type="submit" name="action" class="button" value="Contact" >
            <?php if (($_SESSION['type']) > 0) 
            { ?><input type="submit" name="action" class="button" value="Store Manager" >
            <input type="submit" name="action" class="button" value="Inventory Manager" >
            <input type="submit" name="action" class="button" value="User Manager" ><?php } ?>
            <input type="submit" name="action" class="button" value="Order Manager" >
            <input class="button" type="submit" name="action" value="Logout" >
        </form>
        <br>
        <?php $username = $_SESSION['username'];
            $image = User_db::get_image($username);
            if($image != null && $image != 'initial'){
               $filepath = './images/' . $username . '/' . $image; 
               echo "<img src=$filepath>";
            }
            // elseif($image === 'initial') {
            //     echo "<img src='./images/image.jpg'>";
            // }
            else{
                echo "<img src='./images/image.jpg'>";
            } 
        ?>
        </div></div><br><br>
<?php include 'footer.php'; ?>