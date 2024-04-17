<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterJunkshop extends Controller
{
    public function registerJunkshopView(): View|RedirectResponse
    {
        if(auth()->user()->isJunkshopOwner() && auth()->user()->junkshop !== null) {
            return redirect()
                ->route('junkshop.pages.index')
                ->with('success', 'You already have a junkshop, redirecting to your page.');
        };

        return view('auth.pages.register-junkshop', ['user' => auth()->user()]);
    }

    public function registerJunkshopProcess(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'user_email' => 'required|email|exists:users,email',
            'name' => 'required|string',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        $user = User::where('email', $data['user_email'])->first();

        if($user->isNotJunkshopOwner()) {
            return redirect()
                ->route('user.pages.index')
                ->with('error', 'You are not a junkshop owner, redirecting to users dashboard.');
        }

        $user->junkshop()->create([
            'name' => $data['name'],
            'address' => $data['address'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude']
        ]);

        return redirect()
            ->route('junkshop.pages.index')
            ->with('success', 'Junkshop created succesfully');
    }
}
