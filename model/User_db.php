<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User_db {
    //put your code here
    public static function get_user($username) 
    {
        $db = Database::getDB();
	$query = 'SELECT * FROM users WHERE Username = :Username';
	$statement = $db->prepare($query);
        $statement->bindValue(':Username', $username);
	$statement->execute();
	$results = $statement->fetch();
        $statement->closeCursor();
        $user = new User($results['UserId'],
                         $results['Username'],
                         $results['Password'],
                         $results['Name'],
                         $results['Email'],
                         $results['Image'],
                         $results['Type']); 

        return $user;
    }

    public static function get_name_by_ID($ID) 
    {
        $db = Database::getDB();
	$query = 'SELECT * FROM users WHERE UserId = :UserId';
	$statement = $db->prepare($query);
        $statement->bindValue(':UserId', $ID);
	$statement->execute();
	$results = $statement->fetch();
        $name = $results['Name'];
        $statement->closeCursor();
        return $name;
    }
    
    public static function select_all()
    {
      $db = Database::getDB();
 
      $query = 'SELECT * FROM users';
      $statement = $db->prepare($query);
      $statement->execute();
      $results =  $statement->fetchAll();
      return $results;
    }
    
    public static function add_user($username,$password,$name,$email,$image, $type)
    {
        $db = Database::getDB();
 
      $query = 'INSERT INTO users (Username, Password, Name, Email, Image, Type) VALUES (:Username, :Password, :Name, :Email, :Image, :Type)';
      $statement = $db->prepare($query);
      $statement->bindValue(':Username', $username);
      $hash = password_hash($password, PASSWORD_BCRYPT);
      $statement->bindValue(':Password', $hash);
      $statement->bindValue(':Name', $name);
      $statement->bindValue(':Email', $email);
      $statement->bindValue(':Image', $image);
      $statement->bindValue(':Type', $type);
      $statement->execute();
      $statement->closeCursor();
    }

    public static function user_exists($username) 
    {
        $db = Database::getDB();
        
	$query = 'SELECT * FROM users WHERE Username = :Username';
	$statement = $db->prepare($query);
        $statement->bindValue(':Username', $username);
	$statement->execute();
	$results = $statement->fetch();
        if(is_array($results) && count($results) > 0){
            return true;
        }
        else{
            return false;
        }
    }
    public static function email_exists($email) 
    {
        $db = Database::getDB();
        
	$query = 'SELECT * FROM users WHERE email = :Email';
	$statement = $db->prepare($query);
        $statement->bindValue(':Email', $email);
	$statement->execute();
	$results = $statement->fetch();
        if(is_array($results) && count($results) > 0){
            return true;
        }
        else{
            return false;
        }
    }
    public static function update_user($username,$email,$password)
    {
        $db = Database::getDB();
 
        $query = 'UPDATE users SET Email = :Email, Password = :Password WHERE Username = :Username';
        $statement = $db->prepare($query);
        $statement->bindValue(':Email', $email);
        $statement->bindValue(':Username', $username);
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $statement->bindValue(':Password', $hash);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function verify_user($username, $password){
        $db = Database::getDB();
        
        $query = 'SELECT * FROM users WHERE Username = :Username';
	$statement = $db->prepare($query);
        $statement->bindValue(':Username', $username);
	$statement->execute();
	$results = $statement->fetch();
        $statement->closeCursor();
        
        $hashToCheck = $results['Password'];
        if(password_verify($password,$hashToCheck)){
            return true;
        }else {
            return false;
        }
    }
    
        public static function get_image($username){
        $db = Database::getDB();
 
        $query = 'SELECT Image from users WHERE Username = :Username';
        $statement = $db->prepare($query);
        $statement->bindValue(':Username', $username);

        $statement->execute();
        $results = $statement->fetch();
        $image = $results['Image'];
        $statement->closeCursor();
        return $image;
    }

        public static function get_name($username){
        $db = Database::getDB();
 
        $query = 'SELECT Name from users WHERE Username = :Username';
        $statement = $db->prepare($query);
        $statement->bindValue(':Username', $username);

        $statement->execute();
        $results = $statement->fetch();
        $name = $results['Name'];
        $statement->closeCursor();
        return $name;
    }
    
       public static function change_image($username, $image){
        $db = Database::getDB();
 
        $query = 'UPDATE users SET Image = :Image WHERE Username = :Username';
        $statement = $db->prepare($query);
        $statement->bindValue(':Image', $image);
        $statement->bindValue(':Username', $username);

        $statement->execute();
        $statement->closeCursor();
    }
    public static function get_type($username){
    $db = Database::getDB();

    $query = 'SELECT Type from users WHERE Username = :Username';
    $statement = $db->prepare($query);
    $statement->bindValue(':Username', $username);

    $statement->execute();
    $results = $statement->fetch();
    $type = $results['Type'];
    $statement->closeCursor();
    return $type;
    }

    public static function get_byUserName($username){
        $db = Database::getDB();
    
        $query = 'SELECT UserId from users WHERE Username = :Username';
        $statement = $db->prepare($query);
        $statement->bindValue(':Username', $username);
        $statement->execute();
        $results = $statement->fetch();
        $id = $results['UserId'];
        $statement->closeCursor();
        return $id;
        }
        
    public static function get_email($username){
    $db = Database::getDB();

    $query = 'SELECT Email from users WHERE Username = :Username';
    $statement = $db->prepare($query);
    $statement->bindValue(':Username', $username);
    $statement->execute();
    $results = $statement->fetch();
    $id = $results['Email'];
    $statement->closeCursor();
    return $id;
    }
}
