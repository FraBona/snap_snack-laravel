<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
                'customer_phone' => 'required|regex:/[0-9]+/|min:9|max:10|string',
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

        foreach ($dishes as $dish) {
            // Aggiungi il piatto all'ordine utilizzando il metodo attach()
            $order->dishes()->attach($dish['dish_id'], ['quantity' => $dish['quantity']]);
        }
        // Ora che i piatti sono stati associati all'ordine, puoi ritornare il risultato
        return response()->json([
            'order' => $order,
            'dishes' => $dishes
        ]);
    }

    public function savePaymentData(Request $request)
    {
        $error = false;
        $amount = 0;

        foreach ($request->input('chest') as $dish) {
            $dish_data = [
                'dish_id' => $dish['id'],
                'quantity' => $dish['counter'],
            ];

            $dish_validation_rules = [
                'dish_id' => 'required|integer',
                'quantity' => 'required|integer',
            ];

            $cart_validation = Validator::make($dish_data, $dish_validation_rules);

            if ($cart_validation->fails()) {
                $error = true;
                break; // Se c'è un errore, interrompi il ciclo
            } else {
                // Se non ci sono errori, calcola l'importo totale
                $dish = Dish::find($dish_data['dish_id']);
                $dish_price = $dish->price;
                $dish_quantity = $dish_data['quantity'];
                $amount += ($dish_price * $dish_quantity);
            }
        }

        // Dati dell'utente
        $user_data = [
            'customer_name' => $request->input('user')['firstName'],
            'customer_last_name' => $request->input('user')['lastName'],
            'customer_email' => $request->input('user')['email'],
            'customer_address' => $request->input('user')['address'],
            'customer_phone' => $request->input('user')['phoneNumber'],
            'restaurant_id' => $request->input('chest')[0]['restaurant_id'],
            'amount'  => $amount,
            
        ];


        $user_validation_rules = [
            'restaurant_id' => 'required|integer',
            'customer_name' => 'required|regex:/[a-zA-Z\s]+/|min:3|max:30|string',
            'customer_last_name' => 'required|min:3|max:255|string',
            'customer_address' => 'required|min:5|max:255|string',
            'customer_email' => 'required|email|min:5|max:255|',
            'customer_phone' => 'required|min:10|max:10',
            'amount' => 'required|numeric',

        ];

        $user_validation = Validator::make($user_data, $user_validation_rules);

        if ($user_validation->fails()) {
            $error = true;
        }

        if (!$error) {
            $order = Order::create($user_data);
            foreach ($request->input('chest') as $dish) {
                $currentDish = Dish::find($dish['id']);
                $order->dishes()->attach($currentDish['id'], ['quantity' => $dish['counter']]);
            }
        }

        return response()->json([
            'error' => $error,
        ]);
    }
    //->except('dishes')
}
