<?php

namespace App\Services\RemoveCustomer;

use App\Entities\Customer;
use App\Repository\CustomerRepository;

class RemoveCustomerHandler
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function handle(int $id): void
    {
        $customerRecord = $this->customerRepository->find($id);

        $customer = new Customer();
        $customer->setId($customerRecord->getId());

        $this->customerRepository->remove($customer);
    }
}