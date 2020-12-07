<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customers\CreateCustomerRequest;
use App\Http\Requests\Customers\UpdateCustomerRequest;
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

    public function create(CreateCustomerRequest $request){

        $customer = $this->customerService->insert(new CreateCustomerRequestDto($request->all()));

        if ($customer)
            return response(new CustomerResource($customer),201);

        return response('Customer is not created',422);
    }

    public function update(UpdateCustomerRequest $request,$id){


        $customer = $this->customerService->update($id,new UpdateCustomerRequestDto($request->all()));

        if ($customer)
            return response('Customer successfully updated',200);

        return response('Customer is not updated',422);
    }

    public function delete($id){
        $customer = $this->customerService->delete($id);

        if ($customer)
            return response('Customer successfully deleted',200);

        return response('Customer is not deleted',409);
    }
}
