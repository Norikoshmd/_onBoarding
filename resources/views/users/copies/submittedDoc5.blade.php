@extends('layouts.app')

@section('title','Submitted Pension Book / Notice')

@section('content')

<div class="container bg-white opacity-90 rounded p-3 shadow-lg">
    @forelse ($doc5s as $doc5)
        <div class="h1 h5 mt-2 fw-bold">
            <i class="fa-solid fa-pen-to-square fa-lg"></i> &nbsp;&nbsp;Submitted Employment Insurance Card | 雇用保険被保険者証 
             of {{$doc5->user->name}}
            <div class="p-3">
                <img src="{{ $doc5->image }}" alt="{{$doc5->user->name}}">

            </div>

        </div>

            
    @empty
        <div class="bg-secondary-subtle p-3">
            <p class="h5">Employment Insurance Card | 雇用保険被保険者証  has not been submitted yet</p>
        </div>
    @endforelse
        </div> 
@endsection