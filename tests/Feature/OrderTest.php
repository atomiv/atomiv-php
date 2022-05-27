<?php

namespace Tests\Feature;

use Tests\TestCase;

class OrderTest extends TestCase
{

    private $order;
    private $customer;
    private $product;

    public function setUp(): void
    {
        parent::setUp();

        $this->product = $this->post('api/products',[ 'code' => '1234', 'description' => 'Test','unit_price'=>'2']);

        $this->customer = $this->post('api/customers',[ 'first_name' => 'John', 'last_name' => 'Doe']);

        $this->order = $this->post('api/orders',$this->validFields());

    }

    public function testListSingleOrder(){
        $response = $this->get('/api/orders/'.$this->order['id']);

        $response->assertStatus(200);
    }

    public function testListAllOrders(){

        $response = $this->get('/api/orders');

        $response->assertStatus(200);
    }

    public function testCreateNewOrderWithOrderItems(){
        $this->withoutExceptionHandling();
        $response = $this->post('api/orders',$this->validFields());

        $response->assertStatus(201);


        $this->get('/api/orders/'. $response["id"])
            ->assertStatus(200);

    }

    public function testToCreateNewOrderProductIdFieldIsRequired(){
        $response = $this->post('api/orders',$this->validFields(['items'=>['product_id'=>null,"quantity"=>1]]));

        $response->assertSessionHasErrors();

    }

    public function testToCreateNewOrderQuantityFieldIsRequired(){

        $response = $this->post('api/orders',$this->validFields(['items'=>['product_id'=>$this->product['id'],'quantity'=>null]]));

        $response->assertSessionHasErrors();

    }

    public function testUpdateOrderItems(){
        $this->withoutExceptionHandling();
        $response = $this->put('api/orders/' . $this->order['id'],
            $this->validFields([
                "items"=> [
                    [
                        "product_id" => $this->product['id'],
                        "order_item_id" => $this->order['orderItems'][0]['id'],
                        "quantity"=>3,
                    ]
                ]
            ]));

        $response->assertStatus(200);

        $this->get('/api/orders/'.$this->order['id'])
            ->assertSee(123);

    }

    public function testToUpdateOrderRequiredFieldIsOrderItemId(){
        $response = $this->put('api/orders/' . $this->order['id'],
            $this->validFields([
                "items"=> [
                    [
                        "quantity" => "2"
                    ]
                ]
            ]));

        $response->assertSessionHasErrors('items*order_item_id');

    }

    public function testDeleteOrderWithItems()
    {
        $response = $this->delete('api/products/' . $this->order['id']);

        $response->assertStatus(200);

        $this->get('/api/orders/'.$this->order['id'])->assertSee(null);
    }

    protected function validFields($overrides = []){

        return array_merge([
            "customer_id" => $this->customer['id'],
            "items" =>[
                [
                    "product_id" => $this->product['id'],
                    "quantity" => 2
                ],
            ]
        ],$overrides);
    }
}
