@extends('layouts.app')

@section('title','Assigned Request')

@section('content')
<div class="container bg-white rounded-3 opacity-90 p-3">
    <p class="text-muted text-end"><i class="fa-solid fa-clipboard-list fa-lg"></i> Requested Items >> {{$user->name}}</p>

    <p class="h3 p-2">
        <i class="fa-regular fa-folder-open fa-lg text-secondary"></i>&nbsp;&nbsp; Items requested to
    </p>
    <div class="bg-primary-subtle rounded p-3 mb-3">
        
        <p class="h3 p-3">&nbsp;&nbsp;<img src="{{$user->employee->passport}}" alt=" {{$user->employee->name}}" class="rounded-circle avatar-sm">&nbsp; {{$user->employee->name}} &nbsp;<span class="badge bg-primary">User ID : {{ $user->id}}</span></p>
    </div>
   
    <form action="{{ route('hr.taskStore2')}}" method="post">
        @csrf
        <div class="row p-3 justify-content-center mb-3">
           <input type="hidden" name="user_id" value="{{ $user->id}}">
        
           <select name="task[]" id="task" class="form-select ms-2" style="width:60%;">
                <option value=""hidden>Select</option>
                    @foreach ($tasks as $task)
                        <option value="{{ $task->id }}" >{{ $task->id }}&nbsp;:&nbsp;{{ $task->name }}</option>
                    @endforeach
           </select>
            <button type="submit" class="ms-2 btn btn-primary" style="width:10%;"> <i class="fa-solid fa-plus"></i> Add</button>
        </div>
        
        @error('task')
            <p class="text-danger text-small">{{ $message }}</p>
        @enderror
    </form>
    
    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="opacity-75">
            <tr class="text-center table table-secondary">
                <th>Requested Date</th>
                <th>Name</th>
                <th>Requested Item</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($user_tasks as $task)
            @if ($task->user_id == $user->id )
                    <tr class="text-center">
                        <td>{{date('M d, Y', strtotime($task->created_at))}}</td>
                        <td><a href="{{route('hr.showIndividuallyAssigned',$task->user->id)}}" class="text-decoration-none text-dark">{{ $task->user->name}}</a></td>
                        <td class="text-start ms-2">{{ $task->task->name }}</td>
                        <td>
                            <button class="text-danger btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-request-{{ $task->id }}"><i class="fa-regular fa-trash-can"></i></button></td>
                        </td>
                    </tr>
                    @include('hr.modal.individual_action')
                    
                @else
                @endif
            @empty
                <div class="bg-info-subtle rounded p-3 mt-2 mb-2 ">
                    <p class="text-muted h5 text-center">No Task has Assigned yet.</p>
                </div>

            
            @endforelse
  
               
        </tbody>
    </table>

</div>


@endsection