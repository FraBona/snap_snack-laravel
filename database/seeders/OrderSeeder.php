<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $ordersArray = [
        [
            'customer_name' => 'John',
            'customer_last_name' => 'Doe',
            'customer_phone' => '123-456-7890',
            'customer_address' => '123 Main St',
            'customer_email' => 'john.doe@example.com',
            'amount' => 25.99,
        ],
        [
            'customer_name' => 'Jane',
            'customer_last_name' => 'Smith',
            'customer_phone' => '987-654-3210',
            'customer_address' => '456 Oak St',
            'customer_email' => 'jane.smith@example.com',
            'amount' => 32.50,
        ],
        // Add more orders...
        [
            'customer_name' => 'Alice',
            'customer_last_name' => 'Johnson',
            'customer_phone' => '555-123-4567',
            'customer_address' => '789 Pine St',
            'customer_email' => 'alice.johnson@example.com',
            'amount' => 18.75,
        ],
        [
            'customer_name' => 'Bob',
            'customer_last_name' => 'Williams',
            'customer_phone' => '444-789-0123',
            'customer_address' => '101 Elm St',
            'customer_email' => 'bob.williams@example.com',
            'amount' => 42.95,
        ],
        // Add more orders...
        [
            'customer_name' => 'Eva',
            'customer_last_name' => 'Miller',
            'customer_phone' => '777-888-9999',
            'customer_address' => '222 Maple St',
            'customer_email' => 'eva.miller@example.com',
            'amount' => 15.25,
        ],
        [
            'customer_name' => 'David',
            'customer_last_name' => 'Brown',
            'customer_phone' => '333-555-7777',
            'customer_address' => '505 Cedar St',
            'customer_email' => 'david.brown@example.com',
            'amount' => 28.75,
        ],
    ];

    $dish = Dish::all();
    $dishIds = $dish->pluck('id');
    $restaurant = Restaurant::all();
    $restaurantIds = $restaurant->pluck('id');

        foreach ($ordersArray as $order) {
            $new_order = new Order();

            $new_order->customer_name = $order['customer_name'];
            $new_order->customer_last_name = $order['customer_last_name'];
            $new_order->customer_phone = $order['customer_phone'];
            $new_order->customer_address = $order['customer_address'];
            $new_order->customer_email = $order['customer_email'];
            $new_order->amount= $order['amount'];
            $new_order->restaurant_id = $faker->randomElement($restaurantIds);

            $new_order->save();
            $new_order->dishes()->attach($faker->randomElements($dishIds, null));
    }
}   

}
