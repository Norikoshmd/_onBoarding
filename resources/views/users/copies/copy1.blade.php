@extends('layouts.app')

@section('title','Pension Info')

@section('content')

<div class="container bg-white opacity-90 rounded p-3 shadow-lg">
    <div class="h1 h5 mt-2 fw-bold">
        Pension Book / Pension Certificate | 年金手帳、基礎年金番号通知書  <i class="fa-solid fa-address-card fa-lg"></i> 
    </div>
    <hr>

    <div class="row">
        <div class="col-6">
            <div class="card rounded p-3">
                <p class="h5 fw-bold mx-auto">Basic Pension Number Notice</p>
                <hr>
                <img src="{{asset('css/BasicPensionNumberNotice.png')}}" alt="pensionNumber" class="styled-img mx-auto">
            </div>
        </div>
        <div class="col-6">
            <div class="card rounded p-3">
                <p class="h5 fw-bold mx-auto">Basic Pension Number Book</p>
              
                <hr>
                <p class="h6 text-danger text-end">* issued by 2022 March (Abolished and no longer issued) </p>
                <img src="{{asset('css/BasicPensionNumberBook.png')}}" alt="pensionNumber" class="styled-img mx-auto">
            </div>
        </div>
    </div>

    <div class="row p-3">
        <p class="h5">English</p>

        <iframe width="150" height="150" src="https://www.youtube.com/embed/X9gvaCcb5_k?si=IFIUPWsIWLHYLXaS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="styled-iframe"></iframe>

        <p>For more languages <br>
        <a href="https://www.nenkin.go.jp/service/learn/shitteokitai_gaikoku.html">https://www.nenkin.go.jp/service/learn/shitteokitai_gaikoku.html</a>
        </p>
    </div>

</div>

@endsection