<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        return response()->json([
            'restaurant' => $restaurant,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function filter(Request $request)
    {

        $categories = $request->categories;

        $filteredData = Restaurant::whereHas('categories', function ($query) use ($categories) {
            $query->whereIn('name', $categories);
        }, '=', count($categories))->with('categories')
            ->get();

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
