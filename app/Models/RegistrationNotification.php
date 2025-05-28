<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationNotification extends Model
{
    protected $fillable = ['user_id', 'read'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 