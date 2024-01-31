<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $restaurants = [
            [
                'name' => 'Ristorante Uno',
                'address' => 'Via Roma, 123',
                'phone_number' => '+39 123 456789',
                'vat' => 'Italiana',
                'photo' => 'https://example.com/ristorante_uno.jpg'
            ],
            [
                'name' => 'Cuisine Fusion',
                'address' => 'Street 456, City Center',
                'phone_number' => '+1 555 7890123',
                'vat' => 'Internazionale',
                'photo' => 'https://example.com/cuisine_fusion.jpg'
            ],
            [
                'name' => 'Sushi Time',
                'address' => '123 Sushi Street',
                'phone_number' => '+81 90 1234 5678',
                'vat' => 'Giapponese',
                'photo' => 'https://example.com/sushi_time.jpg'
            ],
            [
                'name' => 'Pizzeria Bella',
                'address' => 'Piazza del Popolo, 7',
                'phone_number' => '+39 333 444555',
                'vat' => 'Italiana',
                'photo' => 'https://example.com/pizzeria_bella.jpg'
            ],
            [
                'name' => 'Mexican Flavor',
                'address' => 'Avenida de los Tacos, 321',
                'phone_number' => '+52 55 6789 0123',
                'vat' => 'Messicana',
                'photo' => 'https://example.com/mexican_flavor.jpg'
            ],
            [
                'name' => 'Vegetarian Delight',
                'address' => 'Green Avenue, 789',
                'phone_number' => '+1 123 4567890',
                'vat' => 'Vegetariana',
                'photo' => 'https://example.com/vegetarian_delight.jpg'
            ],
            [
                'name' => 'Steakhouse Supreme',
                'address' => 'Prime Rib Road, 456',
                'phone_number' => '+1 987 6543210',
                'vat' => 'Grill',
                'photo' => 'https://example.com/steakhouse_supreme.jpg'
            ],
            [
                'name' => 'Seafood Haven',
                'address' => 'Oceanfront Drive, 567',
                'phone_number' => '+44 20 1234 5678',
                'vat' => 'Frutti di mare',
                'photo' => 'https://example.com/seafood_haven.jpg'
            ],
            [
                'name' => 'Café de Paris',
                'address' => 'Rue de la Croissant, 890',
                'phone_number' => '+33 1 2345 6789',
                'vat' => 'Francese',
                'photo' => 'https://example.com/cafe_de_paris.jpg'
            ],
            [
                'name' => 'Indian Spyce Hub',
                'address' => 'Curry Lane, 123',
                'phone_number' => '+91 80 9876 5432',
                'vat' => 'Indiana',
                'photo' => 'https://example.com/indian_spice_hub.jpg'
            ]
        ];

        $category = Category::all();
        $categoryIds = $category->pluck('id');

        foreach($restaurants as $restaurant){
            $new_restaurant = new Restaurant();

            $new_restaurant->name = $restaurant['name'];
            $new_restaurant->address = $restaurant['address'];
            $new_restaurant->phone_number = $restaurant['phone_number'];
            $new_restaurant->vat = $restaurant['vat'];
            $new_restaurant->photo = $restaurant['photo'];

            $new_restaurant->save();
            $new_restaurant->categories()->attach($faker->randomElements($categoryIds, null));
        }
    }
}
