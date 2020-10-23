<?php

namespace Tests\Feature;

use App\Customer;
use Facade\Ignition\SolutionProviders\DefaultDbNameSolutionProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    private $customer;

    public function setUp(): void
    {
        parent::setUp();

        $this->customer = factory(Customer::class)->create();
    }


    public function testListSingleCustomer(){
        $response = $this->get('/api/customers/'.$this->customer->id);

        $response->assertStatus(200);
    }

    public function testListAllCustomers(){
       $response = $this->get('/api/customers');

       $response->assertStatus(200);
    }

    public function testCreateNewCustomer(){

        $response = $this->post('api/customers',$this->customer->toArray());

        $response->assertStatus(201);
    }

    public function testUpdateCustomer(){
        $response = $this->put('api/customers/' . $this->customer->id,['first_name' => 'John']);

        $response->assertStatus(200);

        $this->assertDatabaseHas('customers',['id' => $this->customer->id,'first_name'=> 'John']);
    }

    public function testDeleteCustomer(){
        $response = $this->delete('api/customers/' . $this->customer->id);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('customers',['id'=>$this->customer->id]);

    }
}
