@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                @if("value=")
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @endif

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                   
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role_id" class="col-md-4 col-form-label text-md-end">Select role_id</label>

                            <div class="col-md-6">
                                <select name="role_id" id="role_id" class="form-select">
                                    <option value=""hidden>Select</option>
                                    <option value="1">1 : HR</option>
                                    <option value="2">2 : User</option>
                                    <option value="3">3 : Recruiter</option>
                                    {{old('role_id')}}
                                </select>
                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                <td><a href="{{ route('hr.showEndorsed',$employee->id) }}" class="text-decoration-none text-dark">{{$employee->name}}</a></td>
                <td>{{ Illuminate\Support\Str::limit($employee->visa_status,20, '...') }}</td>
                <td>{{$employee->workat}}</td>
                <td>{{ \Carbon\Carbon::createFromTimeString($employee->created_at)->format('Y/m/d H:i') }}</td>
                {{-- <td>{{ date('M d, Y', strtotime($employee->created_at)) }}</td> --}}
                <td>{{ $employee->user->name }}</td>
                <td><a href="{{ route('register', $employee->id) }}" class="btn btn-outline-warning btn-sm"> <i class="fa-solid fa-user-plus"></i> </a></td>
                <td>
                        {{-- @if( $employee_task_assigned == $employee->id ) --}}
                            <a href="{{ route('hr.assignTask', $employee->id) }}" class="b-0"><i class="fa-solid fa-circle-plus fa-2x"></i></a>
                        {{-- @else --}}
                            <a href="#" class="b-0"><i class="fa-solid fa-check fa-2x"></i></a>
                        {{-- @endif --}}
                        
                  
                        
                </td>
            </tr>
        @empty
            <div class="mb-3 p-3 bg-secondary-subtle rounded">
                <p class="h5 text-muted ms-3 mt-2 ">No new employees has assigned yet.</p>
            </div>
        @endforelse
    </tbody>
    
</table>
</div>
@endsection