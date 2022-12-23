<?php

namespace App\Services\CreateCustomer;

use App\Entities\Customer;
use App\Repository\CustomerRepository;

class CreateCustomerHandler
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
      $this->customerRepository = $customerRepository;
    }

    public function handle(CreateCustomerRequest $request): CreateCustomerResponse
    {
        $customer = new Customer();

        $customer->setFirstName($request->getFirstName());
        $customer->setLastName($request->getLastName());

        $this->customerRepository->add($customer);

        $response = new CreateCustomerResponse();

        $response->setId($customer->getId());
        $response->setFirstName($customer->getFirstName());
        $response->setLastName($customer->getLastName());

        return $response;
    }
}