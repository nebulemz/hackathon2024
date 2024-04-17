<div class="table-responsive">
    <table class="table table-vcenter">
        <thead>
            <tr>
                <th>Id</th>
                <th>Customer Name</th>
                <th>Description</th>
                <th>Schedule</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($availableBooking as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->description }}</td>
                    <td>{{ $booking->schedule->toDateTimeString() }}</td>
                    <td>
                        <a class="btn-teal btn" href="{{ route('junkshop.pages.view-booking', $booking->id) }}">
                            Set Status
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        @include('components.empty-table', ['message' => 'Empty available bookings.'])
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {!! $availableBooking->render() !!}
</div>
