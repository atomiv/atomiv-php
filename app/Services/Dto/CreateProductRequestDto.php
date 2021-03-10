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

    public function getDescription()
    {
        return $this->description;
    }

    public function getUnitPrice(){
        return $this->unit_price;
    }
}
