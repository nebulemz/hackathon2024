<div class="table-responsive">
    <table class="table table-vcenter">
        <thead>
            <tr>
                <th>#</th>
                <th>Junkshop Name</th>
                <th>Address</th>
                <th class="text-end">Rates</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($junkshops as $junkshop)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $junkshop->name }}</td>
                    <td style="cursor: pointer" onclick="centerMap({{ $junkshop->latitude }}, {{ $junkshop->longitude }})">{{ $junkshop->address }}</td>
                    <td class="text-end">
                        <button class="btn btn-outline-teal" data-bs-toggle="modal"
                            data-bs-target="#junkshop-rate-{{ $junkshop->id }}">
                            View Rates
                        </button>
                    </td>
                    <td class="text-end">
                        <button class="btn btn-outline-teal" data-bs-toggle="modal"
                            data-bs-target="#junkshop-book-{{ $junkshop->id }}">
                            Book this shop
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        @include('components.empty-table', ['message' => 'Empty junkshops.'])
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
