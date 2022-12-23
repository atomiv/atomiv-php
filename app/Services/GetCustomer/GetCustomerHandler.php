<?php

namespace App\Services\GetCustomer;

use App\Repository\CustomerRepository;

class GetCustomerHandler
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function handle(int $id)
    {
        return $this->customerRepository->find($id);
    }
}