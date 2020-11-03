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
    private $Phone;
    private $Street;
    private $city;
    private $state;
    private $type;
    private $notes;

    function __construct($userId, $Username, $Password, $Name, $Email, $Image, $Phone, $Street, $city, $state, $type, $notes) {
        $this->userId = $userId;
        $this->Username = $Username;
        $this->Password = $Password;
        $this->Name = $Name;
        $this->Email = $Email;
        $this->Image = $Image;
        $this->Phone = $Phone;
        $this->Street = $Street;
        $this->city = $city;
        $this->state = $state;
        $this->type = $type;
        $this->notes = $notes;
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

    public function getPhone() {
        return $this->Phone;
    }

    public function getStreet() {
        return $this->Street;
    }

    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getType() {
        return $this->type;
    }

    public function getNotes() {
        return $this->notes;
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

    public function setEmail($Email) {
        $this->Email = $Email;
    }

    public function setImage($Image) {
        $this->Image = $Image;
    }

    public function setPhone($Phone) {
        $this->Phone = $Phone;
    }

    public function setStreet($Street) {
        $this->Street = $Street;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setNotes($notes) {
        $this->notes = $notes;
    }
}

?>