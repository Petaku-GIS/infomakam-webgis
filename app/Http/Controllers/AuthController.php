<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function LoginView()
    {
        return view('auth/login');
    }
    
    public function RegisterView()
    {
        return view('auth/register');
    }

    public function Register(Request $request)
    {
        $user = new User();
        $register = $user->register($request);
        if ($register) {
            session([
                'id' => $user->id,
                'name' => $user->name,
            ]);
            return redirect('/');
        }
        return redirect('/register')->with('error', 'Register failed');
    }

    public function Login(Request $request)
    {
        $user = new User();
        $login = $user->login($request);
        if ($login) {
            session([
                'id' => $login->id,
                'name' => $login->name,
            ]);
            return redirect('/');
        }
        return redirect('/login')->with('error', 'Email or password is incorrect');
    }

    public function Logout()
    {
        session()->flush();
        return redirect('/');
    }
}
