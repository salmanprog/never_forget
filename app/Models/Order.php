<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    /* public function hasOrderDetail()
    {
        return $this->hasOne(OrderDetail::class, 'order_id','id');
    } */
    public function hasOrderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id','id');
    }
    
    public function hasTicketsDetail()
    {
        return $this->hasMany(Ticket::class, 'order_id','id');
    }
    public function hasAnswerDetail()
    {
        return $this->hasOne(Option::class, 'question_id','id');
    }
    public function hasCustomer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    
    public function hasRegisteredCustomer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function hasOrderTickets()
    {
        return $this->hasMany(Ticket::class, 'order_id', 'id');
    }

    public function hasBillingAddress()
    {
        return $this->hasOne(BillingAddress::class, 'id', 'billing_address_id');
    }

    public function hasShippingAddress()
    {
        return $this->hasOne(ShippingAddress::class, 'customer_id', 'customer_id');
    }

    public function hasProduct()
    {
        return $this->hasOne(Product::class, 'slug', 'product_slug');
    }

    public function products()
    {
        return $this->hasManyThrough(
            Product::class, 
            OrderDetail::class, 
            'order_id', // Foreign key on the OrderDetail model...
            'slug', // Foreign key on the Product model...
            'id', // Local key on the Order model...
            'product_slug' // Local key on the OrderDetail model...
        );
    }
}
