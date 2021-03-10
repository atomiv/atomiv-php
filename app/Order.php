<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id','order_date'];

    public $timestamps = false;

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function calculateTotalPrice(){
        $total_price = 0;

        foreach ($this->orderItems as $item){
            $total_price += $item->quantity * $item->product_price;
        }
        return $total_price;

    }
}

