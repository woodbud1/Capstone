<?php
require_once('./model/database_oo.php');
require_once('./model/User_db.php');
require_once('./model/User.php');
require_once('./model/Validation.php');
require_once('./model/category_db.php');
require_once('./model/category.php');
require_once('./model/product_db.php');
require_once('./model/product.php');
require_once('./order_manager/orders_db.php');
require_once('./order_manager/order.php');


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
        if(!isset($username)) { $username=''; }
        if(!isset($email)) { $email=''; }
        if(!isset($password)) { $password=''; }
        if(!isset($errorUsername)) { $errorUsername=''; }
        if(!isset($errorEmail)) { $errorEmail=''; }
        

        // Display the login form
        include'./view/login.php';
        break;
    
    case 'Edit Profile':
        // instanciate fields

        if (!isset($errorpassword)) {
            $errorpassword = '';
        }

        if (!isset($password)) {
            $password = '';
        }

        if (!isset($errorEmail)) {
            $errorEmail = '';
        }
        
        $username = $_SESSION['username'];
        $email = User_db::get_email($username);
        // Display the registration form
        include'./view/EditUserInfo.php';
        break;    
        
    case 'Edit':
        // instanciate fields
        $username = filter_input(INPUT_POST, 'username');
        //var_dump($username);
        
        if(!isset($errorEmail)) { $errorEmail=''; }
         if(!isset($errorName)) { $errorName=''; }
         
        // Display the registration form
        include'./view/profile.php';
        break;
    case 'Register a New User':
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

        ii. at least 1 flowercase character (a-z)

        iii. at least 1 digit (0-9) 

        iv. at least 1 special character (punctuation)  ";
    }
    if($errorName !== '' || $errorUsername !== '' || $errorEmail !== '' || $errorPassword !== '' || $errorPasswordConfirm !== ''){
        include('view/registration.php');
        break;
    }else {
        $type = 0;
        $image = '';
        User_db::add_user($username, $password, $name, $email, $image, $type);
        mkdir("./images/".$username, 0777, true);
        $users = User_db::select_all();
        include('view/UserManager.php'); 
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
                    $userId = User_db::get_byUserName($username);
                    $_SESSION['userID'] = $userId;
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
          $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
          $password = filter_input(INPUT_POST, "password");
  
          $error = '';
          $errorEmail = '';
          $errorPassword = '';

        // Validate the inputs
    
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
    
    if($errorEmail !== '' || $errorPassword !== '') {
        include('view/EditUserInfo.php'); 
        break;
    }else {
        $username = $_SESSION['username'];
        User_db::update_user($username,$email, $password);
        $user = User_db::get_user($username);
        include('view/landing.php'); 
        break;
    }
    
       case 'SaveUser':
          $username = filter_input(INPUT_POST, "username");
          $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
          $password = filter_input(INPUT_POST, "password");
          $name = filter_input(INPUT_POST, "name");
          
//        var_dump($username);
//         var_dump($email);
//         var_dump($name);
//         var_dump($password);
         
          $errorName = '';
          $error = '';
          $errorEmail = '';
          $errorPassword = '';

        // Validate the inputs
    
    if($email === FALSE){
        $errorEmail = "Please enter a valid email. ";
    }
    
    if($name === ''){
        $errorName .= "Please enter a valid name. ";
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
    
    if($errorEmail !== '' || $errorPassword !== '' || $errorName !== '') {
        include('view/profile.php'); 
        break;
    }else {
        User_db::update_user($username,$email, $password);
        $users = User_db::select_all();
        include('view/UserManager.php');
        break;
    }
    
    case 'Landing':
    $username = $_SESSION['username'];
    $user = User_db::get_user($username);
    include('view/landing.php');
    break;

    case 'Back':
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
        
    include('manage_inventory/inventory_landing.php');
    die;
    break;

    case 'All Products':
    $products = Product_db::select_all();    
        
    include('manage_inventory/all_products.php');
    die;
    break;

    case 'All Categories':
    $categories = Category_db::getCategories();    
        
    include('manage_inventory/all_categories.php');
    die;
    break;

    case 'Add New Category':
    if(!isset($categoryName)) { $categoryName=''; }
    include('manage_inventory/category_add.php');
    die;
    break;
    
    case 'Add Category':
    
    $categoryName = filter_input(INPUT_POST, 'categoryName');

    Category_db::add_category($categoryName);
    
    $categories = Category_db::getCategories();    
        
    include('manage_inventory/all_categories.php');
    die;
    break;    

    case 'Delete Category':
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);

    Category_db::deleteCategory($category_id);    
    
    $categories = Category_db::getCategories();  
    include('manage_inventory/all_categories.php');
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
    $category_id = Category_db::getCategory($category_id);
    $product = new Product($category_id, $productName, $price, $sku, $imageURL, $description, $count);
    Product_db::add_product($product);
    
    
    include('manage_inventory/product_add.php');
    die;
    break;    
    
    case 'Delete Product':
    
    $product_id = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);

    // Delete the product
    Product_db::deleteProduct($product_id);    
    
    $products = Product_db::select_all(); 
    include('manage_inventory/all_products.php');
    die;
    break;    
    
    case 'View Product':
        $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
        // Storing the product ID as a session makes it a bit easier to work with when editing.
        $_SESSION['productID'] = $product_id;  
        $product = Product_db::get_product($_SESSION['productID']);
    include('manage_inventory/product_view.php');
    die;
    break;
    case 'search_SKU':
        $entry = filter_input(INPUT_POST, 'sku', FILTER_VALIDATE_INT);
        $product = Product_db::get_bySKU($entry);
        if($product === NULL){
            $products = Product_db::select_all();    
            include('manage_inventory/all_products.php');
        } else{
            include('manage_inventory/product_view.php');
        }
        
    die;
    break;
    case 'Show Edit Product Form':
        $productName = filter_input(INPUT_POST, 'productName');
        $price = filter_input(INPUT_POST, 'price');
        $sku = filter_input(INPUT_POST, 'sku');
        $imageURL = filter_input(INPUT_POST, 'imageURL');
        $description = filter_input(INPUT_POST, 'description');
        
    include('manage_inventory/edit_product.php');
    die;    
    break;    
        
    case 'Edit Product':
        $productName = filter_input(INPUT_POST, 'productName');
        $price = filter_input(INPUT_POST, 'price');
        $sku = filter_input(INPUT_POST, 'sku');
        $imageURL = filter_input(INPUT_POST, 'imageURL');
        $description = filter_input(INPUT_POST, 'description');

        Product_db::update_product($productName, $price, $sku, $imageURL, $description); 
        $products = Product_db::select_all(); 
    include('manage_inventory/all_products.php');    
    die;
    break;

    case 'Show Edit Category Form' :
        $categoryName = filter_input(INPUT_POST, 'categoryName');
        
    include('manage_inventory/edit_category.php');    
    die;
    break;    

    case 'Edit Category':
        $categoryName = filter_input(INPUT_POST, 'categoryName');
        
        Category_db::updateCategory($categoryName);
        $categories = Category_db::getCategories(); 
    include('manage_inventory/all_categories.php');    
    die;
    break;

    case 'Update Count':
        $product_id = $_SESSION['productID'];
        $count = filter_input(INPUT_POST, 'new_count', FILTER_VALIDATE_INT);
        Product_db::update_productCount($count, $product_id);
        $product = Product_db::get_product($_SESSION['productID']);
        include('manage_inventory/product_view.php');    
        die;
        break;
    

    case 'Back To Users':

    $users = User_db::select_all();
    include('view/UserManager.php');
    break;
    
    case 'User Manager':

        $users = User_db::select_all();
        include('view/UserManager.php');
        break;

     case 'Store Manager':
         $product_array = Product_db::select_all();
         include('store_manager/storefront.php');
     break;

     case 'Order Manager':
         $orders = Order_db::select_all();
         include('order_manager/all_orders.php');
         die;
     break;

     case "add": 
        $product_array = Product_db::select_all();
        if(!empty($_POST["count"])) {
            $cartID = rand(1,100000);
            $PID = filter_input(INPUT_POST, 'productID', FILTER_VALIDATE_INT);
            $productByID = Product_db::get_byID($PID);
            $itemArray = array($productByID[0]=>array('productID'=>$productByID["productID"], 'productName'=>$productByID["productName"], 'sku'=>$productByID["sku"], 'count'=>$_POST["count"], 'price'=>$productByID["price"], 'imageURL'=>$productByID["imageURL"], 'cartID'=>$cartID));
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByID[0]["productID"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByID[0]["productID"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["count"])) {
                                    $_SESSION["cart_item"][$k]["count"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["count"] += $_POST["count"];
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
        include("store_manager/storefront.php");
        break;
        case "remove":
            $PID = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                        if($PID === $k)
                            unset($_SESSION["cart_item"][$k]);				
                        if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                }
            }
            $product_array = Product_db::select_all(); 
        include("store_manager/storefront.php");
        break;
        case "update_count":
            $newCount = filter_input(INPUT_POST, 'newCount', FILTER_VALIDATE_INT);
            $CID = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
            // var_dump($newCount, $CID);
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                        if($CID === $k)
                            $_SESSION["cart_item"][$k]['count'] = $newCount;				
                }
            }
            $product_array = Product_db::select_all(); 
        include("store_manager/storefront.php");
        break;
        case "empty":
            if(isset($_SESSION["cart_item"])){
                unset($_SESSION["cart_item"]);
            }
            $product_array = Product_db::select_all();
            include("store_manager/storefront.php");
        break;	
        case "pay":
            // $cart = $_SESSION["cart_item"];
            // foreach($_SESSION["cart_item"] as $k => $v) {
            //        echo $_SESSION["cart_item"][$k]['count'] . ' ';	
            //     }
            //     foreach($_SESSION["cart_item"] as $k => $v) {
            //         echo $_SESSION["cart_item"][$k]['productID'] . " ";
            //      }
            if(!isset($name)) { $name=''; }
            if(!isset($email)) { $email=''; }
            $_SESSION['paymentAmount'] = $_POST["total_price"];
            $final_price = $_SESSION['paymentAmount'];
            include("store_manager/payment.php");
        break;	
        case 'payment':
              $name = filter_input(INPUT_POST, "name");
              $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
              $street = filter_input(INPUT_POST, "street");
              $city = filter_input(INPUT_POST, "city");
              $state = filter_input(INPUT_POST, "state");
              $postal = filter_input(INPUT_POST, "postal");
              $creditcard_num = filter_input(INPUT_POST, "ccNum");
              $creditcard_exp = filter_input(INPUT_POST, "ccExp");
              $creditcard_sec = filter_input(INPUT_POST, "ccSec");
              $isValid = true;
              $address; 
              $paid = 0;
              $payment_type = $_POST["payment_type"];


              $error = '';
              $errorName ='';
              $errorUsername = '';
              $errorEmail = '';
              $errorStreet = '';
              $errorCity = '';
              $errorState = '';
              $errorPostal = '';
              $errorCardNum = '';
              $errorCardExp = '';
              $errorCardSec = '';
              
            // Validate the inputs
        if($name === '') {
            $errorName .= "Please enter you full name. ";
            $isValid = false;
        }else if(Validation::validName($name) === 0){
            $errorName .= "Name must begin with a letter. ";
            $name = "";
            $isValid = false;
        }
        
        if($email === FALSE){
            $errorEmail = "Please enter a valid email. ";
            $isValid = false;
        }
        
        if($street === '') {
            $errorStreet .= "Please enter your street address. ";
            $isValid = false;
        }else if(Validation::validName($street) === 0){
            $errorStreet .= "Street Error. ";
            $errorStreet = "";
            $isValid = false;
        }
        
        if($city === '') {
            $errorCity .= "Please enter your city of residence. ";
            $isValid = false;
        }else if(Validation::validName($city) === 0){
            $errorCity .= "City Error. ";
            $city = "";
            $isValid = false;
        }
        
        if($state === '') {
            $errorState .= "Please enter your state of residence. ";
            $isValid = false;
        }else if(Validation::validName($state) === 0){
            $errorState .= "state error. ";
            $state = "";
            $isValid = false;
        }
        
        if($postal === '') {
            $errorPostal .= "Please enter your postal (Zip) code. ";
            $isValid = false;
        }

        if($payment_type === 'card'){
            if($creditcard_num === '') {
                $errorCardNum .= "Invalid number. ";
                $isValid = false;
            }
    
            if($creditcard_exp === '') {
                $errorCardExp .= "Invalid date. ";
                $isValid = false;
            }
    
            if($creditcard_sec === '') {
                $errorCardSec .= "Invalid number. ";
                $isValid = false;
            }
            $paid = 1;
        } else {
            $creditcard_num = -1;
        }

        // Lazy, production build uncomment these. During testing leave it.
        // if (preg_match('/^((0[1-9])|(1[0-2]))\/((2009)|(20[1-9][0-9]))$/', $creditcard_exp)) {
        // } else {
        //     $errorCardExp .= "Invalid date. ";
        //     $isValid = false;
        // }

        // if (preg_match('/^[0-9]{3,4}$/', $creditcard_sec)) {
        // } else {
        //     $errorCardSec .= "Invalid number. ";
        //     $isValid = false;
        // }

        // if (preg_match('/^[0-9]{13,16}$/', $creditcard_num)) {
        // } else {
        //     $errorCardNum .= "Invalid number. ";
        //     $isValid = false;
        // }

        $address = $street." ".$city.", ".$state." ".$postal;
        // if($isValid === true) {
        //     $errorCardNum = "Returned a false";
        //     include('store_manager/confirmation.php'); 
        // } else { 
        //     include('store_manager/payment.php');
        // }
        if($errorName !== '' || $errorEmail !== '' || $errorStreet !== '' || $errorCity !== '' || $errorState !== '' || $errorPostal !== '' || $errorCardNum !== '' || $errorCardExp !== '' || $errorCardSec !== ''){
            include('store_manager/payment.php');
        } else {
            // $buyerID = 007;
            $cartUpdate = $_SESSION["cart_item"];
            foreach($_SESSION["cart_item"] as $k => $v) {
                $cartItemID = $_SESSION["cart_item"][$k]['productID'];
                $cartItemCount = $_SESSION["cart_item"][$k]['count'];
                $existingCount = Product_db::getCountByID($cartItemID);
                $newCount = (int)$existingCount[0] - (int)$cartItemCount;
                Product_db::update_productCount($newCount, $cartItemID);			
                }
            $final_price = $_SESSION['paymentAmount'];
            $buyerID = $_SESSION['userID'];
            $delivered = 0;
            $invoice = new Invoice($buyerID, $final_price, $payment_type, $creditcard_num, $name, $address, $paid, $delivered);
            Invoice_db::add_invoice($invoice);
            include('store_manager/confirmation.php');
        }
            break;
        break;
        case 'change_address':
            // TO DO: Allow users to change address
            $address = filter_input(INPUT_POST, "address");
            Invoice_db::update_address($address);
            include('store_manager/storefront.php');
        break;
        case 'All Invoices':
            // Fetch all invoices and display (ADMIN only function)
            $invoices = Invoice_db::get_invoicesAll();
            include('store_manager/all_invoices.php');
        break;
        case 'get_ID_invoices':
            // Fetch all invoices done by a user.
            $buyerID = $_SESSION['userID'];
            $invoices = Invoice_db::get_invoicesByBuyerID($buyerID);
            if(!empty($invoices)) {
                var_dump($invoices);
                include('store_manager/user_invoices.php');
            } else {
                $error = "No invoices with that User ID found!";
                include("errors/error.php");
            }
        break;
        case 'delete_invoice':
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        Invoice_db::deleteInvoice_ByID($id);
        $invoices = Invoice_db::get_invoicesAll();
        include('store_manager/all_invoices.php');
        break;
        case 'update_paid':
        // Admin can update payments
        if(isset($_POST['isPaid']) && 
        $_POST['isPaid'] === 'yes') 
        {
        $paid = 1;
        }
        else
        {
        $paid = 0;
        }	 
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        Invoice_db::update_paid($paid, $id);
        $invoices = Invoice_db::get_invoicesAll();
        include('store_manager/all_invoices.php');
        break;
        case 'update_delivered':
        // Admin can update delivered
        if(isset($_POST['isDelivered']) && 
        $_POST['isDelivered'] === 'yes') 
        {
        $delivered = 1;
        }
        else
        {
        $delivered = 0;
        }	 
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        Invoice_db::update_delivered($delivered, $id);
        $invoices = Invoice_db::get_invoicesAll();
        include('store_manager/all_invoices.php');
        break;
        case 'search_invoices':
            $IID = filter_input(INPUT_POST, 'invoice_id', FILTER_VALIDATE_INT);
            $invoice = Invoice_db::get_invoicesByinvoiceID($IID);
            if($invoice === NULL){
                $invoices = Invoice_db::get_invoicesAll();    
                include('store_manager/all_invoices.php');
            } else{
                include('store_manager/invoice_view.php');
            }         
        break;
        case 'update_payment':
            // Fetch a form to add a credit card to the order to pay
            include('store_manager/update_payment.php');
        break;
        case 'update_payment_form':
            // Make a payment with credit card.
            include('store_manager/update_payment.php');
        break;
        default:
            $error = "A single frickin' potato chip!";
            include("errors/error.php");
        break;

}
