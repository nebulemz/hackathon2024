<div class="table-responsive">
    <table class="table table-vcenter">
        <thead>
            <tr>
                <th>#</th>
                <th>Junkshop Name</th>
                <th>Junkshop Address</th>
                <th>Status</th>
                <th>Your Address</th>
                <th>Schedule</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->junkshop->name }}</td>
                    <td>{{ $booking->junkshop->address }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>{{ $booking->user_address }}</td>
                    <td>{{ $booking->schedule->toDateTimeString() }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        @include('components.empty-table', ['message' => 'Empty bookings.'])
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {!! $bookings->render() !!}
</div>
