<?php


namespace App\Services\Dto;


class CreateProductRequestDto
{
    private $code;
    private $description;
    private $unit_price;

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        return $this->code = $code;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
       return $this->description = $description;
    }

    public function getUnitPrice(){
        return $this->unit_price;
    }

    public function setUnitPrice($unit_price){
        return $this->unit_price = $unit_price;
    }
}
