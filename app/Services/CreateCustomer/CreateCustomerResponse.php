<?php

namespace App\Services\CreateCustomer;

class CreateCustomerResponse
{
    private $first_name;
    private $last_name;
    private $id;

    public function getId(){
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function setFirstName(string $firstName){
        $this->first_name = $firstName;
    }

    public function getLastName(){
        return $this->last_name;
    }

    public function setLastName(string $lastName){
        $this->last_name = $lastName;
    }
}