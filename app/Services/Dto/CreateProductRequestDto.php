<?php


namespace App\Services\Dto;


class CreateProductRequestDto extends AbstractDto
{
    private $code;
    private $description;
    private $unit_price;


    protected function map(array $data): void
    {
        $this->code = $data['code'];
        $this->description = $data['description'];
        $this->unit_price = $data['unit_price'];

    }

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
