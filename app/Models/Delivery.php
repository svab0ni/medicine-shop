<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'deliveries';

    protected $fillable = [
        'price',
        'note',
        'user_id',
        'address',
        'courier_id',
        'status_id'
    ];

    public function courier()
    {
        return $this->belongsTo(User::class, 'courier_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class);
    }

    public function status()
    {
        return $this->belongsTo(DeliveryStatus::class, 'status_id');
    }
}
