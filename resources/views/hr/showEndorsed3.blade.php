@extends('layouts.app')

@section('title','information')

@section('content')
<div class="container bg-white rounded-3 opacity-90 p-3">
    <div class="row mt-3">
        <div class="text-center">
            <p class="fw-bold fs-4"><i class="fa-solid fa-user-check"></i>&nbsp; Info from Recruit Team</p>
            <hr>
            {{-- @foreach($users as $user)
                @if($employee->id = $employee->id)
                    <button class=" btn btn-secondary btn-sm p-3"><i class="fa-solid fa-user-check fa-2x text-white"></i> &nbsp;<h5 class="mt-2 text-center">Registered!</h5><p class="mt-1 h6">User ID : {{$employee->user}}</p></button>
                    @break
                @else
                    <a href="{{ route('register', $employee->id)}}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-warning btn-sm p-3 "> <i class="fa-solid fa-user-plus fa-2x text-center"></i> &nbsp;<h5 class="mt-2 text-center">Register <br>Account</h5> </a></td>
                    @break
                @endif
            @endforeach --}}
        </div>
    </div>
         <div class="container bg-secondary-subtle p-3 rounded">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="e_id" class="form-label">Employee ID</label>
                    <p class="fs-bold fs-4">{{ $employee->id }}</p>
                </div>
              
                <div class="col-auto">
                    <label for="name" class="form-label">Name</label>
                    <p class="fs-bold fs-4">{{ $employee->name }}</p>
                </div>
                <div class="col-auto">
                    <label for="gender" class="form-label">Gender</label>
                    <p class="fs-bold fs-4">{{ $employee->gender }}</p>
                </div>
                
            </div>
    
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="email_address" class="form-label">Email Address</label>
                    <p class="fs-4">{{ $employee->email }}</p>
                </div>
                <div class="col-auto">
                    <label for="visa_status" class="form-label">Visa Status</label>
                    <p class="fs-5">{{ $employee->visa_status }}</p>
                </div>
            </div>
            <div class="row mb-3 ">
                <div class="col-auto">
                    <label for="start_day" class="form-label">Start Day</label>
                    <p class="fs-5">{{ $employee->startday }}</p>
                </div>
                <div class="col-auto">
                    <label for="work_for" class="form-label">Work for</label>
                    <p class="fs-5">{{ $employee->workat }}</p>
                </div>
                <div class="col-auto">
                    <label for="work_for" class="form-label">Any Dependent?</label>
                    <p class="fs-5">{{ $employee->dependent }}</p>
                </div>
            </div>
            <hr>
        <div class="row mb-3 fw-bold">
            <p class="h5 mb-3 fw-bold text-secondary">Data Uploaded</p>
            <div class="col-auto">
                <label for="visa_f" class="form-label">Residence Card (Front)</label><br>
                <img class="uploaded-image" src="{{ $employee->visa_f }}" alt="{{ $employee->name }}"> 
            </div>
            <div class="col-auto">
                <label for="visa_b" class="form-label">Residence Card (Back)</label><br>
                <img class="uploaded-image" src="{{ $employee->visa_b }}" alt="{{ $employee->name }}"> 
            </div>
            <div class="col-auto">
                <label for="passport" class="form-label">Passport</label><br>
                <img class="uploaded-image" src="{{ $employee->passport }}" alt="{{ $employee->name }}"> 
            </div>
        </div>
        <hr>
        <div class="row mb-3">
            <label for="remarks" class="form-label">Remarks</label>
            <p>{{ $employee->remarks }}</p>
        </div>
    </div>
    <div class="text-center p-3">
        <a href="{{ route('hr.index')}}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-angles-right"></i> BACK</a>
    </div>
        


@endsection