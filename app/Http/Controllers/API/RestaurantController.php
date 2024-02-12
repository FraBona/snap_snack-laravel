<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $results = Restaurant::all()->load(['categories', 'user']);

        return response()->json([
            'restaurants' => $results,
            'success' => true
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        $restaurant->load(['categories', 'user']);

        $dishes = Dish::where('restaurant_id', $restaurant->id)->get();


        return response()->json([
            'restaurant' => $restaurant,
            'dishes' => $dishes,
            'success' => true
        ]);
    }

    public function get(Restaurant $restaurant)
    {

        return response()->json([
            'restaurant' => $restaurant,
            'success' => true
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function filter(Request $request)
    {
        $categories = $request->categories;
        $searchedRestaurant = $request->input('query', null);

        $query = Restaurant::query();

        foreach ($categories as $category) {
            $query->whereHas('categories', function ($query) use ($category) {
                $query->where('name', $category);
            });
        }

        if (!empty($searchedRestaurant)) {
            $query->where('name', 'LIKE', '%' . $searchedRestaurant . '%');
        }

        $filteredData = $query->with('categories')->get();

        return response()->json([
            'restaurants' => $filteredData,
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
