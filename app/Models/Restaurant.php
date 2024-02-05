<?php

namespace App\Models;

use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = [
        'categories'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function users()
    {

        return $this->belongsTo(User::class);
    }

    public function orders()
    {

        return $this->belongsTo(Order::class);
    }
    public function dish()
    {

        return $this->hasMany(Dish::class);
    }
}
