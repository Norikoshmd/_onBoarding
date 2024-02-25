@extends('layouts.app')

@section('title','Submitted Information')

@section('content')

<div class="container bg-white opacity-90 rounded p-3 shadow-lg">

    @forelse ($docs as $doc)
    <div class="h1 h5 mt-2 fw-bold">
        <i class="fa-solid fa-pen-to-square fa-lg"></i> &nbsp;&nbsp;Submitted Employee Information Form of {{$doc->firstname}}
        <div class="px-3">
            <div class="container bg-secondary-subtle rounded shadow-sm p-3 mb-2">
                <div class="row justify-content-center mb-3">
                    <div class="col-4">
                        <label for="firstname" class="form-label mb-0 ms-1">First Name</label>
                        <p class="h6">{{$doc->firstname}}</p>
                    </div>
                    <div class="col-4">
                        <label for="middlename" class="form-label mb-0 ms-1">Middle Name <span class="text-secondary">*</span></label>
                        <p class="h6">{{$doc->middlename}}</p>
                    </div>
                    <div class="col-4">
                        <label for="lastname" class="form-label mb-0 ms-1">Last Name</label>
                        <p class="h6">{{$doc->lastname}}</p>
                    </div>
                </div>
                
                <label for="kana_name" class="fw-bold mb-0">Katakana <span class="text-danger">*if you can</span></label>
                <div class="row justify-content-center mb-3">
                    <div class="col-4">
                        <label for="namae" class="form-label mb-0 ms-1">First Name</label>
                        <p class="h6">{{$doc->namae}}</p>
                    </div>
                    <div class="col-4">
                        <label for="middlename_kana" class="form-label mb-0 ms-1">Middle Name <span class="text-secondary">*</span></label>
                        <p class="h6">{{$doc->middlename_kana}}</p>
                    </div>
                    <div class="col-4">
                        <label for="myouji" class="form-label mb-0 ms-1">Last Name</label>
                        <input type="text" name="myouji" class="form-control" value="{{old('myouji')}}">
                        <p class="h6">{{$doc->myouji}}</p>
                    </div>
                </div>
            </div>
            <div class="container bg-white rounded shadow-sm p-3 mb-2">
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="dob" class="form-label mb-0 ms-1"> Date of Birth</label>
                        <p class="h6">{{$doc->dob}}</p>
                    </div>
                    <div class="col-2">
                        <label for="maritalStatus" class="form-label mb-0 ms-1">Marital Status</label>
                        <select name="maritalStatus" id="" class="form-select">
                            <option value=""hidden>Select</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="married">Divorsed</option>
                            {{$doc->maritalStatus}}
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="phone" class="form-label mb-0 ms-1">Phone Number</label>
                        <p class="h6">{{$doc->phone}}</p>
                    </div>
                    <div class="col-4">
                        <label for="email" class="form-label mb-0 ms-1">Email Address <span class="text-danger">Personal</span></label>
                        <p class="h6">{{$doc->email}}</p>
                    </div>
                </div>
            </div>

            <div class="container bg-secondary-subtle rounded shadow-sm p-3 mb-2">
                <label for="address" class="fw-bold mb-0">Current Address (in Japan)</label>
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="c_postal" class="form-label mb-0 ms-1">Postal Code</label>
                        <p class="h6">{{$doc->c_postal}}</p>
                    </div>
                    <div class="col-8">
                        <label for="c_address" class="form-label mb-0 ms-1">Address</label>
                        <p class="h6">{{$doc->c_address}}</p>
                    </div>
                </div>
    
                <label for="homeaddress" class="fw-bold mb-0">Parmanent Address (Home Country)</label>
                <div class="row">
                    <div class="col-3">
                        <label for="homecountry" class="form-label mb-0 ms-1">Country</label>
                        <p class="h6">{{$doc->homecountry}}</p>
                    </div>
                    <div class="col-6">
                        <label for="h_address" class="form-label mb-0 ms-1">Address</label>
                        <p class="h6">{{$doc->h_address}}</p>
                    </div>
                    <div class="col-3">
                        <label for="h_postal" class="form-label mb-0 ms-1">Postal Code</label>
                        <p class="h6">{{$doc->h_postal}}</p>
                    </div>
                </div>
            </div>
    </div>
    <hr>
  
        <div class="mt-2 text-center">
            <a href="{{ route('showRequested')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
        
    @empty
        <div class="bg-secondary-subtle p-3">
            <p class="h5">Form has not been submitted yet</p>
        </div>
    @endforelse
</div> 
@endsection