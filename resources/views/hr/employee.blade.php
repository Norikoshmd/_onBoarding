@extends('layouts.app')

@section('title', 'New Employee')

@section('content')
<div class="container bg-white opacity-90 rounded p-3">
    <h1 class="h3 mt-2 mb-3"><i class="fa-solid fa-user text-secondary"></i> New Employees</h1>

    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="opacity-75">
            <tr class="text-center table table-secondary">
                <th></th>
                <th>ID</th>
                <th>Start Day</th>
                <th>Employee Name</th>
                <th>Visa Status</th>
                <th>Work at</th>
                <th>Registered at</th>
                <th>Registered by</th>
                <th></th>
                <th>Request</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
                <tr class="text-center">
                    <td>
                        @if($employee->trashed())
                            <button class="btn btn-sm" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ban fa-2x text-secondary"></i>
                            </button>
                    
                        @else
                            <button class="btn btn-sm" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-circle-check fa-2x text-primary"></i>
                            </button>
                        @endif
    
                        @if($employee->trashed())
                            <div class="dropdown-menu">
                                <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#activate-employee-{{ $employee->id }}" > <i class="fa-solid fa-user-check text-primary"></i> Activate {{ $employee->name }}
                                </button>
                            </div>
    
                        @else
                            <div class="dropdown-menu">
                                <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-employee-{{ $employee->id }}" > <i class="fa-solid fa-user-slash"></i> Deactivate {{ $employee->name }}
                                </button>
                            </div>
                        @endif
                    </td>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->startday}}</td>
                    <td><a href="{{ route('hr.showEndorsed',$employee->id) }}" class="text-decoration-none text-dark">{{$employee->name}}</a></td>
                    <td>{{ Illuminate\Support\Str::limit($employee->visa_status,20, '...') }}</td>
                    <td>{{$employee->workat}}</td>
                    <td>{{ date('M d, Y', strtotime($employee->created_at)) }}</td>
                    <td>{{ $employee->user->name }}</td>
                    <td><a href="{{ route('hr.register', $employee->id) }}" class="btn btn-outline-warning btn-sm"> <i class="fa-solid fa-user-plus"></i> </a></td>
                    <td><a href="{{ route('hr.create',$employee->id) }}" class="b-0"><i class="fa-solid fa-circle-plus fa-2x"></i></a></td>
                </tr>
            @empty
                <div class="mb-3 p-3 bg-warning-subtle rounded">
                    <p class="h3 text-muted text-center">All New Employees submitted required information!</p>
                </div>
            @endforelse
        </tbody>
        
    </table>
    <div class="d-flex justify-content-center mt-2">
        {{ $employees->links() }}
    </div>
</div>

@endsection