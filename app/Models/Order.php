<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
// DA IMPLEMENTARE IL FILLABLE DATO CHE ANCORA NON ABBIAMO FATTO LA CRUD DEGLI ORDINI :
    protected $guarded = [

    ];


    public function dishes()
    {
        return $this->belongsToMany(Dish::class)->withPivot('quantity');
    }
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
