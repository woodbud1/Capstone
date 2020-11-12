<?php include 'header.php'; ?> 
        <div id="form-wrapper" style="max-width:500px;margin:auto;">
            <div class="row"><center>
                <div class="large-12 columns">
                    <center><h1>Welcome <?php { echo $user->getname(); }?>!</h1></center>
                </div><br><br>
        <form action="." method="post" id="landing">
            <input type="submit" name="action" class="button" value="Edit Profile" >
            <?php if (($_SESSION['type']) > 0) 
            { ?><input type="submit" name="action" class="button" value="Store Manager" >
            <input type="submit" name="action" class="button" value="Inventory Manager" >
            <input type="submit" name="action" class="button" value="User Manager" ><?php } ?>
            <input type="submit" name="action" class="button" value="Shop" >
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
        <!-- For the future when there is a Newsletter -->
        <div id='news-block'>
            <h2 class="post-title">
              Newsletter
            </h2>
            <h3 class="post-subtitle">
              Sign up for our monthly newsletter about our company and our vision to provide the best experience for our employees!
            </h3>
        </div>
        <hr>
        <form action="." method="post">
        <h3 class="post-subtitle">
         Sign Up!
        </h3>
        <input type="hidden" name="action" value="news_sub">
        <input type="text" name="newsletter_email">           
        <div class="clearfix">
        <input type="submit" name="submit" value="Submit"> 
        </div>
        </form>
        </div>
        </div>
        </div>
        <br>
        <br>
<?php include 'footer.php'; ?>