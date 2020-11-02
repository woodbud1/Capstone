<?php
require_once('../model/database_oo.php');
require_once('../model/validation.php');
require_once('../model/Product_db.php');
require_once('../model/Product.php');

session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'shop';
    }
}

switch ($action) {
    // case "initial":
    //     include("storefront.php");
    // break;
    case "shop":
        $product_array = Product_db::select_all();
        include("storefront.php");
    break;
    case "cart":
        include("checkout.php");
    break;
    case "add":

        $itemArray = [];
            
        if(!empty($_POST["quantity"])) {
            // `productID` bigint(20) NOT NULL,
            // `categoryID` int(11) NOT NULL,
            // `productName` varchar(255) NOT NULL,
            // `price` decimal(10,0) NOT NULL,
            // `sku` bigint(20) NOT NULL,
            // `imageURL` varchar(255) NOT NULL,
            // `description` varchar(255) NOT NULL,
            // `count` bigint(20) NOT NULL
            
            
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["code"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
        include("checkout.php");
        break;
    	case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                        if($_GET["code"] == $k)
                            unset($_SESSION["cart_item"][$k]);				
                        if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                }
            }
        include("checkout.php");
        break;
        case "empty":
            unset($_SESSION["cart_item"]);
            include("checkout.php");
        break;	
        case "pay":
            include("payment.php");
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
        }else if(Validation::validName($name) === 0){
            $errorName .= "Name must begin with a letter. ";
            $name = "";
        }
        
        if($email === FALSE){
            $errorEmail = "Please enter a valid email. ";
        }
        
        if($street === '') {
            $errorStreet .= "Please enter your street address. ";
        }else if(Validation::validName($street) === 0){
            $errorStreet .= "Street Error. ";
            $errorStreet = "";
        }
        
            if($city === '') {
            $errorCity .= "Please enter your city of residence. ";
        }else if(Validation::validName($city) === 0){
            $errorCity .= "City Error. ";
            $city = "";
        }
        
            if($state === '') {
            $errorState .= "Please enter your state of residence. ";
        }else if(Validation::validName($state) === 0){
            $errorState .= "state error. ";
            $state = "";
        }
        
        if($postal === '') {
            $errorPostal .= "Please enter your postal (Zip) code. ";
        }

        if($creditcard_num === '') {
            $errorCardNum .= "Invalid number. ";
        }

        if($creditcard_exp === '') {
            $errorCardExp .= "Invalid date. ";
        }

        if($creditcard_sec === '') {
            $errorCardSec .= "Invalid number. ";
        }
        
        if($errorName !== '' || $errorEmail !== '' || $errorStreet !== '' || $errorCity !== '' || $errorState !== '' || $errorPostal !== '' || $errorCardNum !== '' || $errorCardExp !== '' || $errorCardSec !== ''){
            include('payment.php');
            break;
        }else {
           // Order_db::add_order($username, $password, $name, $email, $image, $phonenumber, $street, $city, $state, $type, $notes);
            include('confirmation.php'); 
            break;
        }
        default:
        $error = "A single frickin' potato chip!";
        include("../errors/error.php");
    break;
}