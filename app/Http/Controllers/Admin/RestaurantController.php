<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all();
        return view('admin.restaurant.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'address' => 'required|max:255|string',
            'phone_number' => 'required|max:30|string',
            'vat' => 'required|max:20|string',
            'photo' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'user_id' => 'nullable|exists:users,id'
        ]);
        $data = $request->all();
        $currentUser = Auth::user()->id;
        $arrayId = ['user_id' => $currentUser];
        $finalArray = array_merge($data, $arrayId);
        $new_restaurant = Restaurant::create($finalArray);
    
        return redirect()->route('admin.restaurant.show', $new_restaurant);
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurant.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
