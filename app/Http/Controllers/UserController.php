<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     if(!Auth::check() || Auth::user()->level != 'admin'){
    //         abort(403);
    //     }
    //     session(['menu'=> 'user']);
    // }
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required',
            'level'=> 'required'
            
        ]);

        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'username'=> $request->username,
            'password'=> Hash::make($request->password),
            'level'=> $request->level
        ]);
        return redirect()->route('user.index')->with('success', 'User created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
          'name' => 'required',
          'email' => 'required|email',
          'username' => 'required',
          'level' => 'required',
        ]);

        $user = User::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email'=> $request->email,
            'username'=> $request->username,
            'level'=> $request->level
        ];

        if(!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
