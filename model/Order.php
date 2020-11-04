<?php
class Order {
    private $orderID;
    private $paymentAmount;
    private $paymentType;
    private $checkNum;
    private $cardNum;
    private $userID;
    private $address; 
    private $paid;
    private $delievered;

    public function __construct($orderID, $paymentAmount, $paymentType, $checkNum, $cardNum, $userID, $address, $paid, $delievered) {
        $this->orderID = $orderID;
        $this->paymentAmount = $paymentAmount;
        $this->paymentType = $paymentType;
        $this->checkNum = $checkNum;
        $this->cardNum = $cardNum;
        $this->userID = $userID;
        $this->address = $address;
        $this->paid = $paid;
        $this->delievered = $delievered;
    }

    public function getOrderID() {
        return $this->orderID;
    }

    public function setOrderID($value) {
        $this->orderID = $value;
    }

    public function getPaymentAmount() {
        return $this->paymentAmount;
    }

    public function setPaymentAmount($value) {
        $this->paymentAmount = $value;
    }

    public function getPaymentType() {
        return $this->paymentType;
    }

    public function setPaymentType($value) {
        $this->paymentType = $value;
    }

    public function getCheckNum() {
        return $this->checkNum;
    }

    public function setCheckNum($value) {
        $this->checkNum = $value;
    }

    public function getCardNum() {
        return $this->cardNum;
    }

    public function setCardNum($value) {
        $this->cardNum = $value;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function setUserID($value) {
        $this->userID = $value;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($value) {
        $this->address = $value;
    }


    public function getPaid() {
        return $this->paid;
    }
    
    public function setPaid($value) {
        $this->paid = $value;
    }
    
    public function getDelievered() {
        return $this->delievered;
    }
    
    public function setDelievered($value) {
        $this->delievered = $value;
    }
}
?>