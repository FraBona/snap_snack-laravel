<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $dishes = [
            [
                'name' => 'Pasta alla Carbonara',
                'description' => 'Spaghetti con uovo, pancetta, pecorino e pepe nero.',
                'price' => 12.99,
                'visible' => true,
                'photo' => 'https://example.com/pasta_carbonara.jpg'
            ],
            [
                'name' => 'Pizza Margherita',
                'description' => 'Pizza con pomodoro, mozzarella e basilico fresco.',
                'price' => 10.99,
                'visible' => true,
                'photo' => 'https://example.com/pizza_margherita.jpg'
            ],
            [
                'name' => 'Sushi Misto',
                'description' => 'Assortimento di sushi e sashimi freschi.',
                'price' => 18.99,
                'visible' => true,
                'photo' => 'https://example.com/sushi_misto.jpg'
            ],
            [
                'name' => 'Insalata Caesar',
                'description' => 'Lattuga romana, crostini, parmigiano, salsa Caesar.',
                'price' => 8.99,
                'visible' => true,
                'photo' => 'https://example.com/insalata_caesar.jpg'
            ],
            [
                'name' => 'Bistecca Grigliata',
                'description' => 'Bistecca di manzo grigliata con contorno di verdure.',
                'price' => 24.99,
                'visible' => true,
                'photo' => 'https://example.com/bistecca_grigliata.jpg'
            ],
            [
                'name' => 'Tiramisù',
                'description' => 'Dolce italiano con savoiardi, caffè, mascarpone e cacao.',
                'price' => 6.99,
                'visible' => true,
                'photo' => 'https://example.com/tiramisu.jpg'
            ],
            [
                'name' => 'Pad Thai',
                'description' => 'Noodles di riso con gamberi, pollo, arachidi e lime.',
                'price' => 14.99,
                'visible' => true,
                'photo' => 'https://example.com/pad_thai.jpg'
            ],
            [
                'name' => 'Cannoli Siciliani',
                'description' => 'Dolce siciliano con ricotta, cioccolato e scorza d\'arancia.',
                'price' => 9.99,
                'visible' => true,
                'photo' => 'https://example.com/cannoli_siciliani.jpg'
            ],
            [
                'name' => 'Hamburger BBQ',
                'description' => 'Hamburger con bacon, formaggio cheddar, lattuga e salsa BBQ.',
                'price' => 11.99,
                'visible' => true,
                'photo' => 'https://example.com/hamburger_bbq.jpg'
            ],
            [
                'name' => 'Gelato al Cioccolato',
                'description' => 'Gelato cremoso al cioccolato belga.',
                'price' => 5.99,
                'visible' => true,
                'photo' => 'https://example.com/gelato_cioccolato.jpg'
            ]
        ];
        $restaurant = Restaurant::all();
        // $restaurantIds = $restaurant->pluck('id');

        foreach ($dishes as $dish) {

            $new_dish = new Dish();

            $new_dish->name = $dish['name'];
            $new_dish->description = $dish['description'];
            $new_dish->price = $dish['price'];
            $new_dish->visible = $dish['visible'];
            $new_dish->photo = $dish['photo'];
            $new_dish->restaurant_id = $restaurant->random()->id;

            $new_dish->save();

            // $new_dish->restaurants()->attach($faker->randomElements($restaurantIds, null));

        }
    }
}
