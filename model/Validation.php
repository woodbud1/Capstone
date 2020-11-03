<?php
require_once('database_oo.php');

class Validation {
    //put your code here
    public static function validName($value){
        return preg_match('/^[a-zA-Z]/', $value);
    }
    
    public static function isValidUsername($value){
        if(strlen($value)>=4 && strlen($value)<=30){
            return true;
        }else{
            return false;
        }
    }
    
    public static function validPasswordLength($value){
        if(strlen($value) >= 12 && strlen($value) <= 100){
            return true;
        }else{
            return false;
        }
    }
    
    public static function isValidPassword($value){
        $count = 0;
        
        if(preg_match('/[A-Z]/', $value) === 1){
            $count++;
        }
        if(preg_match('/[a-z]/', $value) === 1){
            $count++;
        }
        if(preg_match('/[0-9]/', $value) === 1){
            $count++;
        }
        if(preg_match('/[\W_]/', $value === 1)){
            $count++;
        }
        if($count >= 3){
            return true;
        }else{
            return false;
        }
    }
    
    public static function validateUser($userCode, $password){
        if(User_db::user_exists === true){
            $user = User_db::get_user($userCode);
            $passwordToCheck = $user.getPassword();
            if($password === $passwordToCheck){
                return true;
            }else{
            
                return false;
            }
        }else{
            return false;
        }
    }
}
