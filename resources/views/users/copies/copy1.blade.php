@extends('layouts.app')

@section('title','Pension Info')

@section('content')

<div class="container bg-white opacity-90 rounded p-3 shadow-lg">
    <div class="h1 h4 mt-2 fw-bold">
        Pension Notice / Pension Book | 基礎年金番号通知書、年金手帳  <i class="fa-solid fa-address-card fa-lg"></i> 
    </div>
    <hr>
    <div class="bg-secondary-subtle rounded p-3">
        <p class="h5 fw-bold">How it looks like?</p>
    </div>
    <p class="h5 mt-3 ms-5"> 2 types exists depending on when your pension number is issued. <br>
    <span class="h6 text-danger ms-5">("2. Basic Pension Number Book" has been abolished in 2022 March and no longer issued after that.)</span>

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
                    <span class="h6">( "年金手帳" in Japanese ) </span></p>
              
                <hr>
                <img src="{{asset('css/BasicPensionNumberBook.png')}}" alt="pensionNumber" class="styled-img mx-auto">
            </div>
        </div>
    </div>
    <div class="bg-secondary-subtle rounded p-3 mb-3">
        <p class="h5 fw-bold ms-2 ">Submit &nbsp;<span class=" h6 text-danger">*Please make sure the data has your pension number (10 digits) </span></p>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-11">
            <p class="h5 mb-3">Please submit the copy of "<span class="fw-bold">1.Basic Pension Number Notice</span>" or "<span class="fw-bold">2. Basic Pension Number Book</span>"
        </div>
    </div>
    
    <div class="row mb-3">
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
            <hr>
            <div class="row justify-content-center">
                <div class="col-11">
                    <p class="h5 mb-3">*In case "<span class="fw-bold">you are new to Japan(no work experience)</span>", 
                        or "<span class="fw-bold">you only know your basic pension number</span>"
                </div>
            </div>

            <div class="row mb-3 justify-content-center">
                <div class="col-5">
                    <input type="number" name="pensionnumber" class="form-control" placeholder="ONLY For you who 1. is new to Japan, 2. lost pension notice/book ">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
    
    {{-- Accordion Start --}}
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <p class="h5 fw-bold"><span class="badge bg-white text-secondary">Reference</span> Q : I
                    don't have such notice or book. Where can I get it?</p> 
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <p class="h5 mt-1 ms-5 text-danger"> A : Unless you are new to Japan or haven't worked in Japan, you should have your basic pension number.
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Please refer to the below table for .
                </p>
            
                <table class="table table-hover align-middle bg-white border-text-secondary w-75 mx-auto">
                    <thead>
                        <tr class="text-center table table-secondary">
                            <th>Case</th>
                            <th>Condition</th>
                            <th>Action</th>
                        </tr>
                        
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>1</td>
                            <td>You are new in Japan (No Work Experience) </td>
                            <td class="text-start">Apologies for our internal miscommunication. <br> Please notify us through submit section. <br> <span class="text-danger fw-bold">Request : Please encode '9999999999' (hit '9' 10 times)on 'Submit' section '(Basic Pension Number)' field.</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Has Worked in Japan</td>
                            <td class="text-start">If you cannot find basic pension number printed on 1. or 2., you can inquire your previous company HR and submit from the second input field (please use the field to encode your 10digits pension number). </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>(your dependent) <br>New to Japan and has not Worked and will not work in Japan <span class="text-secondary">or work part-time - Annual Income within JPY1,030,000</span> </td>
                            <td class="text-start">If your dependent has not worked in Japan(in case he/she has worked in Japan, please follow 'case:2'), please submit from dependent data submission. We will process it.  </td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <p class="h5 fw-bold"><span class="badge bg-white text-secondary">Reference</span> What "National Pension System" is and how it works (English)</p>
            </div>
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <iframe width="500" height="250" src="https://www.youtube.com/embed/X9gvaCcb5_k?si=IFIUPWsIWLHYLXaS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="styled-iframe"></iframe>

                <p>For more languages <br>
                <a href="https://www.nenkin.go.jp/service/learn/shitteokitai_gaikoku.html">https://www.nenkin.go.jp/service/learn/shitteokitai_gaikoku.html</a>
                </p>
            </div>
          </div>
        </div>
    </div>
    {{-- Acordion End --}}
</div>

@endsection