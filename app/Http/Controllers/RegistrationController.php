<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function index() {
        return view('auth.registration', [
            'title' => 'Registration',
            'active' => 'login'
        ]);
    }

    public function store(Request $request) {
        $validated = $request-> validate([
            'name' => 'required|max:50',
            'username' => 'required|min:3|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['username'] = Str::of($validated['username'])->lower();

        User::create($validated);

        return redirect('/login')->with('created', 'Registration successfull, please login');
    }
}
