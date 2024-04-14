<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt($data)) {
            return redirect()->route('auth.index')->withErrors(['login' => 'Логин или пароль введены неправильно'])->withInput();
        }

        return redirect()->route('main.index');
    }

    public function destroy(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('auth.index');
    }
}
