@extends('layouts.app')

@section('title','HR Home')

@section('content')
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa-regular fa-user fa-lg"></i>&nbsp;&nbsp; New Employee &nbsp;
            <span class="badge bg-danger">Badge</span>
            {{-- add count in badge --}}
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            @if($employees !== 0)
                @foreach ($employees as $employee)
                    <div class="alert alert-info" role="alert">
                        New employee <a href="{{ route('hr.showEndorsed',$employee->id)}}" class="alert-link"> {{ $employee->name }}</a> is assigned.  &nbsp;&nbsp; <span class="h6 text-muted">{{$employee->created_at}}</span>
                    </div>
                @endforeach
            @endif
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <i class="fa-solid fa-folder fa-lg"></i></i>&nbsp;&nbsp; Documents submitted &nbsp;
            <span class="badge bg-danger">Badge</span>
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            @if($employees !== 0)
            @foreach ($employees as $employee)
                <div class="alert alert-warning" role="alert">
                    Document submitted from <a href="{{ route('hr.showEndorsed',$employee->id)}}" class="alert-link"> {{ $employee->name }}</a>.  &nbsp;&nbsp; <span class="h6 text-muted">{{$employee->created_at}}</span>
                </div>
            @endforeach
        @endif
        </div>
      </div>
    </div>
  </div>

  {{-- badge to use --}}
<div class="container bg-white opacity-90 p-3 rounded mb-3">
    <p class="h4">what's new

    
            <button type="button" class="btn btn-info position-relative rounded-pill">
                Inbox
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  99+
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button></p>
    
    
    
</div>



@endsection