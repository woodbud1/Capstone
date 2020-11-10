<?php
require_once('./model/database_oo.php');
require_once('./model/User_db.php');
require_once('./model/User.php');
require_once('./model/Validation.php');
require_once('./model/category_db.php');
require_once('./model/category.php');
require_once('./model/product_db.php');
require_once('./model/product.php');

session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'Login';
    }
}

switch ($action) {
    case 'Login':
        // instanciate fields
        if(!isset($fname)) { $fname=''; }
        if(!isset($lname)) { $lname=''; }
        if(!isset($username)) { $username=''; }
        if(!isset($email)) { $email=''; }
        if(!isset($password)) { $password=''; }
        if(!isset($errorFName)) { $errorFName=''; }
        if(!isset($errorLName)) { $errorLName=''; }
        if(!isset($errorUsername)) { $errorUsername=''; }
        if(!isset($errorEmail)) { $errorEmail=''; }
        

        // Display the login form
        include'./view/login.php';
        break;
    
        case 'Edit Profile':
        // instanciate fields
        if (!isset($name)) {
            $name = '';
        }
        if (!isset($username)) {
            $username = '';
        }
        if (!isset($email)) {
            $email = '';
        }
        if (!isset($password)) {
            $password = '';
        }
        if (!isset($errorName)) {
            $errorName = '';
        }
        if (!isset($errorLName)) {
            $errorLName = '';
        }
        if (!isset($errorUsername)) {
            $errorUsername = '';
        }
        if (!isset($errorEmail)) {
            $errorEmail = '';
        }
        
        // Display the registration form
        include'./view/EditUserInfo.php';
        break;    
        
    case 'Edit':
        // instanciate fields

        if(!isset($errorName)) { $errorName=''; }
        if(!isset($errorUsername)) { $errorUsername=''; }
        if(!isset($errorEmail)) { $errorEmail=''; }
        
        // Display the registration form
        include'./view/EditUserInfo.php';
        break;
    case 'Registration':
        // instanciate fields
        if(!isset($name)) { $name=''; }
        if(!isset($username)) { $username=''; }
        if(!isset($email)) { $email=''; }
        if(!isset($password)) { $password=''; }
        if(!isset($city)) { $city=''; }
        if(!isset($street)) { $street=''; }
        if(!isset($state)) { $state=''; }
        if(!isset($postal)) { $postal=''; }
        if(!isset($errorFName)) { $errorFName=''; }
        if(!isset($errorUsername)) { $errorUsername=''; }
        if(!isset($errorEmail)) { $errorEmail=''; }
        if(!isset($errorStreet)) { $errorStreet=''; }
        if(!isset($errorCity)) { $errorCity=''; }
        if(!isset($errorState)) { $errorState=''; }
        if(!isset($errorPostal)) { $errorPostal=''; }
        if(!isset($errorPasswordConfirm)) { $errorPasswordConfirm=''; }
        

        // Display the registration form
        include'./view/registration.php';
        break;
    case 'Add':
          $name = filter_input(INPUT_POST, "name");
          $username = filter_input(INPUT_POST, "username");
          $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
          $password = filter_input(INPUT_POST, "password");
          $confirm_password = filter_input(INPUT_POST, "confirm_password");
          $error = '';
          $errorName ='';
          $errorUsername = '';
          $errorEmail = '';
          $errorPassword = '';
          $errorPasswordConfirm = '';

        // Validate the inputs
    if($name === '') {
        $errorName .= "Please enter you full name. ";
    }else if(Validation::validName($name) === 0){
        $errorName .= "Name must begin with a letter. ";
        $name = "";
    }
      
    if($username === ''){
        $errorUsername = "Please enter a Username. ";
    }else if(User_db::user_exists($username) === true){
        $errorUsername = "User name is already taken. ";
        $username = "";
    }else if(Validation::validName($username) === 0){
        $errorUsername .= "Username must begin with a letter. ";
        $username = "";
    }else if(Validation::isValidUsername($username)=== false){
        $errorUsername .= "Username must be 4 to 30 characters long. ";
        $username = "";
    }
    
    if($email === FALSE){
        $errorEmail = "Please enter a valid email. ";
    }else if(User_db::email_exists($email) === true){
        $errorEmail = "Email address is already taken. ";
        $email = "";
    }
    
    if($confirm_password !== $password){
        $errorPasswordConfirm = "Passwords must match!";
    }

    if($password === ''){
        $errorPassword .= "Please enter a password. ";
    }else if(Validation::validPasswordLength($password) === false){
        $errorPassword = "Password must be between 12 and 100 characters";
    }
    else if(Validation::isValidPassword($password) === false){
        $errorPassword = "Password must meet at least 3 out of the following 4 complexity rules: 

        i. at least 1 uppercase character (A-Z) 

        ii. at least 1 lowercase character (a-z)

        iii. at least 1 digit (0-9) 

        iv. at least 1 special character (punctuation)  ";
    }
    if($errorName !== '' || $errorUsername !== '' || $errorEmail !== '' || $errorPassword !== '' || $errorPasswordConfirm !== ''){
        include('view/registration.php');
        break;
    }else {
        $type = 0;
        $_SESSION['username'] = $username;
        $image = '';
        User_db::add_user($username, $password, $name, $email, $image, $type);
        mkdir("./images/".$username, 0777, true);
        $user = User_db::get_user($username);
        include('view/landing.php'); 
        break;
    }
    case 'Verify Login':
        $username = filter_input(INPUT_POST, "username");
        $password = filter_input(INPUT_POST, "password");

        if (!isset($errorLogin)) {
            $errorLogin = '';
        }
        if (!isset($errorUsername)) {
            $errorUsername = '';
        }
        if (!isset($errorPassword)) {
            $errorPassword = '';
        }

        if ($username === '') {
            $errorUsername = "Please enter a Username. ";
        }
        if ($password === '') {
            $errorPassword = "Please enter a Password. ";
        }

        if ($errorUsername !== '' || $errorPassword !== '') {
            $errorLogin = 'Invalid User Code or Password';
            include('view/login.php');
        } else {
            if (User_db::user_exists($username)) {
                $checkUser = User_db::verify_user($username, $password);
                if ($checkUser === true) {
                    $user = User_db::get_user($username);
                    $type = User_db::get_type($username);
                    $_SESSION['username'] = $username;
                    $_SESSION['type'] = $type;
                    include('view/landing.php');
                } else {
                    $errorLogin = 'Invalid User Code or Password';
                    include('view/login.php');
                }
            } else {
                $errorLogin = 'Invalid User Code or Password';
                include('view/login.php');
            }
        }
          break;
    case 'Save':
          $username = $_SESSION['username'];
          $name = filter_input(INPUT_POST, "name");
          $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
          $password = filter_input(INPUT_POST, "password");
  
          $error = '';
          $errorName ='';
          $errorEmail = '';
          $errorPassword = '';

        // Validate the inputs
    if($name === '') {
        $errorName .= "Please enter your name. ";
    }else if(Validation::validName($name) === 0){
        $errorName .= "Name must begin with a letter. ";
        $name = "";
    }
    
    if($email === FALSE){
        $errorEmail = "Please enter a valid email. ";
    }
    
    if($password === ''){
        $errorPassword .= "Please enter a password. ";
    }else if(Validation::validPasswordLength($password) === false){
        $errorPassword = "Password must be between 12 and 100 characters";
    }
    else if(Validation::isValidPassword($password) === false){
        $errorPassword = "Password must meet at least 3 out of the following 4 complexity rules: 

        i. at least 1 uppercase character (A-Z) 

        ii. at least 1 lowercase character (a-z)

        iii. at least 1 digit (0-9) 

        iv. at least 1 special character (punctuation)  ";
    }
    
    if($errorName !== '' || $errorEmail !== '' || $errorPassword !== '') {
        include('view/EditUserInfo.php'); 
        break;
    }else {
        $username = $_SESSION['username'];
        User_db::update_user($username,$name, $email, $password);
        $user = User_db::get_user($username);
        include('view/landing.php'); 
        break;
    }
    case 'Landing':
    $username = $_SESSION['username'];
    $user = User_db::get_user($username);
    include('view/landing.php');
    break;

    case 'Image Upload':
        include('view/ImageUpload.php'); 
        break;
    case 'uploadImage':
      if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $temp = $_FILES['image']['name'];
      $temp2 = explode('.', $temp);
      $temp3 = end($temp2);
      $file_ext = strtolower($temp3);
      
//      var_dump($_FILES);
      
      $extensions= array("jpeg","jpg","png", "gif");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="file extension not in whitelist: " . join(',',$extensions);
      }
      if(empty($errors)==true){
         $username = $_SESSION['username']; 
         move_uploaded_file($file_tmp,"images/".$username."/".$file_name);
         User_db::change_image($username, $file_name);
         $user = User_db::get_user($username);
        include('view/Landing.php'); 
        break;
      }
   }
    case 'Logout':
     unset($_SESSION);
     session_destroy();
     session_write_close();
     include('view/logout.php');
     die;
     break;

    
    case 'Inventory Manager':
