<?php


namespace App\Services\CreateCustomer;

class CreateCustomerRequest
{
    private $first_name;
    private $last_name;

    public function getFirstName(){
        return $this->first_name;
    }

    public function setFirstName($firstName){
        $this->first_name = $firstName;
    }

    public function getLastName(){
        return $this->last_name;
    }

    public function setLastName($lastName){
        $this->last_name = $lastName;
    }
}
