<?php include 'header.php'; ?> 
        <div id="form-wrapper" style="max-width:500px;margin:auto;">
            <div class="row"><center>
                <div class="large-12 columns">
                    <center><h1>Welcome <?php { echo $user->getname(); }?>!</h1></center>
                </div><br><br>
        <form action="." method="post" id="landing">
            <input type="submit" name="action" class="button" value="Edit Profile" >
            <input type="submit" name="action" class="button" value="Image Upload">
            <input type="submit" name="action" class="button" value="Manage Schedule" >
            <input type="submit" name="action" class="button" value="Inventory Manager" >
            <input type="submit" name="action" class="button" value="User Manager" >
            <input type="submit" name="action" class="button" value="Shop" >
            <input type="submit" name="action" class="button" value="Store Manager" >
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
