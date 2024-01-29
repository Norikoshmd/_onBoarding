@extends('layouts.app')

@section('title','HR Home')

@section('content')

<table class="table table-hover align-middle bg-white border-text-secondary">
    <thead class="opacity-75">
        <tr class="text-center">
            <th>ID</th>
            <th>Start Day</th>
            <th>Employee Name</th>
            <th>Work at</th>
            <th><a href="{{ route('hr.create')}}" class="btn btn-secondary">Assign</a></th>
            <th>Remarks</th>
           
        </tr>
    </thead>
    <tbody>
        {{-- tasks and employee should be listed here --}}
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



@endsection