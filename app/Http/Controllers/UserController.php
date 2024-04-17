<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Junkshop;
use App\Models\User;
use App\Notifications\CreatedBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $junkshops = Junkshop::paginate(10);
        $bookings = Booking::where('user_id', auth()->id())->paginate(10);
        return view('user.pages.index', compact('junkshops', 'bookings'));
    }
    public function bookShow(Booking $booking): View
    {
        $booking->load(['user', 'junkshop']);

        return view('user.pages.bookings-show');
    }

    public function bookingCreate(Junkshop $junkshop): View
    {
        return view('user.pages.bookings-create', compact('junkshop'));
    }

    public function bookingStore(Request $request, Junkshop $junkshop)
    {
        $data = $request->validate([
            'address' => 'required',
            'contact_detail' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required',
            'schedule' => 'required|date|after:1 hour'
        ]);

        auth()->user()->bookings()->create([
            'junkshop_id' => $junkshop->id,
            'schedule' => $data['schedule'],
            'status' => 'pending',
            'user_latitude' => $data['latitude'],
            'user_longitude' => $data['longitude'],
            'user_contact' => $data['contact_detail'],
            'user_address' => $data['address'],
            'description' => $data['description']
        ]);

        Notification::send($junkshop->user, new CreatedBooking($junkshop));

        return redirect()->route('user.pages.index')->with('success', 'Book successfully');
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
