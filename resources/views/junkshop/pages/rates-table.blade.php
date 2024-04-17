
<div class="table-responsive">
    <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>ITEM NAME</th>
                <th>UNIT OF MEASURE</th>
                <th>PRICE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rates as $junkshopRate)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $junkshopRate->name }}</td>
                    <td>{{ $junkshopRate->description }}</td>
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
</div>

