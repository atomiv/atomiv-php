<?php

namespace Tests\Feature;

use Illuminate\Routing\Middleware\ThrottleRequests;
use Tests\TestCase;

class CustomerTest extends TestCase
{

    private $customer;

    public function setUp(): void
    {
        parent::setUp();

        $this->post('api/customers',$this->validFields());

        $customers = $this->get('api/customers');

        $this->customer = $customers['data'][0];
    }

    public function testListSingleCustomer(){

        $response = $this->get('/api/customers/'.$this->customer['id']);

        $response->assertStatus(200);

    }

    public function testListAllCustomers(){
       $response = $this->get('/api/customers');

       $response->assertStatus(200);

    }

    public function testCreateNewCustomer(){

        $response = $this->post('api/customers',$this->validFields());

        $response->assertStatus(201);

        $this->get('api/customers/' . $response["id"])
            ->assertSee($this->validFields()['first_name'],$this->validFields()['last_name']);

    }

    public function testCustomerFirstNameRequired(){

         $this->post('api/customers',$this->validFields(['first_name'=>null]))
                ->assertSessionHasErrors('first_name');
    }

    public function testCustomerLastNameRequired(){

        $this->post('api/customers',$this->validFields(['last_name'=>null]))
            ->assertSessionHasErrors('last_name');

    }

    public function testCustomerFirstNameHaveTotBeWithoutNumbers(){

        $this->post('api/customers',$this->validFields(['first_name'=>"John123"]))
            ->assertSessionHasErrors('first_name');
    }

    public function testCustomerLastNameHaveTotBeWithoutNumbers(){

        $this->post('api/customers',$this->validFields(['last_name'=>"Doe123"]))
            ->assertSessionHasErrors('last_name');
    }

    public function testUpdateCustomer(){
        $response = $this->put('api/customers/' . $this->customer['id'],['first_name' => 'Jack','last_name'=>'Jackson']);

        $response->assertStatus(200);

        $this->get('api/customers/' . $this->customer['id'])->assertSee('Jack');
    }

    public function testDeleteCustomer(){
        $response = $this->delete('api/customers/' . $this->customer['id']);

        $response->assertStatus(200);

        $this->get('api/customers/' . $this->customer['id'])->assertSee(null);

    }

    protected function validFields($overrides = []){

        return array_merge([
            "first_name" => "John",
            "last_name" => "Doe"
        ],$overrides);
    }
}