//    $category_id = filter_input(INPUT_GET, 'category_id', 
//            FILTER_VALIDATE_INT);
//    if ($category_id == NULL || $category_id == FALSE) {
//        $category_id = 1;
//    }
//
//    // Get product and category data
//    $current_category = Category_db::getCategory($category_id);
//    $categories = Category_db::getCategories();
//    $products = Product_db::getProductsByCategory($category_id);

    // Display the product list
    $products = Product_db::select_all();    
        
    include('manage_inventory/all_products.php');
    die;
    break;

    case 'Show Add Product Form':
    $categories = Category_db::getCategories();
    if(!isset($category_id)) { $category_id=''; }
    if(!isset($productName)) { $productName=''; }    
    if(!isset($price)) { $price=''; }
    if(!isset($sku)) { $sku=''; }    
    if(!isset($imageURL)) { $imageURL=''; }
    if(!isset($description)) { $description=''; }    
    if(!isset($count)) { $count=''; }
    
    include('manage_inventory/product_add.php');
    die;
    break;
    
    case 'Add Product':
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $productName = filter_input(INPUT_POST, 'productName');
    $price = filter_input(INPUT_POST, 'price');
    $sku = filter_input(INPUT_POST, 'sku');
    $imageURL = filter_input(INPUT_POST, 'imageURL');
    $description = filter_input(INPUT_POST, 'description');
    $count = filter_input(INPUT_POST, 'count');
    // IDK, why are fetching everything right now when we just need the ID.
    // $current_category = Category_db::getCategory($category_id);
    // $current_category = (int)$current_category[0];
    $product = new Product($category_id, $productName, $price, $sku, $imageURL, $description, $count);
    Product_db::add_product($product);
    include('manage_inventory/product_add.php');
    die;
    break;    
    
    case 'Delete Product':
        
    die;
    break;    
    
    case 'View Product':
        $productID = filter_input(INPUT_GET, 'productID');   
        $product = Product_db::get_product($productID);
    include('manage_inventory/product_view.php');
    die;
    break;


    case 'User Manager':

        $users = User_db::select_all();
        include('view/UserManager.php');
        break;

    case 'See_Profile':
        $profile = filter_input(INPUT_POST, 'profile');
        $user = User_db::get_user($profile);
        include('view/profile.php');
        break;   

     case 'Store Manager':
         $product_array = Product_db::select_all();
         include('./store_manager/index.php');
     break;
}
//     case 'Shop':
//         $product_array = Product_db::select_all();
//         include('./store_manager/index.php');
//     break;


