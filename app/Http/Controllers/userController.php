<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $fields['password'] = bcrypt($fields['password']);
        
        User::create($fields);

        return back()->with('message', "<script>alert('Account created successfully!');</script>");
    }

    public function login(Request $request){
        $fields = $request->validate([
            'loginemail' => 'required|email',
            'loginpassword' => 'required'
        ]);

        if(Auth::attempt(['email' => $fields['loginemail'], 'password' => $fields['loginpassword']])){
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
