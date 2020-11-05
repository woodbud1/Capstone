<?php
require_once('../model/database_oo.php');
require_once('../model/validation.php');
require_once('../model/Product_db.php');
require_once('../model/Product.php');
require_once('../model/Order_db.php');
require_once('../model/Order.php');

//session_start();
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
        include("storefront.php");
    break;
    case "add":
        if(!empty($_POST["count"])) {
            $productBySKU = Product_db::get_bySKU($_GET["sku"]);
            $itemArray = array($productBySKU[0]["sku"]=>array('productName'=>$productBySKU[0]["productName"], 'sku'=>$productBySKU[0]["sku"], 'count'=>$_POST["count"], 'price'=>$productBySKU[0]["price"], 'imageURL'=>$productBySKU[0]["imageURL"]));
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productBySKU[0]["sku"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productBySKU[0]["sku"] == $k) {
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
        include("storefront.php");
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
        include("storefront.php");
        break;
        case "empty":
            unset($_SESSION["cart_item"]);
            include("storefront.php");
        break;	
        case "pay":
            if(!isset($name)) { $name=''; }
            if(!isset($email)) { $email=''; }
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
              $isValid = true;
              $address; 
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
        // Can't figure out what's going wrong here. isValid a lot cleaner.
        // if($isValid === true) {
        //     $errorCardNum = "Returned a false";
        //     include('confirmation.php'); 
        // } else { 
        //     include('payment.php');
        // }
        if($errorName !== '' || $errorEmail !== '' || $errorStreet !== '' || $errorCity !== '' || $errorState !== '' || $errorPostal !== '' || $errorCardNum !== '' || $errorCardExp !== '' || $errorCardSec !== ''){
            include('payment.php');
        } else {
            include('confirmation.php');
        }
            break;
        break;
        case 'change_address':
            // TO DO: Allow users to change address
        break;

        default:
            $error = "A single frickin' potato chip!";
            include("../errors/error.php");
    break;
}