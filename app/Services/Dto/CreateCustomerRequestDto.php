<?php


namespace App\Services\Dto;

class CreateCustomerRequestDto
{
    private $first_name;
    private $last_name;

    public function getFirstName(){
        return $this->first_name;
    }

    public function getLastName(){
        return $this->last_name;
    }
}
