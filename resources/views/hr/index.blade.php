@extends('layouts.app')

@section('title','HR Home')

@section('content')
<div class="accordion" id="accordion">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h1 class="p-3 h3"><i class="fa-regular fa-user fa-lg"></i>&nbsp;&nbsp; New Employees
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordion">
        <div class="accordion-body">
            @if($employees !== 0)
                @foreach ($employees as $employee)
                    <div class="alert alert-info" role="alert">
                      <p class="h5 p-2">New employee <a href="{{route('hr.showEndorsed3',$employee->id)}}" class="alert-link"> {{ $employee->name }}</a> is assigned.  &nbsp;&nbsp; <span class="h6 text-muted">{{ date('M d, Y', strtotime($employee->created_at)) }}</span></p>
                    </div>
                @endforeach
            @endif
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h1 class="h3 p-3"><i class="fa-regular fa-folder-open fa-lg"></i>&nbsp;&nbsp; Submitted Documents
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordion">
        <div class="accordion-body">
          @if($user_tasks !== 0)
            @foreach ($user_tasks as $task)
              @if($task->getIsSubmitted())
                <div class="alert alert-warning" role="alert">
                  <p class="h5 p-2"><a href="#" class="alert-link">{{ $task->user->name }} </a> submitted <span class="fw-bold"> {{ $task->task->name }}</span>  &nbsp;&nbsp; <span class="h6 text-muted">{{ date('M d, Y', strtotime($task->updated_at)) }}</span></p>
                </div>
              @endif
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>

@endsection