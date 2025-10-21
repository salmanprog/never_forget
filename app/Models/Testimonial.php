<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Testimonial extends Model
{
    use HasFactory;
    protected $table = 'testimonials';
    public $timestamps = true;
    protected $fillable = array('name', 'designation', 'image', 'video', 'comment');
}
