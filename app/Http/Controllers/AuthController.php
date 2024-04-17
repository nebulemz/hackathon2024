<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function loginView(): View
    {
        return view('auth.pages.login');
    }

    public function loginProcess(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        if(! Auth::attempt($data)) {
            throw ValidationException::withMessages(['email' => 'Invalid email or password.']);
        }

        return redirect('/');
    }

    public function registerView(): View
    {
        return view('auth.pages.register');
    }

    public function registerProcess(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'is_junkshop' => 'nullable',
        ]);

        if(isset($data['is_junkshop'])) {
            $data['is_junkshop'] = true;
        } else {
            $data['is_junkshop'] = false;
        }

        $user = User::create($data);

        Auth::login($user);

        if($data['is_junkshop'] == true) {
            return redirect()->route('register.junkshop');
        } else {
            return redirect()->route('user.pages.index');
        }
    }
}
