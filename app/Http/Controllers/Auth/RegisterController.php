<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Plan;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        if(!request()->query('plan'))
            return view('auth.register');
        else{
            $plan = Plan::where('name', request()->query('plan'))->first();
            if($plan){
                return view('auth.register', [
                    'plan' => $plan
                ]);
            }
            else
                return back();
        }
            
    }

    public function registerSaleUser()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $name = explode(' ', strtolower(request('name')));

        $n = collect($name);

        $user = User::create([
            'username' => uniqid(),
            'email' => strtolower(request('email')) ,
            'password' => bcrypt(request('password')),
            'first_name' => ucfirst($n->first()),
            'last_name' => ucfirst($n->last()),
            'plan' => request('plan')
        ]);

        $user->profile()->create([]);
        $user->account()->create([]);


        \Auth::login($user);

        return redirect()->route('home');


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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
