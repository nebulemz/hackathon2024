<div class="table-responsive">
    <table class="table table-vcenter">
        <thead>
            <tr>
                <th>Id</th>
                <th>Customer Name</th>
                <th>Status</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($availableBooking as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>{{ $booking->description }}</td>

                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        @include('components.empty-table', ['message' => 'Empty total bookings.'])
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
