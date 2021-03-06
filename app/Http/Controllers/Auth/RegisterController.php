<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:100'],
            'piva' => ['required', 'string', 'min:13', 'max:13', 'regex:/^[A-Z]{2}[0-9]{11}$/'],
            'types' => ['required'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $newUser = new User();
        $slug = $this->getSlug($data['name']);
        $newUser->name = $data['name'];
        $newUser->email = $data['email'];
        $newUser->password = Hash::make($data['password']);
        $newUser->address = $data['address'];
        $newUser->piva = $data['piva'];
        $newUser->slug = $slug;

        $newUser->save();

        $newUser->types()->sync($data['types']);
        return $newUser;
        
        /* return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'piva' => $data['piva'],
            'slug' => $slug,
            /* $this->store($data),
        ]); */
    }

    private function getSlug($title)
    {
        $slug = Str::of($title)->slug("-");
        $count = 1;

        // Prendi il primo post il cui slug ?? uguale a $slug
        // se ?? presente allora genero un nuovo slug aggiungendo -$count
        while( User::where("slug", $slug)->first() ) {
            $slug = Str::of($title)->slug("-") . "-{$count}";
            $count++;
        }

        return $slug;
    }

    
}
