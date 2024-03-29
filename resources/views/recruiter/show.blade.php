@extends('layouts.app')

@section('title','Edit {{$employee->name}}')

@section('content')
<div class="container bg-white rounded-3 opacity-90 p-3">
    <p class="text-muted text-end"><i class="fa-solid fa-list fa-"></i>&nbsp;&nbsp;>>&nbsp;&nbsp;{{$employee->name}}</p>
    <div class="row mt-3">
        <div class="col-8">
            <p class="fw-bold fs-4"><i class="fa-solid fa-user-check"></i>&nbsp; {{ $employee->name }}</p>
        </div>
      
    </div>
       
    <hr>
        <div class="row mb-3">
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
                <label for="dependent" class="form-label">Any Dependents to apply? </label>
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
        <div class="row mb-5">
            <label for="remarks" class="form-label">Remarks</label>
            <p>{{ $employee->remarks }}</p>
        </div>
        <hr>
        <div class="row">
              <a href="{{ route('recruiter.index')}}" class="btn btn-secondary btn-sm mx-auto" style="width:20%;"> BACK</a>
        </div>

@endsection