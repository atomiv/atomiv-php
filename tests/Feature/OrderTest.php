<?php

namespace Tests\Feature;

use App\Customer;
use App\Order;
use App\OrderItem;
use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    private $order;
    private $customer;

    public function setUp(): void
    {
        parent::setUp();

        factory(Product::class,5)->create();

        $customer = factory(Customer::class)->create();

        $this->order = factory(Order::class)->create(['customer_id' => $customer->id]);

        $this->order->orderItems()->createMany(
            factory(OrderItem::class, 3)->make()->toArray()
        );

    }


    public function testListSingleOrder(){

        $response = $this->get('/api/orders/'.$this->order->id);

        $response->assertStatus(200);
    }

    public function testListAllOrders(){

        $response = $this->get('/api/orders');

        $response->assertStatus(200);
    }

    protected function validFields($overrides){

        return array_merge([
            "customer_id" => $this->customer->id,
            "items" =>[
                [
                    "order_item_id" => 2,
                    "product_id" => 1,
                    "quantity" => 2
                ]
            ]
        ],$overrides);
    }
}
