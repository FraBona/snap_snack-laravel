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
                'name' => 'Hamburger',
                'description' => 'Scopri la perfezione del gusto con i nostri hamburger: carne succulenta, condimenti freschi e panini irresistibili. Soddisfa la tua fame con la nostra varietà di creazioni, dalle classiche alle opzioni gourmet.'
            ],
            [
                'name' => 'Italiano',
                'description' => "Un viaggio attraverso l'Italia con ogni morso. Dalla pasta alle pizze, offriamo autentici piatti italiani preparati con ingredienti freschi e amore per la tradizione."
            ],
            [
                'name' => 'Fritti',
                'description' =>    "Croccantezza in ogni boccone! Dalle patatine alle mozzarelle, deliziamo il tuo palato con una selezione irresistibile di fritti."
            ],
            [
                'name' => 'Kebab',
                'description' => "Esplora i sapori orientali autentici con i nostri kebab. Carne marinata, verdure fresche e salse deliziose per un'esperienza culinaria unica."
            ],
            [
                'name' => 'Arancini',
                'description' => "Arancini perfetti per uno spuntino sfizioso. Sperimenta la tradizione siciliana con i nostri bocconi di riso farciti con sapori ricchi e avvolgenti."
            ],
            [
                'name' => 'Pizza',
                'description' => "Pizze artigianali per ogni gusto. Dalla classica Margherita a combinazioni gourmet, ogni pizza è un'esplosione di freschezza e sapori italiani."
            ],
            [
                'name' => 'Sushi',
                'description' =>     "Sushi fresco e artistico, pronto per deliziare il tuo palato. Dai tradizionali nigiri ai roll moderni, ogni pezzo è una festa di sapori giapponesi."
            ],
            [
                'name' => 'Spesa',
                'description' =>     "Semplifica la tua vita quotidiana ordinando da noi. Dalla spesa generale ai prodotti freschi, offriamo una vasta gamma di opzioni per le tue esigenze, consegnate comodamente a casa tua."
            ],

        ];

           foreach($categories as $category) {

                $new_category = new Category();

                $new_category->name = $category['name'];
                $new_category->description = $category['description'];


                $new_category->save();

           }
    }
}
