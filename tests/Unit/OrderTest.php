<?php

namespace Tests\Unit;

use App\Order;
use App\OrderItem;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
   public function testOrderTotalPrice(){
       $order = new Order();

       $firstItem = new OrderItem();
       $firstItem->product_price = 12.50;
       $firstItem->quantity = 2;

       $secondItem = new OrderItem();
       $secondItem->product_price = 25.00;
       $secondItem->quantity = 3;

       $order->orderItems = [$firstItem,$secondItem];

       $this->assertEquals(100,$order->calculateTotalPrice());
   }
}
