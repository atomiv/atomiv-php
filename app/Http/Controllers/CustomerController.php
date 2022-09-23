<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customers\CreateCustomerFormRequest;
use App\Http\Requests\Customers\UpdateCustomerFormRequest;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use App\Services\CustomerService;
use App\Services\Dto\CreateCustomerRequestDto;
use App\Services\Dto\UpdateCustomerRequestDto;

class CustomerController extends Controller
{
    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function getCustomer($id){

        $customer = $this->customerService->getCustomer($id);

        if ($customer)
            return response(new CustomerResource($customer),200);

        return response('Customer not found.',404);
    }

    public function getAllCustomers(){

        $customers = $this->customerService->getAllCustomers();

        return response(new CustomerCollection($customers),200);
    }

    public function create(CreateCustomerFormRequest $request){
        $requestDto = new CreateCustomerRequestDto();
        $requestDto->setFirstName($request->first_name);
        $requestDto->setLastName($request->last_name);

        $customer = $this->customerService->add($requestDto);

        return response(new CustomerResource($customer),201);
    }

    public function update(UpdateCustomerFormRequest $request, $id){

        $requestDto = new UpdateCustomerRequestDto();
        $requestDto->setFirstName($request->first_name);
        $requestDto->setLastName($request->last_name);

        $customer = $this->customerService->update($requestDto,$id);

        return response([new CustomerResource($customer),'message' => 'Customer successfully updated'],200);
    }

    public function delete($id){
       $this->customerService->remove($id);

       return response('Customer successfully removed',200);
    }
}
