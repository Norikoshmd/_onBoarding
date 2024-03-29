@extends('layouts.app')

@section('title', 'Assign Requests')

@section('content')

{{-- <div class="container bg-white opacity-90 rounded p-3">
    @include('hr.showEndorsed')
</div> --}}
{{-- {{ dd($tasks) }} --}}

<div class="container bg-white opacity-90 rounded p-3 mb-3">
<form action="{{ route('hr.taskStore')}}" method="post">
    @csrf
    <p class="h5 fw-bold">Send Request to </p>
    <div class="card">
        <div class="card-header bg-secondary-subtle">
            <div class="row">
                <div class="col-auto">
                   <img src="{{$employee->passport}}" alt="{{$employee->name}}" class="rounded-circle avatar-sm">
                </div>
                <div class="col-auto">
                    <input type="hidden" name="user_id" value="{{ optional($employee->user)->id}}">
                    {{-- <input type="hidden" name="employee_id" value="{{$employee->id}}"> --}}
                    <a href="{{route('hr.showEndorsed2',$employee->id)}}" class="text-decoration-none text-dark">
                         <p class="h3 mt-3">{{$employee->name}}</p>
                    </a>
                </div>
                <div class="col-auto">
                    @if($employee->dependent == "yes")
                        <span class="badge bg-danger p-2 fs-6 mt-3">Dependent</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container bg-white opacity-90 rounded p-3">

    <div class="accordion" id="accordionfortask">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              BASIC INFO
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <table class="table table-hover align-middle bg-white border-text-secondary">
                    <thead>
                        <tr>
                            <th>Document Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    @foreach ($tasks as $task)
                                        @if($task->category =='Basic')
                                            <div class="form-check">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <input type="checkbox" name="task[]" id="{{ $task->name }}" value="{{ $task->id }}" class="form-check">
                                                    </div>
                
                                                    <div class="col-auto">
                                                        <label for="{{ $task->name }}" class="form-check-label">{{ $task->name }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                            @error('task')
                                                <div class="text-danger text-small">{{ $message }}</div>
                                            @enderror
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                COPIES
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <table class="table table-hover align-middle bg-white border-text-secondary">
                    <thead>
                        <tr>
                            <th>Document Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    @foreach ($tasks as $task)
                                        @if($task->category =='Copies')
                                            <div class="form-check">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <input type="checkbox" name="task[]" id="{{ $task->name }}" value="{{ $task->id }}" class="form-check">
                                                    </div>
                
                                                    <div class="col-auto">
                                                        <label for="{{ $task->name }}" class="form-check-label">{{ $task->name }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                            @error('task')
                                                <div class="text-danger text-small">{{ $message }}</div>
                                            @enderror
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                FOR DEPENDENT(S)
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <table class="table table-hover align-middle bg-white border-text-secondary">
                    <thead>
                        <tr>
                            <th>Document Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    @foreach ($tasks as $task)
                                        @if($task->category =='Dependent')
                                            <div class="form-check">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <input type="checkbox" name="task[]" id="{{ $task->name }}" value="{{ $task->id }}" class="form-check">
                                                    </div>
                
                                                    <div class="col-auto">
                                                        <label for="{{ $task->name }}" class="form-check-label">{{ $task->name }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                            @error('task')
                                                <div class="text-danger text-small">{{ $message }}</div>
                                            @enderror
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

    <div class="row justify-content-center">
        <div class="col-2">
            <a href="{{route('hr.employee')}}" class="mt-3 form-control btn btn-secondary">Cancel</a>
        </div>
        <div class="col-6">
            <button type="submit" class="mt-3 form-control btn btn-primary" >Submit</button>
        </div>
    </div>

</form>
</div>   
@endsection