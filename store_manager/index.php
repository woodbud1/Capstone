<?php
require_once('../model/database_oo.php');
require_once('../model/validation.php');
require_once('../model/Product_db.php');
require_once('../model/Product.php');
require_once('../model/Invoice_db.php');
require_once('../model/Invoice.php');
require_once('../model/User_db.php');
require_once('../model/User.php');
session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'landing';
    }
}

switch ($action) {
    case "shop":
        $product_array = Product_db::select_all();
         include("storefront.php");
     break;

    case "Back":
         include("./view/landing.php");
     break; 
 
    case "landing":
         include("landing.php");
     break;
    case "Store Manager":
        $product_array = Product_db::select_all();
        include("Landing.php");
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
        include("storefront.php");
        break;
        case "remove":
            $PID = filter_input(INPUT_POST, 'productID', FILTER_VALIDATE_INT);
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                        if($PID === $k)
                            unset($_SESSION["cart_item"][$k]);				
                        if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                }
            }
            $product_array = Product_db::select_all(); 
        include("storefront.php");
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
        include("storefront.php");
        break;
        case "empty":
            if(isset($_SESSION["cart_item"])){
                unset($_SESSION["cart_item"]);
            }
            $product_array = Product_db::select_all();
            include("storefront.php");
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
        //     include('confirmation.php'); 
        // } else { 
        //     include('payment.php');
        // }
        if($errorName !== '' || $errorEmail !== '' || $errorStreet !== '' || $errorCity !== '' || $errorState !== '' || $errorPostal !== '' || $errorCardNum !== '' || $errorCardExp !== '' || $errorCardSec !== ''){
            include('payment.php');
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
            include('confirmation.php');
        }
            break;
        break;
        case 'change_address':
            // TO DO: Allow users to change address
            $address = filter_input(INPUT_POST, "address");
            Invoice_db::update_address($address);
            include('storefront.php');
        break;
        case 'All Invoices':
            // Fetch all invoices and display (ADMIN only function)
            $invoices = Invoice_db::get_invoicesAll();
            include('all_invoices.php');
        break;
        case 'get_ID_invoices':
            // Fetch all invoices done by a user.
            $buyerID = $_SESSION['userID'];
            $invoices = Invoice_db::get_invoicesByBuyerID($buyerID);
            if(!empty($invoices)) {
                var_dump($invoices);
                include('user_invoices.php');
            } else {
                $error = "No invoices with that User ID found!";
                include("../errors/error.php");
            }
        break;
        case 'delete_invoice':
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        Invoice_db::deleteInvoice_ByID($id);
        $invoices = Invoice_db::get_invoicesAll();
        include('all_invoices.php');
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
        include('all_invoices.php');
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
        include('all_invoices.php');
        break;
        case 'search_invoices':
            $IID = filter_input(INPUT_POST, 'invoice_id', FILTER_VALIDATE_INT);
            $invoice = Invoice_db::get_invoicesByinvoiceID($IID);
            if($invoice === NULL){
                $invoices = Invoice_db::get_invoicesAll();    
                include('all_invoices.php');
            } else{
                include('invoice_view.php');
            }         
        break;
        case 'update_payment':
            // Fetch a form to add a credit card to the order to pay
            include('update_payment.php');
        break;
        case 'update_payment_form':
            // Make a payment with credit card.
            include('update_payment.php');
        break;
        default:
            $error = "A single frickin' potato chip!";
            include("./errors/error.php");
        break;
}