<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['McDonalds', 'Burger King', 'Pizzeria-Kebab', 'Pizzeria da Lino', 'Ristorante Lin'];
        $email = ['mcdonalds@gmail.com', 'burgerking@gmail.com', 'kebabbaro@gmail.com', 'lino@gmail.com', 'lin@gmail.com'];
        $password = ['aaaa', 'bbbb', 'cccc', 'dddd', 'eeee'];
        $address = ['via pinco, 10', 'via pallo, 30', 'via nazionale, 5', 'via roma, 34', 'via stazione, 3'];
        $piva = ['IT86334519757', 'IT86334519758', 'IT86334519759', 'IT86334519750', 'IT86334519754'];

        for($i = 0; $i <5; $i++){
            $newUser = new User();

            $newUser->name = $name[$i];
            $newUser->email = $email[$i];
            $newUser->password = $password[$i];
            $newUser->address = $address[$i];
            $newUser->piva = $piva[$i];
            $newUser->slug = Str::of($newUser->name)->slug('-');

            $newUser->save();
        }
    }
}
