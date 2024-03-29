@extends('layouts.app')

@section('title', 'Assigned Requests')

@section('content')

<div class="container bg-white opacity-90 p-3 rounded">
    <p class="h3 p-3"><i class="fa-regular fa-folder-open fa-lg text-secondary"></i>&nbsp;&nbsp;Requested items</p>

<table class="table table-hover align-middle bg-white border-text-secondary rounded">
    <thead class="opacity-75">
        <tr class="text-center table table-secondary">
            <th>Requested on</th>
            <th>Start Day</th>
            <th>User ID</th>
            <th>Name</th>
            <th></th>
            <th>Requested Item</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($user_tasks as $task)
            <tr class="text-center">
                <td>{{date('M d, Y', strtotime($task->created_at))}}</td>
                <td>{{date('M d, Y', strtotime($task->user->employee->startday))}}</td>
                <td>{{ $task->user->id}}</td>
                <td><a href="{{route('hr.showIndividuallyAssigned',$task->user->id)}}" class="text-decoration-none text-dark">{{ $task->user->name }}</a></td>
                <td><img src="{{$task->user->employee->passport}}" alt="{{$task->user->employee->name}}" class="rounded-circle avatar-sm" ></td>
                <td class="text-start ms-2">{{ $task->task->name }}</td>
            </tr>
         

        @empty
            <div class="bg-secondary-subtle rounded p-3 mt-2 mb-3 ">
                <p class="text-muted h5 ms-3 mt-2">No Task has Assigned yet.</p>
            </div>
        @endforelse
           
    </tbody>
</table>
</div>

<div class="d-flex justify-content-center mt-2">
    {{ $user_tasks->links() }}
</div>

@endsection