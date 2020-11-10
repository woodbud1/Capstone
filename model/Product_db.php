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
            $query = 'SELECT * FROM products WHERE sku = :SKU';
            $statement = $db->prepare($query);
            $statement->bindValue(':SKU', $product);
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
    
        public static function get_bySKU($sku) 
        {
            $db = Database::getDB();
            $query = 'SELECT * FROM products WHERE sku = :sku';
            $statement = $db->prepare($query);
            $statement->bindValue(':sku', $sku);
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
        
        public static function add_product($categoryID, $productName, $price, $sku, $imageURL, $description, $count)
        {
            $db = Database::getDB();
     
          $query = 'INSERT INTO products (categoryID, productName, price, sku, imageURL, description, count) VALUES (:categoryID, :productName, :price, :sku, :imageURL, :description, :count)';
          $statement = $db->prepare($query);
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
}
?>
