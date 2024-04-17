<?php

namespace App\Http\Controllers;

use App\Models\Booking;
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

    public function showBookings(Request $request, $booking)
    {
        $booking = Booking::paginate();

        return view('user.pages.bookings-show', [
            'junkshopName' => $booking->junkshop_name,
            'junkshopAddress' => $booking->junkshop_address,
            'bookingStatus' => $booking->status,
            'bookingDescription' => $booking->description,
            'schedule' => $booking->schedule,
        ]);
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
