@extends('layouts.app')

@section('title','')

@section('content')

<div class="container bg-white opacity-90 rounded p-3 shadow-lg">
    <div class="h1 h4 mt-2 fw-bold">
        <i class="fa-solid fa-pen-to-square fa-lg"></i>  Pension book/certificate for your spouse
    </div>
    <hr>
    <div class="bg-secondary-subtle rounded p-3">
        <p class="h5 fw-bold">Submission</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-11">
            <p class="h5 mb-4 mt-3">Please submit the copy of "<span class="fw-bold">1.Basic Pension Number Notice</span>" or "<span class="fw-bold">2. Basic Pension Number Book</span>" of your spouse.</p>
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

    <div class="container p-3">
        <form action="{{ route('doc.storeDoc7') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row mb-5 justify-content-center">
                <div class="col-3">
                    <label for="data" class="label-control fw-bold mb-2">1. Data Submission</label>
                    <input type="file" name="pension" id="pension" class="form-control">
                </div>
                <div class="col-5">
                    <label for="number" class="label-control fw-bold mb-2">2. Number Submission <span class="text-danger">* please disregard if you upload 1.</span></label>
                    <input type="number" name="pensionnumber" class="form-control" placeholder="ONLY For you who 1. is new to Japan, 2. lost pension notice/book ">
                </div>

                <div class="col-3">
                    <div class="col-auto">
                        <label for="choose" class="label-control fw-bold mb-2"> Submit 1 or 2</label><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>

          

            <div class="accordion" id="accordion">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <p class="h5 fw-bold"><span class="badge bg-white text-secondary">Reference</span> Q : My spouse
                            doesn't have such notice or book. Where can he/she get it?</p> 
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="h5 mt-1 ms-5 text-danger"> A : Unless he/she is new to Japan or hasn't worked in Japan, you should have your basic pension number.
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Please refer to the below table for your required action.
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
                                    <td>He/She is new in Japan (No Work Experience) </td>
                                    <td class="text-start"> Please notify us through submit section. <br> <span class="text-danger fw-bold">Request : Please encode '9999999999' (hit '9' 10 times)on 'Submit' section '(Basic Pension Number)' field above.</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>He/She has Worked in Japan</td>
                                    <td class="text-start">If he/she cannot find basic pension number printed on 1. or 2., he/she can inquire his/her previous company HR and submit from the second input field above (please use the 2nd field to encode your 10digits pension number). </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>He/She is new to Japan and has not Worked and will not work in Japan <span class="text-secondary">or work part-time and Annual Income within JPY1,030,000</span> </td>
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
                        <iframe width="750" height="500" src="https://www.youtube.com/embed/X9gvaCcb5_k?si=IFIUPWsIWLHYLXaS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="styled-iframe"></iframe>
        
                        <p>For more languages <br>
                        <a href="https://www.nenkin.go.jp/service/learn/shitteokitai_gaikoku.html">https://www.nenkin.go.jp/service/learn/shitteokitai_gaikoku.html</a>
                        </p>
                    </div>
                  </div>
                </div>    {{-- Acordion End --}}
                <hr>
                   <div class="text-center">
                       <a href="{{route('showRequested')}}" class="mt-3 form-control btn btn-secondary" style="width:30%;">Back</a>
                   </div>
            </div>
         
        </form>
    </div>
</div>

@endsection