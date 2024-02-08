<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', '=', $user)->first();
        if ($restaurant) {
            $dishes = Dish::where('restaurant_id', '=', $restaurant->id)->get();
            return view('admin.dishes.index', compact('dishes'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dishes.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', '=', $user)->first();
        $request->validate([
            'name' => 'required|regex:/[a-zA-Z\s]+/|min:4|max:30|string',
            'description' => 'required|min:10|max:255|string',
            'price'=> 'required|numeric|between:0,9999.99',
            'visible' => 'boolean',
            'photo' => 'nullable|image|mimes:jpeg,png,pdf|max:2048',
            'restaurant_id' => 'exists:restaurants,id'
        ]);
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $file_path = Storage::put('images', $request->photo);
            $data['photo'] = $file_path;
        }
        $arrayId = ['restaurant_id' => $restaurant->id];
        $finalArray = array_merge($data, $arrayId);
        $new_dish = Dish::create($finalArray);

        return redirect()->route('admin.dishes.show', $new_dish);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $request->validate([
            'name' => 'required|regex:/[a-zA-Z\s]+/|min:4|max:30|string',
            'description' => 'required|min:20|max:255|string',
            'price'=> 'required|numeric|between:0,9999.99',
            'visible' => 'boolean',
            'photo' => 'nullable|image|mimes:jpeg,png,pdf|max:2048',
            'restaurant_id' => 'exists:restaurants,id'
        ]);

        $data = $request->all();
        if ($request->hasFile('photo')) {
            $file_path = Storage::put('images', $request->photo);
            $data['photo'] = $file_path;
        }
        $dish->update($data);

        return redirect()->route('admin.dishes.show', $dish);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish = Dish::find($dish->id);
        $dish->delete();

        return redirect()->route('admin.dishes.index');
    }
}
