<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Junkshop;
use App\Http\Requests\StoreJunkshopRequest;
use App\Http\Requests\UpdateJunkshopRequest;
use App\Models\JunkshopRate;
use App\Notifications\BookingAccepted;
use App\Notifications\BookingRejected;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class JunkshopController extends Controller
{
    public function index(): View
    {
        $junkshop = auth()->user()->junkshop;
        $title = $junkshop->name. ' Junkshop';
        $availableBooking = $junkshop->availableBookings()->latest()->paginate(10);
        $totalBookings = $junkshop->bookings()->latest()->paginate(10);
        $rates = JunkshopRate::where('junkshop_id', $junkshop->id)->paginate(10);

        return view('junkshop.pages.index', compact('junkshop', 'title', 'availableBooking', 'totalBookings', 'rates'));
    }

    public function decideBooking(Request $request, Booking $booking): RedirectResponse
    {
        $data = $request->validate([
            'status' => 'required|in:reject,accept'
        ]);

        if($data['status'] === 'reject') {
            Notification::send($booking->user, new BookingRejected($booking->junkshop));
        } else {
            Notification::send($booking->user, new BookingAccepted($booking->junkshop));
        }

        $booking->update($data);

        return redirect()->route('register.junkshop.process')->with('success', 'Successfully update booking.');
    }
}
