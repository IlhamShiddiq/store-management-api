<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'store',
        'whatsapp_number',
        'last_active',
        'description',
        'rating',
        'region'
    ];
}
