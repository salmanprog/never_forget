<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function hasOrderDetail()
    {
        return $this->hasOne(OrderDetail::class, 'order_id','product_slug');
    }
    
    public function hasCustomer()
    {
        return $this->hasOne(User::class, 'id', 'customer_id');
    }

    public function hasQuestion(){
        return $this->hasOne(Question::class, 'product_slug', 'slug');
    }

    public function hasSoldQuantity(){
        return $this->hasMany(OrderDetail::class, 'product_slug', 'slug');
    }

	/* public function hasPurchasedTickets()
    {
        return $this->hasMany(Ticket::class, 'product_id', 'id')->where('customer_id', Auth::user()->id);
    } */
    public function hasCategory()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function hasSoldTickets()
    {
        return $this->hasMany(Ticket::class, 'product_id', 'id');
    }
    public function hasTotalTicketsSold()
    {
        return $this->hasMany(Ticket::class, 'product_id', 'id');
    }

    public function variations()
    {
        return $this->hasMany(Variations::class);
    }
}

