<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    // public function index(){
    //     return Order::with('dishes')->get();
    // }
    public function store(Request $request)
    {
        $order = Order::create($request->except('dishes'));

        $dishes = $request->input('dishes');

        foreach($dishes as $dish){
            // Aggiungi il piatto all'ordine utilizzando il metodo attach()
            $order->dishes()->attach($dish['dish_id'], ['quantity' => $dish['quantity']]);
        }

        // Ora che i piatti sono stati associati all'ordine, puoi ritornare il risultato
        return response()->json([
            'order' => $order,
            'dishes' => $dishes
        ]);
    }
}
