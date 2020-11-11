<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User {

    private $userId;
    private $Username;
    private $Password;
    private $Name;
    private $Email;
    private $Image;
    private $type;

    function __construct($userId, $Username, $Password, $Name, $Email, $Image, $type) {
        $this->userId = $userId;
        $this->Username = $Username;
        $this->Password = $Password;
        $this->Name = $Name;
        $this->Email = $Email;
        $this->Image = $Image;
        $this->type = $type;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getUsername() {
        return $this->Username;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function getName() {
        return $this->Name;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function getImage() {
        return $this->Image;
    }

    public function getType() {
        return $this->type;
    }


    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setUsername($Username) {
        $this->Username = $Username;
    }

    public function setPassword($Password) {
        $this->Password = $Password;
    }

    public function setName($Name) {
        $this->Name = $Name;
    }

    public function setImage($Image) {
        $this->Image = $Image;
    }

    public function setType($type) {
        $this->type = $type;
    }
}

?>