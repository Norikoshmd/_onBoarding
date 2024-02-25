@extends('layouts.app')

@section('title','Employee Information Form')

@section('content')

<div class="container bg-white opacity-90 rounded p-3 shadow-lg">
    <div class="h1 h5 mt-2 fw-bold">
        <i class="fa-solid fa-pen-to-square fa-lg"></i> &nbsp;&nbsp;Employee Information Form
    </div>
    <hr>

    <div class="px-3">
        <form action="{{ route('doc.storeDoc1')}}" method="post">
            @csrf
           
            <div class="container bg-secondary-subtle rounded shadow-sm p-3 mb-2">
                <label for="alphabetic_name" class="fw-bold mb-0">Name in Alphabet </label>
                <div class="row justify-content-center mb-3">
                    <div class="col-4">
                        <label for="firstname" class="form-label mb-0 ms-1">First Name</label>
                        <input type="text" name="firstname" class="form-control" value="{{old('firstname')}}">
                    </div>
                    <div class="col-4">
                        <label for="middlename" class="form-label mb-0 ms-1">Middle Name <span class="text-secondary">* in case it's printed on your ID</span></label>
                        <input type="text" name="middlename" class="form-control" value="{{old('middlename')}}">
                    </div>
                    <div class="col-4">
                        <label for="lastname" class="form-label mb-0 ms-1">Last Name</label>
                        <input type="text" name="lastname" class="form-control" value="{{old('lastname')}}">
                    </div>
                </div>
                
                <label for="kana_name" class="fw-bold mb-0">Name in Japanese Katakana <span class="text-secondary">*if you can type</span></label>
                <div class="row justify-content-center mb-3">
                    <div class="col-4">
                        <label for="namae" class="form-label mb-0 ms-1">First Name</label>
                        <input type="text" name="namae" class="form-control" value="{{old('namae')}}">
                    </div>
                    <div class="col-4">
                        <label for="middlename_kana" class="form-label mb-0 ms-1">Middle Name <span class="text-secondary">* in case it's printed on your ID</span></label>
                        <input type="text" name="middlename_kana" class="form-control" value="{{old('middlename_kana')}}">
                    </div>
                    <div class="col-4">
                        <label for="myouji" class="form-label mb-0 ms-1">Last Name</label>
                        <input type="text" name="myouji" class="form-control" value="{{old('myouji')}}">
                    </div>
                </div>
            </div>
            <div class="container bg-primary-subtle rounded shadow-sm p-3 mb-2">
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="dob" class="form-label mb-0 ms-1"> Date of Birth</label>
                        <input type="date" name="dob" class="form-control" value="{{old('dob')}}">
                    </div>
                    <div class="col-2">
                        <label for="maritalStatus" class="form-label mb-0 ms-1">Marital Status</label>
                        <select name="maritalStatus" id="" class="form-select">
                            <option value=""hidden>Select</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="married">Divorsed</option>
                            {{old('maritalStatus')}}
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="phone" class="form-label mb-0 ms-1">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                    </div>
                    <div class="col-4">
                        <label for="email" class="form-label mb-0 ms-1">Email Address <span class="text-danger">*Personal, not company's </span></label>
                        <input type="email" name="email" class="form-control" value="{{old('email')}}">
                    </div>
                </div>
            </div>

            <div class="container bg-secondary-subtle rounded shadow-sm p-3 mb-2">
                <label for="address" class="fw-bold mb-0">Current Address (in Japan)</label>
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="c_postal" class="form-label mb-0 ms-1">Postal Code</label>
                        <input type="text" name="c_postal" class="form-control" value="{{old('c_postal')}}">
                    </div>
                    <div class="col-8">
                        <label for="c_address" class="form-label mb-0 ms-1">Address</label>
                        <input type="text" name="c_address" class="form-control" value="{{old('c_address')}}">
                    </div>
                </div>
    
                <label for="homeaddress" class="fw-bold mb-0">Parmanent Address (Home Country)</label>
                <div class="row">
                    <div class="col-3">
                        <label for="homecountry" class="form-label mb-0 ms-1">Country</label>
                        <input type="text" name="homecountry" class="form-control" value="{{old('homecountry')}}">
                    </div>
                    <div class="col-6">
                        <label for="h_address" class="form-label mb-0 ms-1">Address</label>
                        <input type="text" name="h_address" class="form-control" value="{{old('h_address')}}">
                    </div>
                    <div class="col-3">
                        <label for="h_postal" class="form-label mb-0 ms-1">Postal Code</label>
                        <input type="text" name="h_postal" class="form-control" value="{{old('h_postal')}}">
                    </div>
                </div>
            </div>
            <hr>
            <div class="mt-2 text-center">
                <a href="{{ route('showRequested')}}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary" style="width:20%;">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection