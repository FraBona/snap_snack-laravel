<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', '=', $user)->first();
        $categories = Category::all();
        if ($restaurant) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.restaurant.create', compact('user', 'restaurant', 'categories'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', '=', $user)->first();
        if ($restaurant) {
            return redirect()->route('admin.dashboard');
        } else {
            $request->validate([
                'name' => 'required|regex:/[a-zA-Z\s]+/|min:3|max:30|string',
                'address' => 'required|min:10|max:255|string',
                'phone_number' => 'required|regex:/[0-9]+/|min:6|max:30|string',
                'vat' => 'required|max:11|min:11|string',
                'photo' => 'nullable|image|mimes:jpeg,png,pdf|max:2048',
                'user_id' => 'nullable|exists:users,id',
                'categories' => 'exists:categories,id'
            ]);
            $data = $request->all();




            $data['slug'] = Str::slug($data['name'], '-');
            if ($request->hasFile('photo')) {
                $file_path = Storage::put('images', $request->photo);
                $data['photo'] = $file_path;
            }
            $currentUser = Auth::user()->id;
            $arrayId = ['user_id' => $currentUser];
            $finalArray = array_merge($data, $arrayId);


            $new_restaurant = Restaurant::create($finalArray);


            if ($request->has('category')) {
                $new_restaurant->categories()->sync($finalArray['category']);
            }

            return redirect()->route('admin.restaurant.show', $new_restaurant);
        }
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
