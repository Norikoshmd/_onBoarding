@extends('layouts.app')

@section('title', 'Create Tasks')

@section('content')
    <div class="container bg-white rounded-3 opacity-90 p-3 w-75 mb-3">
        <form action="" method="post">
            <div class="row gx-3 mb-2">
                <div class="col-8">
                    <label for="new_task" class="label-control fw-bold">New Request</label>
                </div>
            </div>
            <div class="row justify-content-center gx-3">
                <div class="col-7">
                    <input type="text" class="form-control" name="new_task">
                </div>
                <div class="col-4 mt-1">
                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container bg-white rounded-3 opacity-90 p-3">
        <p class="fw-bold fs-5">Assign Request</p>
        <div class="row mb-3">
            <div class="col-3 text-end"> 
                <label for="Select_request" class="form-label fw-bold">Assign to</label>
            </div>
            <div class="col-4">
                <select name="assign_to" id="assign_to" class="form-select">
                    <option value=""></option>
                    {{-- select from new user --}}
                </select>
            </div>
        </div>

        <table class="table table-hover align-middle bg-white border-text-secondary">
            <thead class="opacity-75">
                <tr class="text-center">
                    <th>#</th>
                    <th>Document Name</th>
                    <th>Due Date</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                {{-- tasks should be listed here --}}
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
