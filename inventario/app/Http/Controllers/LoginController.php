<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            return redirect()->route('inicio');
        }
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],

        ]);
        if (Auth::attempt($datos)) {
            $request->session()->regenerate();
            return redirect()->intended(route('inicio'));
        }
        return back()->withErrors([
            'username' => 'Usuario o contrasena incorrectos',
        ])->onlyInput('username');
    }
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');

    }

}
