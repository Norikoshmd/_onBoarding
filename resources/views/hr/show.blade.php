@extends('layouts.app')

@section('title', 'Assigned Requests')

@section('content')

<div class="container bg-white opacity-90 p-3 rounded">
    <p class="h5">Requested items</p>


<table class="table table-hover align-middle bg-white border-text-secondary">
    <thead class="opacity-75">
        <tr class="text-center table table-secondary">
            <th>#</th>
            <th>ID</th>
            <th>Name</th>
            <th>Requested Item</th>
            <th>Assigned by</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tasks as $task)
            {{-- <tr>
                <td>{{ $taskPost->id }}</td>
                <td>{{ $task->employee_id }}</td> --}}
                {{-- <td>{{ $task->employee_id->employee->name }}</td> --}}
                {{-- <td>{{ $task->name }}</td>
                <td></td>
            </tr> --}}
        @empty
            <p class="text-muted">No Task Assigned</p>
        @endforelse
           
    </tbody>
</table>
</div>

@endsection