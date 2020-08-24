<?php

namespace App;

use App\Order;
use App\Product;
use App\Customer;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // Customers
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Products
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
