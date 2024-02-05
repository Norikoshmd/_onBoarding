@extends('layouts.app')

@section('title','Recruiter')

@section('content')

<div class="container bg-white rounded-3 opacity-90 p-3">
    <div class="row justify-content-center">
        <div class="col-10">
            <p class="fw-bold fs-5">Registered Employee</p>
        </div>
        <div class="col-auto ms-auto">
            <a href="{{ route('recruiter.create')}}" class="btn btn-outline-primary"><i class="fa-solid fa-user-plus"></i></a>
        </div>
    </div>

    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="opacity-75">
            <tr class="text-center table table-secondary">
                <th>id</th>
                <th>Employee Name</th>
                <th>Start Date</th>
                <th>Visa Status</th>
                <th>Work at</th>
                <th>Registered at</th>
                
            </tr>
        </thead>
        
        <tbody>
        @forelse ($employees as $employee)
            <tr class="text-center">
                <td>{{ $employee->id}}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->startday }}</td>
                <td>{{ Illuminate\Support\Str::limit($employee->visa_status,20, '...') }}</td>
                <td>{{ $employee->workat }}</td>
                <td>{{ date('M d, Y', strtotime($employee->created_at)) }}</td>
               
            </tr>
                
        @empty
            <div class="mb-3">
                <div class="rounded bg-warning-subtle">
                    <p class="h5 text-center p-3">New employee hasn't registered yet.</p>
                </div>
                
            </div>
                
        @endforelse
    
        </tbody>
        
    </table>

</div>

@endsection