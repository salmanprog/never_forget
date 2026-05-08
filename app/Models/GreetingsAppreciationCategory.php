<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GreetingsAppreciationCategory extends Model
{
    use HasFactory;

    protected $table = 'greetings_appreciation_category';

    protected $guarded = ['id'];

    protected $casts = [
        'is_other' => 'boolean',
    ];
}
