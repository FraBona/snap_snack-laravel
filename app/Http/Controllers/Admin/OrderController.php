<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Dish;
use App\Models\DishOrder;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Client\Request;
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
            $orderAmount = [];
            foreach($orders as $order) {
                $dishes = Dish::where('restaurant_id', '=', $order->restaurant_id)->get();
                $quantities = DishOrder::where('order_id', '=', $order->id)->get();
                $amount = 0;
                $totalAmount = 0;
                foreach ($dishes as $dish) {
                    // Query per recuperare il piatto associato a questo ordine specifico
                    $singleDishOrder = DishOrder::where('order_id', '=', $order->id)
                                                 ->where('dish_id', '=', $dish->id)
                                                 ->first();
                    // Ottieni la quantità del piatto se esiste un ordine per questo piatto
                    $dishQuantity = $singleDishOrder ? $singleDishOrder->quantity : 0;

                    $amount = ($dish->price * $dishQuantity);
                    $totalAmount += $amount;
                    $orderAmount[] = [
                        'order' => $order,
                        'amount' => $totalAmount,
                    ];
                }
            }
            //dd($dishesWithQuantities);
            return view('admin.orders.index', compact('orders', 'orderAmount'));
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
            $amount = 0;
            $totalAmount = 0;
            foreach ($dishes as $dish) {
                // Query per recuperare il piatto associato a questo ordine specifico
                $singleDishOrder = DishOrder::where('order_id', '=', $order->id)
                                             ->where('dish_id', '=', $dish->id)
                                             ->first();
        
                // Ottieni il nome del piatto se esiste un ordine per questo piatto
                $dishName = $singleDishOrder ? $dish : 'errore';
        
                // Ottieni la quantità del piatto se esiste un ordine per questo piatto
                $dishQuantity = $singleDishOrder ? $singleDishOrder->quantity : 0;

                $amount = ($dish->price * $dishQuantity);
                $totalAmount += $amount;
        
                // Aggiungi il piatto con il nome e la quantità all'array $dishesWithQuantities
                $dishesWithQuantities[] = [
                    'name' => $dishName,
                    'quantity' => $dishQuantity,
                ];
            }
            if($totalAmount != $order->amount){
                return view('admin.errors.amount');
            }
            return view('admin.orders.show', compact('order', 'dishesWithQuantities', 'totalAmount'));
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
