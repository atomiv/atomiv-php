<?php


namespace App\Services\Dto;


class UpdateProductResponseDto
{
    private $id;
    private $code;
    private $description;
    private $unit_price;

    public function setId(int $id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode(string $code)
    {
        return $this->code = $code;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
       return $this->description = $description;
    }

    public function getUnitPrice(){
        return $this->unit_price;
    }

    public function setUnitPrice(float $unit_price){
        return $this->unit_price = $unit_price;
    }
}
