<?php

class Invoice_db {

    public static function get_invoicesAll() 
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM invoices';
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
        $invoice = new Invoice($results['invoiceID'],
                         $results['buyerID'],
                         $results['paymentAmount'],
                         $results['paymentType'],
                         $results['cardNum'],
                         $results['name'],
                         $results['address'],
                         $results['paid'],
                         $results['delivered']);
        return $invoice;
    }

    public static function get_invoicesByBuyerID($buyerID) 
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM invoices WHERE buyerID = :buyerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':buyerID', $buyerID);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
        $invoice = new Invoice($results['invoiceID'],
                         $results['buyerID'],
                         $results['paymentAmount'],
                         $results['paymentType'],
                         $results['cardNum'],
                         $results['name'],
                         $results['address'],
                         $results['paid'],
                         $results['delivered']);
        return $invoice;
    }

        public static function get_invoicesByinvoiceID($order) 
        {
            $db = Database::getDB();
            $query = 'SELECT * FROM invoices WHERE invoiceID = :invoiceID';
            $statement = $db->prepare($query);
            $statement->bindValue(':invoiceID', $order);
            $statement->execute();
            $results = $statement->fetch();
            $statement->closeCursor();
            $order = new Order($results['invoiceID'],
                             $results['buyerID'],
                             $results['paymentAmount'],
                             $results['paymentType'],
                             $results['cardNum'],
                             $results['name'],
                             $results['address'],
                             $results['paid'],
                             $results['delivered']);
            return $order;
        }
    
        public static function get_address($order) 
        {
            $db = Database::getDB();
            $query = 'SELECT * FROM invoices WHERE invoiceID = :invoiceID';
            $statement = $db->prepare($query);
            $statement->bindValue(':invoiceID', $order);
            $statement->execute();
            $results = $statement->fetch();
            $statement->closeCursor();
            return $results;
        }
        
        public static function select_all()
        {
          $db = Database::getDB();
          $query = 'SELECT * FROM invoices';
          $statement = $db->prepare($query);
          $statement->execute();
          $results =  $statement->fetchAll();
          return $results;
        }
        
        public static function add_invoice($invoice)
        {
            $db = Database::getDB();
            
            $buyerID = $invoice->getBuyerID();
            $paymentAmount = $invoice->getPaymentAmount();
            $paymentType = $invoice->getPaymentType();
            $cardNum = $invoice->getCardNum();
            $name = $invoice->getName();
            $address = $invoice->getAddress();
            $paid = $invoice->getPaid();
            $delivered = $invoice->getdelivered();

          $query = 'INSERT INTO invoices (buyerID, paymentAmount, paymentType, cardNum, name, address, paid, delivered) VALUES (:buyerID, :paymentAmount, :paymentType, :cardNum, :name, :address, :paid, :delivered)';
          $statement = $db->prepare($query);
          $statement->bindValue(':buyerID', $buyerID);
          $statement->bindValue(':paymentAmount', $paymentAmount);
          $statement->bindValue(':paymentType', $paymentType);
          $statement->bindValue(':cardNum', $cardNum);
          $statement->bindValue(':name', $name);
          $statement->bindValue(':address', $address);
          $statement->bindValue(':paid', $paid);
          $statement->bindValue(':delivered', $delivered);
          $statement->execute();
          $statement->closeCursor();
        }
    

        public static function update_address($address)
        {
            $db = Database::getDB();
     
            $query = 'UPDATE invoices SET address = :address WHERE invoiceID = :invoiceID';
            $statement = $db->prepare($query);
            $statement->bindValue(':address', $address);
            $statement->execute();
            $statement->closeCursor();
        }

        public static function update_card($card)
        {
            $db = Database::getDB();
     
            $query = 'UPDATE invoices SET cardNum = :cardNum WHERE invoiceID = :invoiceID';
            $statement = $db->prepare($query);
            $statement->bindValue(':cardNum', $card);
            $statement->execute();
            $statement->closeCursor();
        }

        public static function update_paid($paid)
        {
            $db = Database::getDB();
     
            $query = 'UPDATE invoices SET paid = :paid WHERE invoiceID = :invoiceID';
            $statement = $db->prepare($query);
            $statement->bindValue(':paid', $paid);
            $statement->execute();
            $statement->closeCursor();
        }

        public static function update_delievered($delievered)
        {
            $db = Database::getDB();
     
            $query = 'UPDATE invoices SET delievered = :delievered WHERE invoiceID = :invoiceID';
            $statement = $db->prepare($query);
            $statement->bindValue(':delievered', $delievered);
            $statement->execute();
            $statement->closeCursor();
        }
    }
?>