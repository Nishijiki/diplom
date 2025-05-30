<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestorRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'status'
    ];
} 