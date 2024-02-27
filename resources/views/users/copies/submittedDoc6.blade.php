@extends('layouts.app')

@section('title','Submitted Pension Book / Notice')

@section('content')

<div class="container bg-white opacity-90 rounded p-3 shadow-lg">
    @forelse ($doc6s as $doc6)
        <div class="h1 h5 mt-2 fw-bold">
            <i class="fa-solid fa-pen-to-square fa-lg"></i> &nbsp;&nbsp;Submitted Income Tax Withholing Slip | 給与所得者の源泉徴収票 of {{$doc6->user->name}}
            <div class="p-3">
                <img src="{{ $doc6->image }}" alt="{{$doc6->user->name}}">
            </div>

        </div>

            
    @empty
        <div class="bg-secondary-subtle p-3">
            <p class="h5">Income Tax Withholing Slip | 給与所得者の源泉徴収票  has not been submitted yet</p>
        </div>
    @endforelse
        </div> 
@endsection