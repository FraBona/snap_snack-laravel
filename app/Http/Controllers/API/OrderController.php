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
        try {
            $request->validate([
                'restaurant_id' => 'required|integer', 
                'customer_name' => 'required|regex:/[a-zA-Z\s]+/|min:3|max:30|string',
                'customer_last_name' => 'required|regex:/[a-zA-Z\s]+/|min:3|max:30|string',
                'customer_address' => 'required|min:10|max:255|string',
                'customer_email' => 'required|email',
                'amount' => 'required|numeric|between:0.5,9999.99',
                'dishes' => 'required|array', 
                'dishes.*.dish_id' => 'required|integer',
                'dishes.*.quantity' => 'required|integer|min:1|max:100'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Errore di validazione',
                'errors' => $e->errors()
            ], 422);
        }
    

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
