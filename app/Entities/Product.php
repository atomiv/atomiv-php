<?php

namespace App\Entities;


class Product
{
    private $id;

    private $code;

    private $description;

    private $unitPrice;

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    public function setCode(string $code){
        $this->code = $code;
    }

    public function getCode(){
       return $this->code;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setUnitPrice(float $unitPrice){
        $this->unitPrice = $unitPrice;
    }

    public function getUnitPrice(){
        return $this->unitPrice;
    }
}