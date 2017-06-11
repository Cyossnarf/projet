<?php

namespace App\Http\Controllers\Auth;

use App\Praticien;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Le champ en complément du mot de passe lors de l'authentification
	 */
	protected $username = 'ID_Prac';

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/utilisateur';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     *//*
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ID_Prac' => 'required|unique:Praticien',
			'SIH' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    }*/

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     *//*
    protected function create(array $data)
    {
        return Praticien::create([
            'ID_Prac' => $data['ID_Prac'],
			'SIH' => $data['SIH'],
			'Prénom' => 'A renseigner',
			'Nom' => 'A renseigner',
			'DateNaissance' => 'A renseigner',
            'password' => $data['password'],//bcrypt($data['password']),//Attention, il ne faut pas crypter 2 fois
			'admin' => isset($data['admin'])
        ]);
    }*/
}
