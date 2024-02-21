@extends('layouts.app')

@section('title','Recruiter')

@section('content')

<div class="container bg-white rounded-3 opacity-90 p-3">
    <div class="row mt-3 justify-content-center">
            <p class="fw-bold fs-4"><i class="fa-solid fa-user fa-lg img-thumbnail rounded-circle text-secondary"></i> Registered New Employees</p>
    </div>

    <hr>

    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="opacity-75">
            <tr class="text-center table table-secondary">
                <th>Status</th>
                <th>id</th>
                <th>Employee Name</th>
                <th></th>
                <th>Start Date</th>
                <th>Visa Status</th>
                <th>Work at</th>
                <th>Registered on</th>
                <th>Registered by</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        
        <tbody>
        @forelse ($employees as $employee)
            <tr class="text-center">
                <td>
                    <div class="dropdown">
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
                    </div>
                   
                </td>
                <td>{{ $employee->id}}</td>
                <td><a href="{{ route('recruiter.show',$employee->id)}}" class="text-decoration-none text-dark">{{ $employee->name }}</a></td>
                <td><img src="{{$employee->passport}}" alt="{{$employee->name}}" class="rounded-circle avatar-sm" ></td>
                <td>{{ $employee->startday }}</td>
                <td>{{ Illuminate\Support\Str::limit($employee->visa_status,20, '...') }}</td>
                <td>{{ $employee->workat }}</td>
                <td>{{ date('M d, Y', strtotime($employee->created_at)) }}</td>
                <td>{{$employee->user->name}}</td>
                
                <td>
                    @if(Auth::user()->id == $employee->user_id )
                        <a href="{{ route('recruiter.edit',$employee->id)}}" class="btn btn-outline-warning"><i class="fa-solid fa-pen"></i></a>
                        <button class="text-danger btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-employee-{{ $employee->id }}"><i class="fa-regular fa-trash-can"></i></button></td>
                    @endif
                    
                <td>
                    @Include('recruiter.modal.delete')
            </tr>
            
        @empty
            <div class="mb-3">
                <div class="rounded bg-secondary-subtle">
                    <p class="h5 p-3">New employee hasn't registered yet.</p>
                </div>
            </div>
        @endforelse
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center mt-2">
    {{ $employees->links() }}
</div>
@endsection