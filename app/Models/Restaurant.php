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

    public function categories(){
        return $this->belongsToMany(Category::class,'category_restaurant', 'category_id', 'restaurant_id');
    }
    public function users() {

        return $this->belongsTo(User::class);
    }

    public function orders() {

        return $this->belongsTo(Order::class);
    }
    public function dishes() {

        return $this->belongsTo(Dish::class);
    }
}
