<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentSearch extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type',
        'document_number',
        'document_date',
        'keywords',
        'user_ip',
        'status',
    ];

    protected $casts = [
        'document_date' => 'date',
    ];
} 