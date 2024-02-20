@extends('layouts.app');

@section('title', 'Welcome');

@section('content')

<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa-solid fa-bullhorn fa-2x"></i>&nbsp;&nbsp; <p class="h5 mt-1 fw-bold">Announcements</p> &nbsp;&nbsp;
           
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          @if($employee_tasks !== 0)
            @foreach ($employee_tasks as $task)
              {{-- @if($task->employee_id == $employees) --}}
                <div class="alert alert-info" role="alert">
                  <p class="h5 p-2">Requested to submit <a href="#" class="alert-link"> {{ $task->task->name }}</a>  &nbsp;&nbsp; </p>
                </div>
              {{-- @endif --}}
            @endforeach
          @endif
          <div class="d-flex justify-content-center mt-1">
            {{ $employee_tasks->links() }}
          </div>
        </div>
       
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <i class="fa-solid fa-circle-exclamation fa-2x"></i>&nbsp;&nbsp; <p class="h5 mt-1 fw-bold">Notification</p> &nbsp;&nbsp; &nbsp;
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            {{-- @if($employees !== 0)
            @foreach ($employees as $employee)
                <div class="alert alert-warning" role="alert">
                    Document submitted from <a href="{{ route('hr.showEndorsed',$employee->id)}}" class="alert-link"> {{ $employee->name }}</a>.  &nbsp;&nbsp; <span class="h6 text-muted">{{$employee->created_at}}</span>
                </div>
            @endforeach --}}
        {{-- @endif --}}
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa-solid fa-circle-info fa-2x"></i>&nbsp;&nbsp; <p class="h5 mt-1 fw-bold">Info</p> &nbsp;&nbsp;
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            {{-- @if($employees !== 0)
                @foreach ($employees as $employee)
                    <div class="alert alert-info" role="alert">
                        New employee <a href="{{ route('hr.showEndorsed',$employee->id)}}" class="alert-link"> {{ $employee->name }}</a> is assigned.  &nbsp;&nbsp; <span class="h6 text-muted">{{$employee->created_at}}</span>
                    </div>
                @endforeach
            @endif --}}
        </div>
      </div>
  </div>

    
</div>



@endsection
