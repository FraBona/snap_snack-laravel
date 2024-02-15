<?php

namespace App\Models;

use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'description',
        'phone_number',
        'vat',
        'photo',
        'user_id',
        'slug',
        'visible'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function orders()
    {

        return $this->belongsTo(Order::class);
    }
    public function dishes()
    {

        return $this->hasMany(Dish::class);
    }
}
