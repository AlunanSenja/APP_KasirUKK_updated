<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
     
    public function __construct()
    {
        session(['menu' => 'dashboard']);
    }

    public function index()
    {
        if(Auth::Check()) {
            return view('layouts.dashboard');
        }else {
        return redirect()->route('auth.login')->with('error', 'Anda harus login dulu!');
        }
    }
}
