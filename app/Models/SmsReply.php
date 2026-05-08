<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsReply extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function smsLog()
    {
        return $this->belongsTo(SmsLog::class);
    }
}
