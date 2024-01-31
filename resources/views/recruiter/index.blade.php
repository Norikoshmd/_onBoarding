@extends('layouts.app')

@section('title','Recruiter')

@section('content')

<div class="container bg-white rounded-3 opacity-90 p-3">
    <div class="row">
        <div class="col-8">
            <p class="fw-bold fs-5">Registered Employee</p>
        </div>
        <div class="col-auto ms-auto">
            <a href="{{ route('recruiter.create')}}" class="btn btn-outline-primary"><i class="fa-solid fa-user-plus"></i></a>
        </div>
    </div>

    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="opacity-75">
            <tr class="text-center">
                <th></th>
                <th>Employee Name</th>
                <th>Start Date</th>
                <th>Work at</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            {{-- list of new employee should be here --}}
        {{-- @forelse ($collection as $item)
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="{{ route('hr.create')}}" class="btn btn-secondary">Assign</a></td>
            {{-- Modal? to assign task --}}
            {{-- <td></td>
    
    
        </tr>
            
        @empty
        <div class="mb-3">
            <p class="h3">All documents are submitted!</p>
        </div>
            
        @endforelse --}}
      
    
        </tbody>
        
    </table>

    <hr>


   
   
   
    
    
   

</div>

@endsection