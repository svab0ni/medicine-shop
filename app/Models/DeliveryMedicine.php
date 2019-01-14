<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryMedicine extends Model
{
    protected $table = 'delivery_medicine';

    protected $fillable = [
        'medicine_id',
        'delivery_id',
        'quantity',
        'price'
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id');
    }
}
