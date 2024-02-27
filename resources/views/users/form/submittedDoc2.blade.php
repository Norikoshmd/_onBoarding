@extends('layouts.app')

@section('title','Submitted Emergency Contact Form')

@section('content')

<div class="container bg-white opacity-90 rounded p-3 shadow-lg">

    <div class="container bg-white opacity-90 rounded p-3 shadow-lg">
        <div class="h1 h5 mt-2 fw-bold">
            <i class="fa-solid fa-pen-to-square fa-lg"></i> &nbsp;&nbsp;Submitted : Emergency Contact Form of {{ $doc2->name }}
        </div>
        <hr>
    
        <div class="mb-3">
            <p class="h6 ms-4">Please submit 2 contacts (in Japan and in your home country) we can contact in case of emergency <span class="text-danger">*</span>.</p>
            <p class="h6 ms-5 text-danger">(Any accident/incident you encountered when you are at work/on your way to/from work that needs company's assistance)</p>
            
        </div>
    
        <div class="px-3">
            <form action="{{ route('doc.storeForm2')}}" method="post">
                @csrf
            {{-- Emergency Contact 1 --}}
                <div class="container rounded bg-secondary-subtle shadow-sm p-3 mb-2">
                    <div class="row mb-3">
                        <p class="h5 fw-bold mb-3">Emergency Contact 1 (in Japan) </p>
                        <div class="col-3">
                            <label for="firstname1" class="form-label mb-0 ms-1">First Name</label>
                            <input type="text" name="firstname1" class="form-control" value="{{ $doc2->firstname1}}">
                        </div>
                           
                        <div class="col-3">
                            <label for="lastname1" class="form-label mb-0 ms-1">Last Name</label>
                            <input type="text" name="lastname1" class="form-control" value="{{ $doc2->lastname1 }}">
                        </div>
                           
                        <div class="col-4">
                            <label for="relationship1" class="form-label mb-0 ms-1">Relationship with you</label>
                            <input type="text" name="relationship1" class="form-control" value="{{ $doc2->relationship1 }}">
                        </div>
                           
                    </div>
                    <div class="row mb-3">
                        <div class="col-2">
                            <label for="postal1" class="form-label mb-0 ms-1">Postal Code</label>
                            <input type="text" name="postal1" class="form-control" value="{{ $doc2->postal1 }}">
                        </div>
                       
    
                        <div class="col-4">
                            <label for="address1" class="form-label mb-0 ms-1">Home Address</label>
                            <input type="text" name="address1" class="form-control" value="{{ $doc2->address1 }}">
                        </div>
                       
    
                        <div class="col-3">
                            <label for="email1" class="form-label mb-0 ms-1">Email Address</label>
                            <input type="email1" name="email1" class="form-control" value="{{ $doc2->email1 }}">
        
                        </div>
                      
                        <div class="col-3">
                            <label for="phone1" class="form-label mb-0 ms-1">Phone Number</label>
                            <input type="text" name="phone1" class="form-control" value="{{ $doc2->phone1 }}">
                        </div>
                       
    
                    </div>
                </div>
                   
    
            {{-- Emergency Contact 2 --}}
                <div class="container rounded bg-secondary-subtle shadow-sm p-3 mb-2">
                    <div class="row mb-3">
                        <p class="h5 fw-bold mb-3">Emergency Contact 2 </p>
                        <div class="col-3">
                            <label for="firstname2" class="form-label mb-0 ms-1">First Name</label>
                            <input type="text" name="firstname2" class="form-control" value="{{ $doc2->firstname2 }}">
                        </div>
                           
                      
                        <div class="col-3">
                            <label for="lastname2" class="form-label mb-0 ms-1">Last Name</label>
                            <input type="text" name="lastname2" class="form-control" value="{{ $doc2->lastname2 }}">
                        </div>
                         
    
                        <div class="col-4">
                            <label for="relationship2" class="form-label mb-0 ms-1">Relationship with you</label>
                            <input type="text" name="relationship2" class="form-control" value="{{ $doc2->relationship2 }}">
                        </div>
                           
                    </div>
                    <div class="row mb-3">
                        <div class="col-2">
                            <label for="postal2" class="form-label mb-0 ms-1">Postal Code</label>
                            <input type="text" name="postal2" class="form-control" value="{{ $doc2->postal2 }}">
                        </div>
                          
                        <div class="col-4">
                            <label for="address2" class="form-label mb-0 ms-1">Home Address</label>
                            <input type="text" name="address2" class="form-control" value="{{ $doc2->address2 }}">
                        </div>
                            
                        <div class="col-3">
                            <label for="email2" class="form-label mb-0 ms-1">Email Address</label>
                            <input type="email2" name="email2" class="form-control" value="{{ $doc2->email2 }}">
                        </div>
                           
                        <div class="col-3">
                            <label for="phone2" class="form-label mb-0 ms-1">Phone Number</label>
                            <input type="text" name="phone2" class="form-control" value="{{ $doc2->phone2 }}">
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