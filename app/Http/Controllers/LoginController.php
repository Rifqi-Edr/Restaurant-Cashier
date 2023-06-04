<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view('login');
    }
    
    public function loginPost(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)->first();

        if ($user && $user->password === $password) {
            Auth::login($user);
            
            if ($user->level === 'admin') {
                return redirect()->intended(route('index'));
            } else if($user->level === 'user'){
                return redirect()->intended(route('makanan'));
            }
        } else {
            return redirect(route('login'))->withErrors('invalid username and password');
        }
    }
    
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }

}
