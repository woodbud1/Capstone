<?php

class Order_db {

        public static function get_Order($order_id) 
        {
            $db = Database::getDB();
            $query = 'SELECT * FROM orders WHERE OrderID = :order_id';
            $statement = $db->prepare($query);
            $statement->bindValue(':order_id', $order_id);
            $statement->execute();
            $results = $statement->fetch();
            $statement->closeCursor();
            $order = new Order($results['orderid'],
                             $results['suppliername'],
                             $results['supplierid'],
                             $results['productid'],
                             $results['categoryid'],
                             $results['wholesaleprice'],
                             $results['retailprice'],
                             $results['count']);
            return $order;
        }

        public static function select_all()
        {
          $db = Database::getDB();
          $query = 'SELECT * FROM orders  ORDER BY OrderID ASC';
          $statement = $db->prepare($query);
          $statement->execute();
          $results =  $statement->fetchAll();
          return $results;
        }
        
        public static function add_Order($o)
        {
            $db = Database::getDB();
     
          $query = 'INSERT INTO Orders (orderid, suppliername, supplierid, productid, categoryid, wholesaleprice, retailprice, count) VALUES (:OrderID, :SupplierName, :SupplierID, :ProductID, :CategoryID, :WholesalePrice, :RetailPrice, :Count)';
          $statement = $db->prepare($query);
          $statement->bindValue(':OrderID', $o->getOrderID());
          $statement->bindValue(':SupplierName', $o->getSupplierName());
          $statement->bindValue(':SupplierID', $o->getSupplierID());
          $statement->bindValue(':ProductID', $o->getProductID());
          $statement->bindValue(':CategoryID', $o->getCategoryID());
          $statement->bindValue(':WholesalePrice', $o->getWholesalPrice());
          $statement->bindValue(':RetailPrice', $o->getRetailPrice());
          $statement->bindValue(':Count', $o->getCount());
          $statement->execute();
          $statement->closeCursor();
        }
        
        public static function getOrdersBySupplier($supplier_id) {
        $db = Database::getDB();
        $query = 'SELECT * FROM Orders WHERE SupplierID = :supplier_id;
                  ORDER BY SupplierID';
        $statement = $db->prepare($query);
        $statement->bindValue(":supplier_id", $supplier_id);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
    
        foreach ($rows as $row) {
            $order = new Order($row['OrderID'],
                                   $row['SupplierID'],
                                   $row['ProductID'],
                                   $row['CategoryID'],
                                   $row['WholesalePrice'],
                                   $row['RetailPrice'],
                                   $row['count']);
            $order->setOrderID($row['OrderID']);
            $Orders[] = $order;
        }
        return $Orders;
    }
        public static function deleteOrder($order_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM Orders
                  WHERE OrderID = :order_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':order_id', $order_id);
        $statement->execute();
        $statement->closeCursor();
        }
}
?>
