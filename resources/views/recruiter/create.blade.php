@extends('layouts.app')

@section('title','Register New')

@section('content')
<div class="container bg-white rounded-3 opacity-90 p-3">
    <p class="fw-bold fs-5">Register New Employee</p>
    <hr>
    <form action="#" method="post" enctype="multipart/form-data">
     @csrf
        <div class="row mb-3 fw-bold">
            <div class="col-4">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-4">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-4">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row mb-3 fw-bold">
            <div class="col-6">
                <label for="email_address" class="form-label">Email Address</label>
                <input type="mail" class="form-control">
            </div>
            <div class="col-6">
                <label for="visa_status" class="form-label">Visa Status</label>
                <select name="visa_status" id="visa_status" class="form-select">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="row mb-3 fw-bold">
            <div class="col-4">
                <label for="start_day" class="form-label">Start Day</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-4">
                <label for="work_for" class="form-label">Work for</label>
                <input type="text" class="form-control">
            </div>
            {{-- <div class="col-4">
                <label for="status" class="form-label">currently</label>
                <select name="status" id="visa_status" class="form-select">
                    <option value="working"></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div> --}}
        </div>
        <hr>
        <div class="row mb-5 fw-bold">
            <p class="h5 mb-3 fw-bold text-secondary">Data Upload</p>
            <div class="col-4">
                <label for="visa_f" class="form-label">Residence Card (Front)</label>
                <input type="file" class="form-control">
            </div>
            <div class="col-4">
                <label for="visa_b" class="form-label">Residence Card (Back)</label>
                <input type="file" class="form-control">
            </div>
            <div class="col-4">
                <label for="passport" class="form-label">Passport</label>
                <input type="file" class="form-control">
            </div>
        </div>
        <button type="button" class="btn btn-outline-warning">Cancel</button>
        <button type="submit" class="btn btn-secondary">Submit</button>
    </form>
   

    





@endsection