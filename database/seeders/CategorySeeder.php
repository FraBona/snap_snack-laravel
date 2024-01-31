<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Italiana',
                'description' => 'Ristoranti che offrono piatti della cucina italiana.'
            ],
            [
                'name' => 'Internazionale',
                'description' => 'Ristoranti con una varietà di piatti internazionali.'
            ],
            [
                'name' => 'Giapponese',
                'description' => 'Ristoranti specializzati in cucina giapponese, sushi e sashimi.'
            ],
            [
                'name' => 'Messicana',
                'description' => 'Ristoranti che servono piatti della cucina messicana.'
            ],
            [
                'name' => 'Vegetariana',
                'description' => 'Ristoranti con opzioni vegetariane e vegane.'
            ],
            [
                'name' => 'Grill',
                'description' => 'Ristoranti specializzati in grigliate e carne alla brace.'
            ],
            [
                'name' => 'Frutti di mare',
                'description' => 'Ristoranti che offrono una selezione di piatti a base di frutti di mare.'
            ],
            [
                'name' => 'Francese',
                'description' => 'Ristoranti con cucina francese e specialità gastronomiche.'
            ],
            [
                'name' => 'Caffetteria',
                'description' => 'Luoghi accoglienti per gustare caffè, dolci e piccoli pasti.'
            ],
            [
                'name' => 'Pasticceria',
                'description' => 'Ristoranti specializzati in dolci, torte e prelibatezze da forno.'
            ]
        ];

           foreach($categories as $category) {

                $new_category = new Category();

                $new_category->name = $category['name'];
                $new_category->description = $category['description'];

                $new_category->save();

           }
    }
}
