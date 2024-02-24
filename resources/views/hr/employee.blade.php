@extends('layouts.app')

@section('title', 'New Employee')

@section('content')
<div class="container bg-white opacity-90 rounded p-3">
    <h1 class="h3 mt-2 mb-3 p-3"><i class="fa-solid fa-user text-secondary fa-lg"></i> &nbsp;&nbsp;Registered New Employees</h1>
    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="opacity-75">
            <tr class="text-center table table-secondary">
                <th></th>
                <th>E-ID</th>
                <th>Start Day</th>
                <th></th>
                <th>Name</th>
                <th>Visa Status</th>
                <th>Work at</th>
                <th>Registered at</th>
                {{-- <th>Registered by</th> --}}
                <th>Account</th>
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
                        @include('recruiter.modal.status')
                    </td>
                    <td>{{$employee->id}}</td>
                   
                    <td>{{$employee->startday}}</td>
                    <td><img src="{{$employee->passport}}" alt="{{$employee->name}}" class="rounded-circle avatar-sm" ></td>
                    <td>
                        <a href="{{ route('hr.showEndorsed',$employee->id) }}" class="text-decoration-none text-dark">{{$employee->name}}</a>
                    </td>
                  
                    <td><span class="d-inline-block text-truncate" style="max-width:150px;">{{$employee->visa_status}}</span></td>
                    <td>{{$employee->workat}}</td>
                    {{-- <td>{{ \Carbon\Carbon::createFromTimeString($employee->created_at)->format('Y/m/d H:i') }}</td> --}}
                    <td>{{ date('M d, Y', strtotime($employee->created_at)) }}</td>
                    {{-- <td>{{$employee->user->name}}</td> --}}
                    <td>
                        @if(in_array($employee->id,$registered_users))
                            <span class="badge bg-primary p-2">User : {{ optional($employee->user)->id}}</span>
                        @else
                            <a href="{{ route('register', $employee->id)}}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-warning btn-sm"> <i class="fa-solid fa-user-plus fa-lg text-center"></i> &nbsp;<h6 class="mt-2 text-center">Register</h6> </a></td>
                        @endif
                    </td>
                    <td>                  
                         {{-- @if( $employee_task_assigned == $employee->id ) --}}
                        @if( in_array(optional($employee->user)->id, $assigned_users))
                            <a href="{{ route('hr.showIndividuallyAssigned',$employee->user->id)}}" class="b-0"><i class="fa-solid fa-check fa-2x"></i></a>
                        @else
                            <a href="{{ route('hr.assignTask', $employee->id) }}" class="b-0"><i class="fa-solid fa-circle-plus fa-2x"></i></a>
                            <a href="#" class="b-0"><i class="fa-solid fa-check fa-2x"></i></a>
                        @endif
                    </td>
                   
                </tr>
            @empty
                <div class="mb-3 p-3 bg-secondary-subtle rounded">
                    <p class="h5 text-muted ms-3 mt-2 ">No new employees has assigned yet.</p>
                </div>
            @endforelse
        </tbody>
        
    </table>
    <div class="d-flex justify-content-center mt-2">
        {{ $employees->links() }}
    </div>
</div>

@endsection