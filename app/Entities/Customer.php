<?php

namespace App\Entities;

class Customer
{

    private $id;

    private $firstName;

    private $lastName;

    public function getId(){
        return $this->id;
    }

    public function setFirstName(string $firstName){
        $this->firstName = $firstName;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function setLastName(string $lastName){
        $this->lastName = $lastName;
    }

    public function getLastName(){
        return $this->lastName;
    }
}