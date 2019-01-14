<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryStatus extends Model
{
    protected $table = 'delivery_status';
    
    protected $fillable = [
        'name'
    ];
}
