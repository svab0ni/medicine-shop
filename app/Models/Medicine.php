<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'published_at',
        'is_published',
        'short_text',
        'long_text',
        'creator_id',
        'category_id',
        'company_id',
        'image_url',
        'price'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function deliveries()
    {
        return $this->belongsToMany(Delivery::class);
    }
}
