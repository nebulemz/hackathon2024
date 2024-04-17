<table class="card-table table-vcenter datatable table text-nowrap">
    <thead>
        <tr>
            <th>ID</th>
            <th>CODE</th>
            <th>MONTH</th>
            <th>YEAR</th>
            <th>DESCRIPTION</th>
            <th>BUDGET HOURS</th>
            <th>TOTAL HOURS</th>
            <th>NOTES</th>
            <th>APPROVAL DATE</th>
            <th>APPROVER ID</th>
            <th>ASSIGNED ID</th>
            <th>CREATOR ID</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->code }}</td>
                <td>{{ $task->month }}</td>
                <td>{{ $task->year }}</td>
                <td>
                    <a href="{{ route('admin.pages.task.timesheet.show', $task->id) }}">
                    {{ $task->description }}</a>
                </td>
                <td>{{ $task->budget_hrs }}</td>
                <td>{{ $task->total_hrs }}</td>
                <td>{{ $task->notes }}</td>
                <td>{{ $task->approval_date }}</td>
                <td>{{ $task->approver_id }}</td>
                <td>{{ $task->assigned_id }}</td>
                <td>{{ $task->creator_id }}</td>
                <td>
                    <form method="post" action="{{ route('admin.pages.task.destroy', ['task' => $task]) }}">
                        <a href="{{ route('admin.pages.task.edit', ['task' => $task]) }}"
                            class="btn btn-primary btn-sm">Edit</a>
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-secondary btn-sm" value="Delete" />
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="px-3 pt-3">
    {!! $tasks->render() !!}
</div>

