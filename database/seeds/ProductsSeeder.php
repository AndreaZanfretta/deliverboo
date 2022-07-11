<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['crispy', 'burger', 'kebab', 'margherita', 'riso cantonese'];
        $description = ['panino crispy', 'hamburger', 'panino kebab nop scipolla', 'pizza margherita', 'riso cantonese'];
        $price = [10.50, 8.30, 3.50, 6.00, 4.00];

        for($i=0; $i < 5; $i++){
            $newProduct = new Product();

            $newProduct->name = $name[$i];
            $newProduct->description = $description[$i];
            $newProduct->price = $price[$i];
            $newProduct->user_id = ($i+1);

            $newProduct->save();
        }
    }
}
