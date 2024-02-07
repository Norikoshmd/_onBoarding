@extends('layouts.app')

@section('title','Edit {{$employee->name}}')

@section('content')
<div class="container bg-white rounded-3 opacity-90 p-3">
    <div class="row mt-3">
        <div class="col-8">
            <p class="fw-bold fs-4"><i class="fa-solid fa-user-check"></i>&nbsp; {{ $employee->name }}</p>
        </div>
        <div class="col-auto ms-auto">
          <a href="{{ route('recruiter.index')}}" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-angles-right"></i> back to the list</a>
         </div>
    </div>
       
    <hr>
    <form action="{{ route('recruiter.store')}}" method="post" enctype="multipart/form-data">
     @csrf
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
        <div class="row mx-auto justify-content-center">
            <div class="col-4 gx-3">
               <a href="{{ route('recruiter.index')}}" class="btn btn-outline-warning btn-sm"> Cancel</a>
               <button type="submit" class="btn btn-secondary btn-sm"> Submit</button>
            </div>
        </div>
    </form>
@endsection