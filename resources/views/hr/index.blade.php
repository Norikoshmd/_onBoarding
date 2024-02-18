@extends('layouts.app')

@section('title','HR Home')

@section('content')
<div class="accordion" id="accordion">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
           <h1 class="h3 p-3"><i class="fa-regular fa-user fa-lg"></i>&nbsp;&nbsp; New Employee
            <span class="badge bg-danger rounded-pill">{{ $employees->count() }}</span></h1>
            {{-- add count in badge{{$employee->id->count()}} --}}
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordion">
        <div class="accordion-body">
            @if($employees !== 0)
                @foreach ($employees as $employee)
                    <div class="alert alert-info" role="alert">
                      <p class="h5 p-2">New employee <a href="{{route('hr.showEndorsed3',$employee->id)}}" class="alert-link"> {{ $employee->name }}</a> is assigned.  &nbsp;&nbsp; <span class="h6 text-muted">{{ date('M d, Y', strtotime($employee->created_at)) }}</span>
                    </div>
                @endforeach
            @endif
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h1 class="h3 p-3"><i class="fa-solid fa-folder fa-lg"></i>&nbsp;&nbsp;Documents submitted
          <span class="badge bg-danger rounded-pill">{{ $employees->count() }}</span></h1>
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordion">
        <div class="accordion-body">
            @if($employees !== 0)
            @foreach ($employees as $employee)
                <div class="alert alert-warning" role="alert">
                  <p class="h5 p-2">Document submitted from <a href="{{ route('hr.showEndorsed',$employee->id)}}" class="alert-link"> {{ $employee->name }}</a>.  &nbsp;&nbsp; <span class="h6 text-muted">{{ date('M d, Y', strtotime($employee->created_at)) }}</span></p>
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