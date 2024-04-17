<?php

namespace App\Http\Controllers;

use App\Models\Junkshop;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $junkshops = Junkshop::paginate();
        return view('user.pages.index', compact('junkshops'));
    }

    public function showBookings()
    {
        // Junkshop name, Junkshop Address, Booking Status, Booking Description, Schedule

        return view('user.pages.bookings-show')
    }

    // public function create()
    // {
    //     return view('pages.user.create');
    // }

    // public function store(Request $request)
    // {
    //     $data = $request->validated();

    //     $newUser = User::create($data);

    //     return redirect(route('pages.user.index'));

    // }

    // public function edit(User $user)
    // {
    //     return view('pages.user.edit', ['user' => $user]);
    // }

    // public function update(User $user, Request $request)
    // {
    //     $data = $request->validated();
    //     $user->update($data);

    //     return redirect(route('pages.user.index'))->with('success', 'User Updated Succesffully');

    // }

    // public function destroy(User $user)
    // {
    //     $user->delete();

    //     return redirect(route('pages.user.index'))->with('success', 'User deleted Succesffully');
    // }
}
