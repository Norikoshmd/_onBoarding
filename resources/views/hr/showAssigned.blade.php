@extends('layouts.app')

@section('title', 'Assigned Requests')

@section('content')

<div class="container bg-white opacity-90 p-3 rounded">
    <p class="h3 p-3"><i class="fa-regular fa-folder-open fa-lg text-secondary"></i>&nbsp;&nbsp;Requested items</p>


<table class="table table-hover align-middle bg-white border-text-secondary">
    <thead class="opacity-75">
        <tr class="text-center table table-secondary">
            <th>No.</th>
            <th>Employee ID</th>
            <th>Name</th>
            <th></th>
            <th>Requested Item</th>
            <th>Assigned by</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($employee_tasks as $task)
            <tr class="text-center">
                <td></td>
                <td>{{ $task->employee->id}}</td>
                <td>{{ $task->employee->name}}</td>
                <td><img src="{{$task->employee->passport}}" alt="{{$task->employee->name}}" class="rounded-circle avatar-sm" ></td>
                <td class="text-start ms-2">{{ $task->task->name }}</td>
                {{-- <td>{{ $task->user_id->name }}</td> --}}
                {{-- <td>{{$task->user->name}}</td> --}}
                <td></td>
            </tr>
        @empty
            <div class="bg-info-subtle rounded p-3 mt-2 mb-2 ">
                <p class="text-muted h5 text-center">No Task has Assigned yet.</p>
            </div>
        @endforelse
    </tbody>
</table>

@endsection