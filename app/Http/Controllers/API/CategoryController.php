<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        $restaurantsCountByCategory = [];


        foreach ($categories as $category) {

            $restaurants = $category->restaurants;


            $restaurantsCountByCategory[] = ['name' => $category->name, 'times' => count($restaurants)];
        }

        return response()->json([
            'categories' => $categories,
            'restaurantsCountByCategory' => $restaurantsCountByCategory,
            'success' => true
        ]);
    }
}
