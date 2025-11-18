<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function hasProduct()
    {
        return $this->belongsTo(Product::class, 'product_slug', 'slug')->withTrashed();
    }

    public function hasCustomer()
    {
        return $this->hasOne(User::class, 'id', 'customer_id');
    }
    public function hasOrderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}
