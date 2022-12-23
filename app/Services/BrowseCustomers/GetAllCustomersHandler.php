<?php

namespace App\Services\BrowseCustomers;

use App\Repository\CustomerRepository;

class GetAllCustomersHandler
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function handle(){

        return $this->customerRepository->all();
    }
}