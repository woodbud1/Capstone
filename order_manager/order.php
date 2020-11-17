<?php
class order {
   private $orderID;
   private $supplierName;
   private $supplierID;
   private $productID;
   private $categoryID;
   private $wholesalePrice;
   private $retailPrice;
   private $count;
   
   function __construct($orderID, $supplierName, $supplierID, $productID, $categoryID, $wholesalePrice, $retailPrice, $count) {
       $this->orderID = $orderID;
       $this->supplierName = $supplierName;
       $this->supplierID = $supplierID;
       $this->productID = $productID;
       $this->categoryID = $categoryID;
       $this->wholesalePrice = $wholesalePrice;
       $this->retailPrice = $retailPrice;
       $this->count = $count;
   }
   function getOrderID() {
       return $this->orderID;
   }

   function getSupplierName() {
       return $this->supplierName;
   }

   function getSupplierID() {
       return $this->supplierID;
   }

   function getProductID() {
       return $this->productID;
   }

   function getCategoryID() {
       return $this->categoryID;
   }

   function getWholesalePrice() {
       return $this->wholesalePrice;
   }

   function getRetailPrice() {
       return $this->retailPrice;
   }

   function getCount() {
       return $this->count;
   }

   function setOrderID($orderID) {
       $this->orderID = $orderID;
   }

   function setSupplierName($supplierName) {
       $this->supplierName = $supplierName;
   }

   function setSupplierID($supplierID) {
       $this->supplierID = $supplierID;
   }

   function setProductID($productID) {
       $this->productID = $productID;
   }

   function setCategoryID($categoryID) {
       $this->categoryID = $categoryID;
   }

   function setWholesalePrice($wholesalePrice) {
       $this->wholesalePrice = $wholesalePrice;
   }

   function setRetailPrice($retailPrice) {
       $this->retailPrice = $retailPrice;
   }

   function setCount($count) {
       $this->count = $count;
   }


}
