<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Auth;
use App\Mail\RegistrationConfirmation;
use Illuminate\Support\Facades\Mail;

use Session;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'contact' => ['required'],
            'email' => ['required', 'string', 'email', 'regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address_1' => ['required', 'string', 'max:255'],

        ], [
            // 'first_name.regex' => 'First  Name can only contain alphabets ',
            // 'last_name.regex' => 'Last  Name can only contain alphabets ',
        ]);
    }

    protected function create(array $data)
    {
        $user = new User();
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->contact = $data['contact'];
        $user->address_1 = $data['address_1'];

        $user->is_active = 0;
        $user->role = 1;
        $user->save();

        $email = $data['email'];
        $data2['email'] = $email;

        Mail::to($data2['email'])->send(new RegistrationConfirmation($user));


  Auth::loginUsingId($user->id, TRUE);
    Session::flash('message', 'Your Email has been registered.');
    return $user;

    }

    // public function registerAjax(Request $request)
    // {
    //     $this->validator($request->all())->validate();

    //     event(new Registered($user = $this->create($request->all())));

    //     return response()->json(['success' => true]);
    // }
    // public function register(Request $request)

    // {

    //     $this->validator($request->all())->validate();
        
    //     $user = $this->create($request->all());
    //     if($user->is_active == 0){
    //         return response()->json(['success' => true]);
    //     }else{
    //         Auth::loginUsingId($user->id, TRUE);
    //         if(auth()->user()->hasRole('vendor')){
    //             return redirect('panel/Ven/dashboard')->with('message', 'Your Email has been registered.');
    
    //         }
            
    //     }
    // }
  
}