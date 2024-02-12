<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Dish;
use App\Models\DishOrder;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', '=', $user)->first();
        if ($restaurant) {
            $orders = Order::where('restaurant_id', '=', $restaurant->id)->get();
            return view('admin.orders.index', compact('orders'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', '=', $user)->first();
        if ($restaurant) {
            $dishes = Dish::where('restaurant_id', '=', $order->restaurant_id)->get();
            $quantities = DishOrder::where('order_id', '=', $order->id)->get();
            $dishesWithQuantities = [];
            foreach ($dishes as $dish) {
                $dishQuantity = $quantities->where('dish_id', $dish->id)->first();
            
                $dishesWithQuantities []= [
                    'name' => $dish->name,
                    'quantity' => $dishQuantity ? $dishQuantity->quantity : 0, 
                ];
            }
            return view('admin.orders.show', compact('order', 'dishesWithQuantities'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
