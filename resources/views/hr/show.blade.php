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
        @forelse ($tasks as $task)
            <tr  class="text-center">
                <td>{{$task->id}}</td>
                <td>{{$task->assigned_to}}</td>
                <td>
                    @foreach($task->name as $name)
                    <ul class="list-group text-start ms-3">
                        <li>{{ $name }} </li>
                    </ul>
                    @endforeach
                 </td>
                {{-- <td>{{$task->due_date}}</td>
                <td>{{ $task->daysUntilDue() }} day(s) </td>
                <td>{{$task->remarks}}</td> --}}
            </tr>
        @empty
            <tr>
                <td><h5 class="text-muted text-center">No Assigned Task at the moment</h5></td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection