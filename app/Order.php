<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id'];
    public $timestamps = false;

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}

