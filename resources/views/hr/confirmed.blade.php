@extends('layouts.app')

@section('title','Submitted Items')

@section('content')
<div class="container bg-white opacity-90 p-3 rounded">
    <p class="h3 p-3"><i class="fa-solid fa-file-circle-check fa-lg text-secondary"></i>&nbsp;&nbsp;Confirmed items</p>
    <table class="table table-hover align-middle bg-white border-text-secondary">
        
        <thead class="opacity-75">
            <tr class="text-center table table-secondary">
                <th>No.</th>
                <th>Date Submitted</th>
                <th>ID</th>
                <th>Name</th>
                <th>Item</th>
                <th></th>
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

</div>
  

@endsection