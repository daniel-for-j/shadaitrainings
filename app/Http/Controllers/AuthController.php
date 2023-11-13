<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CustomUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        // Validation logic goes here
        $data = $request->all();

        $validator = Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8', 
            'qualification' => 'required|string|in:Msc,Bsc,PhD',
            'date_of_birth' => 'required|date',
        ]);
        
            // After creating the user


        // Check if validation fails
        if ($validator->fails()) {
          
            return redirect('register')->withErrors($validator)->withInput();            
        }

        $user = CustomUser::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'qualification' => $data['qualification'],
            'date_of_birth' => $data['date_of_birth'],
        ]);
       $user->is_admin = $user->email === 'admin@shadai.com';
        $user->save();
        Auth::login($user);

        return redirect('/');
    }


    public function showLoginForm()
    {
        return view('signin');
    }

    public function login(Request $request)
    {
     
    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (auth()->attempt($data)) {
        $user = auth()->user();
        if ($user->is_admin) {
            return redirect('/admin');
        } else {
            return redirect('/');
        }
    }

    return redirect('/login')->withErrors(['login' => 'Invalid credentials']); 
    }

    public function logout()
    {
        auth()->logout(); 
        return redirect('/');
    }

    
}
