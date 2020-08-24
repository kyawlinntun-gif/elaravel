<?php

namespace App;

use App\Category;
use App\Manufacture;
use App\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

    // OrderDetails
    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
