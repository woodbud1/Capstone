<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Product_db {

        public static function get_product($product) 
        {
            $db = Database::getDB();
            $query = 'SELECT * FROM products WHERE SKU = :SKU';
            $statement = $db->prepare($query);
            $statement->bindValue(':Product', $product);
            $statement->execute();
            $results = $statement->fetch();
            $statement->closeCursor();
            $product = new Product($results['productID'],
                             $results['categoryID'],
                             $results['productName'],
                             $results['price'],
                             $results['sku'],
                             $results['imageURL'],
                             $results['description'],
                             $results['count']);
            return $product;
        }
    
        public static function get_SKU($SKU) 
        {
            $db = Database::getDB();
            $query = 'SELECT * FROM products WHERE SKU = :SKU';
            $statement = $db->prepare($query);
            $statement->bindValue(':SKU', $SKU);
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
        
        public static function add_product($productID, $categoryID, $productName, $price, $sku, $imageURL, $description, $count)
        {
            $db = Database::getDB();
     
          $query = 'INSERT INTO products (productID, categoryID, productName, price, sku, imageURL, description, count) VALUES (:productID, :categoryID, :productName, :price, :sku, :imageURL, :description, :count)';
          $statement = $db->prepare($query);
          $statement->bindValue(':productID', $productID);
          $statement->bindValue(':categoryID', $categoryID);
          $statement->bindValue(':productName', $productName);
          $statement->bindValue(':price', $price);
          $statement->bindValue(':sku', $sku);
          $statement->bindValue(':imageURL', $imageURL);
          $statement->bindValue(':description', $description);
          $statement->bindValue(':count', $count);
          $statement->execute();
          $statement->closeCursor();
        }
    
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

        public static function update_product()
        {
            $db = Database::getDB();
     
            $query = 'UPDATE products SET Name = :Name WHERE Username = :Username';
            $statement = $db->prepare($query);
            $statement->bindValue(':Name', $name);
            $statement->execute();
            $statement->closeCursor();
        }
}
?>