<?php
class Invoice {
    private $invoiceID;
    private $buyerID;
    private $paymentAmount;
    private $paymentType;
    private $cardNum;
    private $name;
    private $address; 
    private $paid;
    private $delivered;

    public function __construct($buyerID, $paymentAmount, $paymentType, $cardNum, $name, $address, $paid, $delivered) {
        // $this->invoiceID = $invoiceID;
        $this->buyerID = $buyerID;
        $this->paymentAmount = $paymentAmount;
        $this->paymentType = $paymentType;
        $this->cardNum = $cardNum;
        $this->name = $name;
        $this->address = $address;
        $this->paid = $paid;
        $this->delivered = $delivered;
    }

    public function getInvoiceID() {
        return $this->invoiceID;
    }

    public function setInvoiceID($value) {
        $this->invoiceID = $value;
    }

    public function getBuyerID() {
        return $this->buyerID;
    }

    public function setBuyerID($value) {
        $this->buyerID = $value;
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

    public function getCardNum() {
        return $this->cardNum;
    }

    public function setCardNum($value) {
        $this->cardNum = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
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
    
    public function getDelivered() {
        return $this->delivered;
    }
    
    public function setDelivered($value) {
        $this->delivered = $value;
    }
}
?>