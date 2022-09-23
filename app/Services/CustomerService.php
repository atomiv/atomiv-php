<?php


namespace App\Services;

use App\Entities\Customer;

use App\Repository\CustomerRepository;
use App\Services\Dto\CreateCustomerRequestDto;
use App\Services\Dto\CreateCustomerResponseDto;
use App\Services\Dto\UpdateCustomerRequestDto;
use App\Services\Dto\UpdateCustomerResponseDto;
use App\Services\Interfaces\CustomerServiceInterface;

class CustomerService implements CustomerServiceInterface
{

    private $customerRepository;

    public function __construct(CustomerRepository $customer)
    {
        $this->customerRepository = $customer;
    }

    public function getCustomer(int $id){

        return $this->customerRepository->find($id);
    }

    public function getAllCustomers(){

        return $this->customerRepository->all();
    }

    public function add(CreateCustomerRequestDto $request) : CreateCustomerResponseDto
    {
        $customer = new Customer();

        $customer->setFirstName($request->getFirstName());
        $customer->setLastName($request->getLastName());

        $this->customerRepository->add($customer);

        $response = new CreateCustomerResponseDto();

        $response->setId($customer->getId());
        $response->setFirstName($customer->getFirstName());
        $response->setLastName($customer->getLastName());

        return $response;
    }

    public function update(UpdateCustomerRequestDto $request,$id) : UpdateCustomerResponseDto
    {
        $customerRecord = $this->customerRepository->find($id);

        $customer = new Customer();

        $customer->setId($customerRecord->getId());
        $customer->setFirstName($request->getFirstName());
        $customer->setLastName($request->getLastName());

        $this->customerRepository->update($customer);

        $response = new UpdateCustomerResponseDto();
        $response->setId($customer->getId());
        $response->setFirstName($customer->getFirstName());
        $response->setLastName($customer->getLastName());

        return $response;
    }

    public function remove(int $id): void
    {
        $customerRecord = $this->customerRepository->find($id);

        $customer = new Customer();
        $customer->setId($customerRecord->getId());

        $this->customerRepository->remove($customer);
    }
}
