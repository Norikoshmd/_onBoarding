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
    <h1 class="h6 ms-3 text-danger fw-bold"> *Sending via an email, data submission is strictly prohibited. </h1>
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