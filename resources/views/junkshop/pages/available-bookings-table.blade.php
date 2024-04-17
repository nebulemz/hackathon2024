<div class="table-responsive">
    <table class="table table-vcenter">
        <thead>
            <tr>
                <th>Id</th>
                <th>Customer Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($availableBooking as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->description }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        @include('components.empty-table', ['message' => 'Empty available bookings.'])
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
