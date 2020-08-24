<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // Orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
