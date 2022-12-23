<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customers\CreateCustomerFormRequest;
use App\Http\Requests\Customers\UpdateCustomerFormRequest;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use App\Services\BrowseCustomers\GetAllCustomersHandler;
use App\Services\CreateCustomer\CreateCustomerHandler;
use App\Services\CreateCustomer\CreateCustomerRequest;
use App\Services\GetCustomer\GetCustomerHandler;
use App\Services\RemoveCustomer\RemoveCustomerHandler;
use App\Services\UpdateCustomer\UpdateCustomerHandler;
use App\Services\UpdateCustomer\UpdateCustomerRequest;

class CustomerController extends Controller
{
    private $updateCustomerHandler;
    private $createCustomerHandler;
    private $getCustomerHandler;
    private $getAllCustomersHandler;
    private $removeCustomerHandler;

    public function __construct(
        UpdateCustomerHandler $updateCustomerHandler,
        CreateCustomerHandler $createCustomerHandler,
        GetCustomerHandler $getCustomerHandler,
        GetAllCustomersHandler $getAllCustomersHandler,
        RemoveCustomerHandler $removeCustomerHandler
    )
    {
        $this->createCustomerHandler = $createCustomerHandler;
        $this->updateCustomerHandler = $updateCustomerHandler;
        $this->removeCustomerHandler = $removeCustomerHandler;
        $this->getCustomerHandler = $getCustomerHandler;
        $this->getAllCustomersHandler = $getAllCustomersHandler;
    }

    public function getCustomer($id){

        $customer = $this->getCustomerHandler->handle($id);

        if ($customer)
            return response(new CustomerResource($customer),200);

        return response('Customer not found.',404);
    }

    public function getAllCustomers(){

        $customers = $this->getAllCustomersHandler->handle();

        return response(new CustomerCollection($customers),200);
    }

    public function create(CreateCustomerFormRequest $request){
        $requestDto = new CreateCustomerRequest();
        $requestDto->setFirstName($request->first_name);
        $requestDto->setLastName($request->last_name);

        $customer = $this->createCustomerHandler->handle($requestDto);

        return response(new CustomerResource($customer),201);
    }

    public function update(UpdateCustomerFormRequest $request, $id){

        $requestDto = new UpdateCustomerRequest();
        $requestDto->setFirstName($request->first_name);
        $requestDto->setLastName($request->last_name);

        $customer = $this->updateCustomerHandler->handle($requestDto,$id);

        return response([new CustomerResource($customer),'message' => 'Customer successfully updated'],200);
    }

    public function delete($id){
       $this->removeCustomerHandler->handle($id);

       return response('Customer successfully removed',200);
    }
}
