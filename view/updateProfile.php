<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $temp = $_FILES['image']['name'];
      $temp = explode('.', $temp);
      $temp = end($temp);
      $file_ext = strtolower($temp);
      
      var_dump($_FILES);
      
      $extensions= array("jpeg","jpg","png", "gif");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="file extension not in whitelist: " . join(',',$extensions);
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"existingDir/".$file_name);
         echo "Success";
      }else{
          var_dump($errors);
      }
   }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'header.php'; ?>
        <title></title>
    </head>
    <body>
        <h1>User Profile</h1>
        <form action="index.php" method="post" id="Update Profile">
        <input type="hidden" name="action" value="add" />
        
            <label>First Name: </label>
            <input type="text" name="fname" value='<?php echo $fname; ?>'><span> <?php if(isset($errorFName)) { echo $errorFName; }?> </span><br>
            
            <label>Last Name: </label>
            <input type="text" name="lname" value='<?php echo $lname; ?>'><span> <?php if(isset($errorLName)) { echo $errorLName; }?> </span><br>
            
            <label>Email Address: </label>
            <input type="text" name="email" value='<?php echo $email; ?>'><span> <?php if(isset($errorEmail)) { echo $errorEmail; }?> </span><br>
            
            <label>Password: </label>
            <input type="password" name="password"><br>
            
            <label>Image: </label>
            <input type="hidden" name="action" value="uploadImage"/><br>
            <input type="file" name="image" />
            
        </form>
        <form action="." method="post" >
        <p><input type="submit" name="action" value="update" ></p>
        </form>
    </body>
    <?php include 'footer.php'; ?>
</html>
