@extends('layouts.app')

@section('title','Submitted Items')

@section('content')

<table class="table table-hover align-middle bg-white border-text-secondary">
    <thead class="opacity-75">
        <tr class="text-center table table-secondary">
            <th>Submitted Date</th>
            <th>Submitted form</th>
        </tr>
    </thead>
    <tbody>
        {{-- @forelse ($employee->submissions as $submission)
            <td>{{$employee_id->name}}</td>
            <td>{{$task_id}}</td>
        @empty
            <p class="text-muted">No submissions at the moment.</p>
        @endforelse --}}
            
            
    </tbody>
</table>

@endsection