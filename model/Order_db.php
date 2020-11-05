<?php

/* 
 * Scaffolding out orders and orders database.
 */

class Order_db {

        public static function get_order($order) 
        {
            $db = Database::getDB();
            $query = 'SELECT * FROM orders WHERE orderID = :orderID';
            $statement = $db->prepare($query);
            $statement->bindValue(':orderID', $order);
            $statement->execute();
            $results = $statement->fetch();
            $statement->closeCursor();
            $order = new Order($results['orderID'],
                             $results['paymentAmount'],
                             $results['paymentType'],
                             $results['cardNum'],
                             $results['name'],
                             $results['address'],
                             $results['paid'],
                             $results['delievered']);
            return $order;
        }
    
        public static function get_address($order) 
        {
            $db = Database::getDB();
            $query = 'SELECT * FROM orders WHERE orderID = :orderID';
            $statement = $db->prepare($query);
            $statement->bindValue(':orderID', $order);
            $statement->execute();
            $results = $statement->fetch();
            $statement->closeCursor();
            return $results;
        }
        
        public static function select_all()
        {
          $db = Database::getDB();
          $query = 'SELECT * FROM orders';
          $statement = $db->prepare($query);
          $statement->execute();
          $results =  $statement->fetchAll();
          return $results;
        }
        
        public static function add_order($orderID, $paymentAmount, $paymentType, $cardNum, $userID, $address, $paid, $delievered)
        {
            $db = Database::getDB();
     
          $query = 'INSERT INTO orders (orderID, paymentAmount, paymentType, cardNum, userID, address, paid, delievered) VALUES (:orderID, :paymentAmount, :paymentType, :cardNum, :userID, :address, :paid, :delievered)';
          $statement = $db->prepare($query);
          $statement->bindValue(':orderID', $orderID);
          $statement->bindValue(':paymentAmount', $paymentAmount);
          $statement->bindValue(':paymentType', $paymentType);
          $statement->bindValue(':cardNum', $cardNum);
          $statement->bindValue(':userID', $userID);
          $statement->bindValue(':address', $address);
          $statement->bindValue(':paid', $paid);
          $statement->bindValue(':delievered', $delievered);
          $statement->execute();
          $statement->closeCursor();
        }
    

        public static function update_address($address)
        {
            $db = Database::getDB();
     
            $query = 'UPDATE orders SET address = :address WHERE orderID = :orderID';
            $statement = $db->prepare($query);
            $statement->bindValue(':address', $address);
            $statement->execute();
            $statement->closeCursor();
        }

        public static function update_card($card)
        {
            $db = Database::getDB();
     
            $query = 'UPDATE orders SET cardNum = :cardNUm WHERE orderID = :orderID';
            $statement = $db->prepare($query);
            $statement->bindValue(':cardNum', $card);
            $statement->execute();
            $statement->closeCursor();
        }

        public static function update_paid($paid)
        {
            $db = Database::getDB();
     
            $query = 'UPDATE orders SET paid = :paid WHERE orderID = :orderID';
            $statement = $db->prepare($query);
            $statement->bindValue(':paid', $paid);
            $statement->execute();
            $statement->closeCursor();
        }

        public static function update_delievered($delievered)
        {
            $db = Database::getDB();
     
            $query = 'UPDATE orders SET delievered = :delievered WHERE orderID = :orderID';
            $statement = $db->prepare($query);
            $statement->bindValue(':delievered', $delievered);
            $statement->execute();
            $statement->closeCursor();
        }
    }
}
?>