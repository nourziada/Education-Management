<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/system-dashboard/';

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
            'name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users',
            'mobile' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'civil_registry' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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

        if(isset($data['management']))
        {
            $management = $data['management'];
        }else
        {
            $management = null;
        }

        if(isset($data['department']))
        {
            $department = $data['department'];
        }else
        {
            $department = null;
        }


        return User::create([
            'name' => $data['name'],
            'account_type' => $data['account_type'],
            'user_name' => $data['user_name'],
            'management' => $management,
            'department' => $department,
            'sefa' => $data['sefa'],
            'mobile' => $data['mobile'],
            'phone' => $data['phone'],
            'mail' => "",
            'civil_registry' => $data['civil_registry'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
