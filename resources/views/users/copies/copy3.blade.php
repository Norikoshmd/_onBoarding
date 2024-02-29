@extends('layouts.app')

@section('title','Pension Info')

@section('content')

<div class="container bg-white opacity-90 rounded p-3 shadow-lg">
    <div class="h1 h4 mt-2 fw-bold">
        Income Tax Withholing Slip | 給与所得者の源泉徴収票 
    </div>
    <hr>
    <div class="bg-secondary-subtle rounded p-3">
        <p class="h5 fw-bold">Submission</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-11">
            <p class="h5 mb-4 mt-3">Please submit the copy of "<span class="fw-bold">Income Tax Withholing Slip ( "給与所得者の源泉徴収票" in Japanese )</span>" </p>
        </div>
    </div>

    <div class="row p-3 justify-content-center">
        <img src="{{asset('css/Gensenchoshu.jpg')}}" alt="IncomeTaxWithholingSlip" style="width:40%;">
    </div>

    <form action="{{ route('doc.storeDoc6') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_task_id" value="{{$user_task_id}}">
        <div class="row mb-2 justify-content-center">
            <div class="col-7">
                <p class="h6 text-danger ms-5 fw-bold">* You will be receiving this from your previous(current) employer after you have resigned. </p>
                <p class="h6 text-danger ms-5 fw-bold">&nbsp; Please submit once you received. </p>
            </div>
        </div>
        <div class="row mb-5 justify-content-center">
            <div class="col-3">
                <input type="file" name="gensen" id="gensen" class="form-control">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    
    {{-- Accordion Start --}}
    <div class="accordion" id="accordion">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <p class="h5 fw-bold"><span class="badge bg-white text-secondary">Reference</span> What is Nenmatsu Chosei/Gensen Choshuhyo?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <a href="https://jopus.net/en/column/year-end-tax-adjustment.html">https://jopus.net/en/column/year-end-tax-adjustment.html</a>
            </div>
          </div>
        </div>
    </div>   
        <hr>
           <div class="text-center">
               <a href="{{route('showRequested')}}" class="mt-3 form-control btn btn-secondary" style="width:30%;">Back</a>
           </div>
    </div>
   
</div>

@endsection