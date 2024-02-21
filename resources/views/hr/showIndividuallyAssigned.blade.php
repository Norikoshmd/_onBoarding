@extends('layouts.app')

@section('title','Assigned Request')

@section('content')
<div class="container bg-white rounded-3 opacity-90 p-3">
    <p class="h3 p-3"><i class="fa-regular fa-folder-open fa-lg text-secondary"></i>&nbsp;&nbsp; Item(s) requested to</p>

    <div class="bg-primary-subtle rounded p-3 mb-3">
        <p class="h3 p-3">&nbsp;&nbsp;<img src="{{$employee->passport}}" alt=" {{$employee->name}}" class="rounded-circle avatar-sm"> {{$employee->name}} <span class="h5">(Employee ID : {{ $employee->id}})</span></p>
    </div>
   
    
    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="opacity-75">
            <tr class="text-center table table-secondary">
                <th>Requested Date</th>
                <th>Name</th>
                <th>Requested Item</th>
                <th>Assigned by</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employee_tasks as $task)
                @if ($task->employee == $employee )
                    <tr class="text-center">
                        
                        <td>{{date('M d, Y', strtotime($task->created_at))}}</td>
                        <td><a href="{{route('hr.showIndividuallyAssigned',$task->employee->id)}}" class="text-decoration-none text-dark">{{ $task->employee->name}}</a></td>
                        <td class="text-start ms-2">{{ $task->task->name }}</td>
                        <td>{{ $task->user->name }}</td>
                        <td>
                            @if( $task->user->id == Auth::user()->id)
                                <a href="{{ route('hr.assignTask', $employee->id) }}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                                <button class="text-danger btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-request-{{ $task->id }}"><i class="fa-regular fa-trash-can"></i></button></td>
                            @endif
                        </td>
                    </tr>
                    @include('hr.modal.individualaction')
                    
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
    
    <div class="d-flex justify-content-center mt-2">
        {{ $employee_tasks->links() }}
    </div>


@endsection