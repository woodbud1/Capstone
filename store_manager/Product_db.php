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
                         $results['PhoneNumber'],
                         $results['StreetAddress'],
                         $results['City'],
                         $results['State'],
                         $results['Type'],
                         $results['Notes']); 

        return $user;
	}
?>