@extends('layouts.app')

@section('title','HR Home')

@section('content')

<table class="table table-hover align-middle bg-white border-text-secondary">
    <thead class="opacity-75">
        <tr class="text-center table table-secondary">
            <th>ID</th>
            <th>Start Day</th>
            <th>Employee Name</th>
            <th>Visa Status</th>
            <th>Work at</th>
            <th>Registered at</th>
            <th>Registered by</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
       
        @forelse ($employees as $employee)
            <tr class="text-center">
                <td>{{$employee->id}}</td>
                <td>{{$employee->startday}}</td>
                <td><a href="{{ route('hr.showEndorsed',$employee->id) }}" class="text-decoration-none text-dark">{{$employee->name}}</a></td>
                <td>{{ Illuminate\Support\Str::limit($employee->visa_status,20, '...') }}</td>
                <td>{{$employee->workat}}</td>
                <td>{{ date('M d, Y', strtotime($employee->created_at)) }}</td>
                <td>{{ $employee->user->name }}</td>
                <td><a href="{{ route('hr.register', $employee->id) }}" class="btn btn-outline-warning btn-sm"> <i class="fa-solid fa-user-plus"></i> </a></td>
            </tr>
        @empty
            <div class="mb-3 p-3 bg-warning-subtle rounded">
                <p class="h3 text-muted text-center">All New Employees submitted required information!</p>
            </div>
        @endforelse

    </tbody>
    
</table>

@endsection