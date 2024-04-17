<div class="table-responsive">
    <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>ITEM NAME</th>
                <th>UNIT OF MEASURE</th>
                <th>PRICE</th>
                <th class="text-center">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rates as $junkshopRate)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $junkshopRate->name }}</td>
                    <td>{{ $junkshopRate->unit }}</td>
                    <td>{{ $junkshopRate->price }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-outline-teal" data-bs-toggle="modal"
                            data-bs-target="#edit-rate-{{ $junkshopRate->id }}">
                            Edit
                        </button>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-rate-{{ $junkshopRate->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        @include('components.empty-table', ['message' => 'Empty rates.'])
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {!! $rates->render() !!}
</div>
