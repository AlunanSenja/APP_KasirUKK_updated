<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function proses(Request $request)
    {
        $request ->validate([
        'username'=> 'required',
        'password'=> 'required',
        'level'=> 'required'
        ]);

        $credentials = $request->only(['username', 'password', 'level']);
        if (Auth::attempt($credentials)) {
             $request->session()->regenerate();
             return redirect()->route('dashboard');
        }
        else {
            return back()->withErrors([
                'username'=> 'username tidak di temukan.',
                'password'=> 'password tidak cocok.',
                'level' => 'Level tidak cocok.'
            ])->onlyInput('username');
        }
    }

    /**
     * Display the specified resource.
     */
    public function logout(Request $request)
    {
        Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
}
    }
   