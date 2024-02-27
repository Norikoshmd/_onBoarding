@extends('layouts.app')

@section('title','Submitted Pension Book / Notice')

@section('content')

<div class="container bg-white opacity-90 rounded p-3 shadow-lg">
    @forelse ($doc4s as $doc4)
        <div class="h1 h5 mt-2 fw-bold">
            <i class="fa-solid fa-pen-to-square fa-lg"></i> &nbsp;&nbsp;Submitted Pension Book / Notice of {{$doc4->user->name}}
            <div class="p-3">
                <img src="{{ $doc4->image }}" alt="{{$doc4->user->name}}">

            </div>

        </div>

            
    @empty
        <div class="bg-secondary-subtle p-3">
            <p class="h5">Pension Book/Notice has not been submitted yet</p>
        </div>
    @endforelse
        </div> 
@endsection