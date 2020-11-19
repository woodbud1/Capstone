<?php
class Product {
    private $category;
    private $productID;
    private $productName;
    private $price;
    private $sku;
    private $imageURL;
    private $description;
    private $count;

    function __construct($category, $productName, $price, $sku, $imageURL, $description, $count) {
        // $this->productID = $productID;
        $this->category = $category;
        $this->productName = $productName;
        $this->price = $price;
        $this->sku = $sku;
        $this->imageURL = $imageURL;
        $this->description = $description;
        $this->count = $count;
    }

    public function getProductID() {
        return $this->productID;
    }

    public function setProductID($value) {
        $this->productID = $value;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($value) {
        $this->category = $value;
    }

    public function getProductName() {
        return $this->productName;
    }

    public function setProductName($value) {
        $this->productName = $value;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($value) {
        $this->price = $value;
    }

    public function getSKU() {
        return $this->sku;
    }

    public function setSKU($value) {
        $this->sku = $value;
    }

    public function getImageURL() {
        return $this->imageURL;
    }

    public function setImageURL($value) {
        $this->imageURL = $value;
    }

    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($value) {
        $this->description = $value;
    }
    
    public function getCount() {
        return $this->count;
    }
    
    public function setCount($value) {
        $this->count = $value;
    }
}
?>