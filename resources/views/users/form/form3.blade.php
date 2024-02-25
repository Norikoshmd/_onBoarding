@extends('layouts.app')

@section('title','My Number Card ("Individual Number Card")')

@section('content')

<div class="container bg-white opacity-90 rounded p-3 shadow-lg">
    <div class="h1 h5 mt-2 fw-bold">
        <i class="fa-solid fa-pen-to-square fa-lg"></i> &nbsp;&nbsp;My Number Card ("Individual Number Card")
    </div>
    <hr>
    <div class="bg-secondary-subtle rounded p-3 mb-3">
        <p class="h5 fw-bold">Submission <span class="h6 ms-3 text-danger fw-bold"> * No Data submission available </span></p>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-auto">
            <img src="{{asset('css/mynumber_f.png')}}" alt="mynumber_card_f">
        </div>
        <div class="col-auto">
            <img src="{{asset('css/mynumber_b.png')}}" alt="mynumber_card_b">
        </div>
    </div>

    <h1 class="h6 ms-3"> My Number Card is an official identification card required for all of us here in Japan.</h1>
    <br>
    <h1 class="h6 ms-3"> As it is highly confidential, we request you to either</h1>
    <h1 class="h6 ms-5 fw-bold"> 1. Post(mail out) photocopy(back and front of the card) to our office </h1>
    <h1 class="h6 ms-5 fw-bold"> 2. Drop by with the card when you are around our office / for an appointment <span class="text-primary fw-light">(9:00am to 6:00pm Mon-Fri except National Holidays)</span> </h1>
    <h1 class="h6 ms-3 text-danger fw-bold mb-3"> *Sending via an email, data submission is strictly prohibited. </h1>
    <hr>
    <div class="p-2 rounded">
        <div class="bg-secondary-subtle rounded p-3 mb-3">
            <p class="h5 fw-bold"> Please inform us by selecting submit method </p>
        </div>
    <form action="#" method="post" enctype="multipart/form-data">
    @csrf
        <div class="row">
                <div class="col-3">
                    <label for="how" class="label-control fw-bold ms-2 mb-2">How to submit</label>
                    <select name="how" id="if_submitted" class="form-select">
                        <option value=""hidden>Select</option>
                        <option value="post">Posted</option>
                        <option value="office-visit">Scheduled visit to office</option>
                    </select>
            
                </div>
                <div class="col-3">
                    <label for="date" class="label-control fw-bold ms-2 mb-2">Date posted/visiting office</label>
                    <input type="date" name="date" id="date" class="form-control">
                </div>
                <div class="col-3">
                    <label for="time" class="label-control fw-bold ms-2 mb-2">Time visiting office <span class="text-secondary">*if you visit</span></label>
                    <input type="time" name="time" id="time" class="form-control">
                </div>

                <div class="col-3">
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </div>
                
            </div>
        </form>
        
    </div>




    <hr>
    <p class="h5 ms-5 fw-bold"> Our office </p>
    <p class="h6 ms-5"> 宛先 : 〒123-4567 東京都港区1234-567 ジャパンシステムズ株式会社 HR </p>
    <p class="h6 ms-5 mb-3"> Address to Post :  1234-567 Minato-ku Tokyo 〒123-4567 Japan Systems HR  </p>

    <div class="accordion" id="accordion">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <p class="h5 fw-bold"><span class="badge bg-white text-secondary">Reference</span> What is My Number Card?</p> 
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <span class="badge bg-secondary text-secondary text-white p-2 ">Link</span> <a href="https://www.kojinbango-card.go.jp/en-kojinbango/">What is an Individual Number Card? and what you can do.</a>
            </div>
          </div>
        </div>
    </div>
    <hr>
    <div class="text-center">
        <a href="{{route('showRequested')}}" class="mt-3 form-control btn btn-secondary" style="width:30%;">Back</a>
    </div>

@endsection