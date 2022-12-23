<?php

namespace App\Services\UpdateCustomer;

use App\Entities\Customer;
use App\Repository\CustomerRepository;

class UpdateCustomerHandler
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function handle(UpdateCustomerRequest $request,$id) : UpdateCustomerResponse
    {
        $customerRecord = $this->customerRepository->find($id);

        $customer = new Customer();

        $customer->setId($customerRecord->getId());
        $customer->setFirstName($request->getFirstName());
        $customer->setLastName($request->getLastName());

        $this->customerRepository->update($customer);

        $response = new UpdateCustomerResponse();
        $response->setId($customer->getId());
        $response->setFirstName($customer->getFirstName());
        $response->setLastName($customer->getLastName());

        return $response;
    }
}