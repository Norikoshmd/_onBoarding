@extends('layouts.app')

@section('title','')

@section('content')

<div class="container bg-white opacity-90 rounded p-3 shadow-lg">
    <div class="h1 h4 mt-2 fw-bold">
        Pension book/certificate for dependent spouse
    </div>
    <hr>
    <div class="bg-secondary-subtle rounded p-3">
        <p class="h5 fw-bold">Submission</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-11">
            <p class="h5 mb-4 mt-3">Please submit the copy of "<span class="fw-bold">1.Basic Pension Number Notice</span>" or "<span class="fw-bold">2. Basic Pension Number Book</span>" of your spouse, dependent(s).
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <div class="card rounded p-3">
                <p class="h5 fw-bold mx-auto">1. Basic Pension Number Notice <span class="h6">( "基礎年金番号通知書" in Japanese )</span></p>
                <hr>
                <img src="{{asset('css/BasicPensionNumberNotice.png')}}" alt="pensionNumber" class="styled-img mx-auto">
            </div>
        </div>
        <div class="col-6">
            <div class="card rounded p-3">
                <p class="h5 fw-bold mx-auto">2. Basic Pension Number Book <span class="fs-6 text-danger">*Abolished</span>
                    <span class="h6">( "年金手帳" in Japanese ) </span>
                </p>
            <hr>
                <img src="{{asset('css/BasicPensionNumberBook.png')}}" alt="pensionNumber" class="styled-img mx-auto">
            </div>
        </div>
    </div>

    <form action="#" method="post">
        @csrf
       
        <div class="row mb-3 justify-content-center">
            <div class="col-3">
                <input type="file" name="pension" id="pension" class="form-control">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
        <hr>
           <div class="text-center">
               <a href="{{route('showRequested')}}" class="mt-3 form-control btn btn-secondary" style="width:30%;">Back</a>
           </div>
    </div>
   
</div>

@endsection