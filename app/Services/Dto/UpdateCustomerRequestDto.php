<?php


namespace App\Services\Dto;


class UpdateCustomerRequestDto extends AbstractDto
{
    private $first_name;
    private $last_name;

    protected function map(array $data): void
    {
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function getLastName(){
        return $this->last_name;
    }

}
