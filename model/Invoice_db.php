<?php

class Invoice_db {

    public static function get_invoicesAll() 
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM invoices ORDER BY invoiceID';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        $invoices = array();
        foreach ($rows as $row) {
        $i = new Invoice(
                         $row['buyerID'],
                         $row['paymentAmount'],
                         $row['paymentType'],
                         $row['cardNum'],
                         $row['name'],
                         $row['address'],
                         $row['paid'],
                         $row['delivered']);
            $i->setInvoiceID($row['invoiceID']);
                         $invoices[] = $i;
        }
        return $invoices;
    }

    public static function deleteInvoice_ByID($entry) {
        $db = Database::getDB();
        $query = 'DELETE FROM invoices
                  WHERE invoice_id = :entry';
        $statement = $db->prepare($query);
        $statement->bindValue(':entry', $entry);
        $statement->execute();
        $statement->closeCursor();
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
        if ( ! $results) {
            $invoice = NULL;
        } else {
            $invoice = new Invoice($results['invoiceID'],
            $results['buyerID'],
            $results['paymentAmount'],
            $results['paymentType'],
            $results['cardNum'],
            $results['name'],
            $results['address'],
            $results['paid'],
            $results['delivered']);
        }

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

        public static function update_paid($paid, $invoiceID)
        {
            $db = Database::getDB();
     
            $query = 'UPDATE invoices SET paid = :paid WHERE invoiceID = :invoiceID';
            $statement = $db->prepare($query);
            $statement->bindValue(':paid', $paid);
            $statement->bindValue(':invoiceID', $invoiceID);
            $statement->execute();
            $statement->closeCursor();
        }

        public static function update_delivered($delivered, $invoiceID)
        {
            $db = Database::getDB();
     
            $query = 'UPDATE invoices SET delivered = :delivered WHERE invoiceID = :invoiceID';
            $statement = $db->prepare($query);
            $statement->bindValue(':delivered', $delivered);
            $statement->bindValue(':invoiceID', $invoiceID);
            $statement->execute();
            $statement->closeCursor();
        }
    }
?>