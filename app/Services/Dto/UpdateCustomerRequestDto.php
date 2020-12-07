<?php


namespace App\Services\Dto;


class UpdateCustomerRequestDto extends AbstractDto
{
    private $first_name;
    private $last_name;

    protected function map(array $data): void
    {
        $this->first_name = $data['first_name'] ?? null;
        $this->last_name = $data['last_name'] ?? null;

    }

}
