<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    // Orders
    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
