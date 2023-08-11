<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\RegisterRequest;

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
     * Create a new user instance after a valid registration.
     * @param RegisterRequest $request
     * @return \App\Models\User
     */
    protected function create(array $request)
    {
        $validate = $request->validated();

        return User::create([
            'name' => $validate['name'],
            'lastname' => $validate['lastname'],
            'email' => $validate['email'],
            'birthday' => $validate['birthday'],
            'password' => Hash::make($validate['password']),
        ]);
    }
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = $this->create($validated);

    }
}
