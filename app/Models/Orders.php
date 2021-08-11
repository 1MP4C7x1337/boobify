<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'model_name',
        'user_name',
        'service_name',
        'info',
        'price'
    ];
}
