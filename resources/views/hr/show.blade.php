@extends('layouts.app')

@section('title', 'Assigned Requests')

@section('content')


<table class="table table-hover align-middle bg-white border-text-secondary">
    <thead class="opacity-75">
        <tr class="text-center table table-secondary">
            <th>#</th>
            <th>Requested to</th>
            <th>Requested form</th>
            {{-- <th>Due Date</th>
            <th>until Due Date</th>
            <th>Remarks</th> --}}
        </tr>
    </thead>
    <tbody>
        <tbody>
            @forelse ($tasks as $task)
                <tr class="text-center">
                    <td rowspan="{{ count($task->name) + 1 }}">{{$task->id}}</td>
                    <td rowspan="{{ count($task->name) + 1 }}">{{$task->assigned_to}}</td>
                </tr>
                @foreach($task->name as $name)
                    <tr class="text-start">
                        <td>{{$name}}</td>
                    </tr>
                @endforeach
            @empty
                <tr>
                    <td colspan="3"><h5 class="text-muted text-center">No Assigned Task at the moment</h5></td>
                </tr>
            @endforelse
        </tbody>
        
        {{-- @forelse ($tasks as $task)
            <tr  class="text-center">
                <td>{{$task->id}}</td>
                <td>{{$task->assigned_to}}</td>
                <td>
                    @foreach($task->name as $name)
                        {{ $name }}<br> <!-- Assuming $task->names is the array of names -->
                    @endforeach
                </td>
            </tr>
        @empty
            <tr>
                <td><h5 class="text-muted text-center">No Assigned Task at the moment</h5></td>
            </tr>
        @endforelse --}}
    </tbody>
</table>

@endsection