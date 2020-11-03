<?php include 'header.php'; ?>
<main>
    <div id="form-wrapper" style="max-width:1000px;margin:auto;"> 
        <div class="row">
            <h1><?php { echo $user->getName(); }?></h1></center>                 
            <?php 
                $image = User_db::get_image($profile);

                if($image != null){
                   $filepath = './images/' . $profile . '/' . $image; 
                   echo "<img src=$filepath>";
                }
                else{
                    echo "<img src='./images/image.jpg'>";
                }
            ?>
        </div>
        <form action="." method="post" >
        <p>
            <input type="hidden" name="action" value="User Manager" >
            <input class="button" type="submit" value="Back" ></p>
        </form>
    </div>
</main>
<?php include 'footer.php'; ?> 
