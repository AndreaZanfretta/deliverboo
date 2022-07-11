<?php

use Illuminate\Database\Seeder;
use App\Type;
use Illuminate\Support\Str;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Ristorante Italiano', 'Pizzeria', 'Kebab', 'Fast Food', 'Ristorante Giapponese', 'Ristorante Cinese', 'Sushi', 'Vegetariano', 'Vegano'];

        foreach($types as $type){
            $newType = new Type();

            $newType->name = $type;
            $newType->slug = Str::of($newType->name)->slug('-');

            $newType->save();

        }
    }
}
