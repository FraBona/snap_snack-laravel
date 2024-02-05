<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
                'name' => 'Hanami Sushi',
                'address' => $faker->streetAddress(),
                'phone_number' => $faker->phoneNumber(),
                'vat' => $faker->vat(),
                'photo' => 'https://i.ibb.co/6RJ7cqD/sushi-2.webp'
            ],
            [
                'name' => 'Yuzu Sushi',
                'address' => $faker->streetAddress(),
                'phone_number' => $faker->phoneNumber(),
                'vat' => $faker->vat(),
                'photo' => 'https://i.ibb.co/5xCw9my/sushi.webp'
            ],
            [
                'name' => 'Il Grottino',
                'address' => $faker->streetAddress(),
                'phone_number' => $faker->phoneNumber(),
                'vat' => $faker->vat(),
                'photo' => 'https://i.ibb.co/vJfHN98/pizza-2.jpg'
            ],
            [
                'name' => 'Antica Santa Lucia',
                'address' => $faker->streetAddress(),
                'phone_number' => $faker->phoneNumber(),
                'vat' => $faker->vat(),
                'photo' => 'https://i.ibb.co/KVyCy24/pizza.webp'
            ],
            [
                'name' => 'Ke Palle',
                'address' => $faker->streetAddress(),
                'phone_number' => $faker->phoneNumber(),
                'vat' => $faker->vat(),
                'photo' => 'https://i.ibb.co/7y2mYcC/arancini.webp'
            ],
            [
                'name' => 'Soul Kitchen',
                'address' => $faker->streetAddress(),
                'phone_number' => $faker->phoneNumber(),
                'vat' => $faker->vat(),
                'photo' => 'https://i.ibb.co/TbfCCHS/kebab.webp'
            ],
            [
                'name' => 'Semu Fritti',
                'address' => $faker->streetAddress(),
                'phone_number' => $faker->phoneNumber(),
                'vat' => $faker->vat(),
                'photo' => 'https://i.ibb.co/3zdsdK7/fritti.jpg'
            ],
            [
                'name' => 'Mastro Ciccio',
                'address' => $faker->streetAddress(),
                'phone_number' => $faker->phoneNumber(),
                'vat' => $faker->vat(),
                'photo' => 'https://i.ibb.co/f826Xjc/italiano.webp'
            ],
            [
                'name' => 'Jumpa',
                'address' => $faker->streetAddress(),
                'phone_number' => $faker->phoneNumber(),
                'vat' => $faker->vat(),
                'photo' => 'https://i.ibb.co/ZY9f2Wf/hamburger.webp'
            ],
            [
                'name' => 'Ipercoop',
                'address' => $faker->streetAddress(),
                'phone_number' => $faker->phoneNumber(),
                'vat' => $faker->vat(),
                'photo' => 'https://i.ibb.co/sCQXV1W/spesa-2.webp'
            ],
            [
                'name' => 'Esselunga',
                'address' => $faker->streetAddress(),
                'phone_number' => $faker->phoneNumber(),
                'vat' => $faker->vat(),
                'photo' => 'https://i.ibb.co/8bFdz4s/spesa.jpg'
            ]
        ];

        $category = Category::all();
        $categoryIds = $category->pluck('id');
        $user = User::all();
        $userIds = $user->pluck('id');

        function getUniqueUserId($userIds, $usedUserIds, $faker)
        {

            do {
                $userId = $faker->randomElement($userIds);
            } while (in_array($userId, $usedUserIds));

            $usedUserIds[] = $userId;

            return $userId;
        }

        $data = [];

        foreach ($restaurants as $restaurant) {
            $new_restaurant = new Restaurant();

            $new_restaurant->name = $restaurant['name'];
            $new_restaurant->slug = Str::slug($new_restaurant->name, '-');
            $new_restaurant->address = $restaurant['address'];
            $new_restaurant->phone_number = $restaurant['phone_number'];
            $new_restaurant->vat = $restaurant['vat'];
            $new_restaurant->photo = $restaurant['photo'];
            $new_restaurant->user_id = getUniqueUserId($userIds, $data, $faker);

            $new_restaurant->save();
            $new_restaurant->categories()->attach($faker->randomElements($categoryIds, null));
        }
    }
}
