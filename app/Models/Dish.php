<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'photo',
        'restaurant_id',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
