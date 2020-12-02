<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Product_db {

        public static function get_product($product_id) 
        {
            $db = Database::getDB();
            $query = 'SELECT * FROM products WHERE productID = :product_id';
            $statement = $db->prepare($query);
            $statement->bindValue(':product_id', $product_id);
            $statement->execute();
            $results = $statement->fetch();
            $statement->closeCursor();
            $product = new Product(
                             $results['categoryID'],
                             $results['productName'],
                             $results['price'],
                             $results['sku'],
                             $results['imageURL'],
                             $results['description'],
                             $results['count']);
            return $product;
        }
    
        public static function get_bySKU($sku) 
        {
            $db = Database::getDB();
            $query = 'SELECT * FROM products WHERE sku = :sku';
            $statement = $db->prepare($query);
            $statement->bindValue(':sku', $sku);
            $statement->execute();
            $results = $statement->fetch();
            $statement->closeCursor();
            $product = new Product(
                $results['categoryID'],
                $results['productName'],
                $results['price'],
                $results['sku'],
                $results['imageURL'],
                $results['description'],
                $results['count']);
            return $product;
        }

        public static function get_byID($entry)
        {
          $db = Database::getDB();
          $query = 'SELECT * FROM products WHERE productID = :product_id';
          $statement = $db->prepare($query);
          $statement->bindValue(':product_id', $entry);
          $statement->execute();
          $results = $statement->fetch();
          $statement->closeCursor();
          return $results;
        }

        public static function select_all()
        {
          $db = Database::getDB();
          $query = 'SELECT * FROM products  ORDER BY productID ASC';
          $statement = $db->prepare($query);
          $statement->execute();
          $results =  $statement->fetchAll();
          return $results;
        }
        
        public static function add_product($product){
        $db = Database::getDB();
        
        $category_id = $product->getCategory()->getID();
        $productName = $product->getProductName();
        $price = $product->getPrice();
        $sku = $product->getSKU();
        $imageURL = $product->getImageURL();
        $description = $product->getDescription();
        $count = $product->getCount();
     
          $query = 'INSERT INTO products (categoryID, productName, price, sku, imageURL, description, count) VALUES (:categoryID, :productName, :price, :sku, :imageURL, :description, :count)';
          $statement = $db->prepare($query);
          $statement->bindValue(':categoryID', $category_id);
          $statement->bindValue(':productName', $productName);
          $statement->bindValue(':price', $price);
          $statement->bindValue(':sku', $sku);
          $statement->bindValue(':imageURL', $imageURL);
          $statement->bindValue(':description', $description);
          $statement->bindValue(':count', $count);
          $statement->execute();
          $statement->closeCursor();
        }
        
        // public static function find_AAValue()
        // {
        //     $db = Database::getDB();
     
        //     $query = 'SELECT MAX(`productID`)FROM `products`';
        //     $statement = $db->prepare($query);
        //     $statement->execute();
        //     $results = $statement->fetch();
        //     $statement->closeCursor();
        //     return $results;
        // }
        
        public static function product_exists($sku) 
        {
            $db = Database::getDB();
            
            $query = 'SELECT * FROM sku WHERE SKU = :SKU';
            $statement = $db->prepare($query);
            $statement->bindValue(':SKU', $sku);
            $statement->execute();
            $results = $statement->fetch();
            if(is_array($results) && count($results) > 0){
                return true;
            }
            else{
                return false;
            }
        }

        public static function getCountByID($entry)
        {
          $db = Database::getDB();
          $query = 'SELECT count FROM products WHERE productID = :product_id';
          $statement = $db->prepare($query);
          $statement->bindValue(':product_id', $entry);
          $statement->execute();
          $results = $statement->fetch();
          $statement->closeCursor();
          return $results;
        }

        public static function update_productCount($entry, $key)
        {
            $db = Database::getDB();
     
            $query = 'UPDATE products SET count = :count WHERE productID = :productID';
            $statement = $db->prepare($query);
            $statement->bindValue(':count', $entry);
            $statement->bindValue(':productID', $key);
            $statement->execute();
            $statement->closeCursor();
        }

        public static function update_product($productName,$price,$sku,$imageURL,$description)
        {
            $db = Database::getDB();
     
            $query = 'UPDATE products
                    SET productName = :productName,
                    price = :price,
                    sku = :sku,
                    imageURL = :imageURL,
                    description = :description
                WHERE sku = :sku';
            $statement = $db->prepare($query);
            $statement->bindValue(':productName', $productName);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':sku', $sku);
            $statement->bindValue(':imageURL', $imageURL);
            $statement->bindValue(':description', $description);
            $statement->execute();
            $statement->closeCursor();
        }
        
        public static function getProductsByCategory($category_id) {
        $db = Database::getDB();

        $category = Category_db::getCategory($category_id);

        $query = 'SELECT * FROM products
                  WHERE products.categoryID = :category_id
                  ORDER BY productID';
        $statement = $db->prepare($query);
        $statement->bindValue(":category_id", $category_id);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
    
        foreach ($rows as $row) {
            $product = new Product($category,
                                   $row['productID'],
                                   $row['productName'],
                                   $row['price'],
                                   $row['sku'],
                                   $row['imageURL'],
                                   $row['description'],
                                   $row['count']);
            $product->setProductID($row['productID']);
            $products[] = $product;
        }
        return $products;
    }
        public static function deleteProduct($product_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM products
                  WHERE productID = :product_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();
        }
}
?>
