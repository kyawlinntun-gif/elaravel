<?php

namespace App;

use App\Payment;
use App\Customer;
use App\Shipping;
use App\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Customers
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Shippings
    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    // Payments
    public function payments()
    {
        return $this->belongsToMany(Payment::class);
    }

    // OrderDetails
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
