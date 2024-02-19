@extends('layouts.app')

@section('title','Create New Request')

@section('content')

<div class="container bg-white opacity-90 p-3 rounded">
    <p class="h3 p-3"><i class="fa-solid fa-list fa-lg text-secondary"></i>&nbsp;&nbsp; Items to Request</p>
    <form action="{{ route('hr.store')}}" method="post">
        @csrf
        <div class="row p-3 justify-content-center mb-3">
            <input type="text" name="name" class="form-control w-50" placeholder="Add new request to the lists...">
           <select name="category" id="category" class="form-select ms-2" style="width:20%;">
                <option value=""hidden>Select</option>
                <option value="Basic">Basic</option>
                <option value="Copies">Copies</option>
                <option value="Dependent">Dependent</option>
           </select>
            <button type="submit" class="ms-2 btn btn-primary" style="width:10%;"> <i class="fa-solid fa-plus"></i> Add</button>
        </div>
        @error('name')
            <p class="text-danger text-small">{{ $message }}</p>
        @enderror
        @error('category')
            <p class="text-danger text-small">{{ $message }}</p>
        @enderror
    </form>

        <table class="table table-hover align-middle bg-white border-text-secondary mx-auto w-90">
            <thead class="text-center table table-secondary">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Last Updated</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody  class="text-center">
                @foreach($all_tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td class="text-start">{{$task->name}}</td>
                    <td>{{$task->category}}</td>
                    <td>{{date('M d, Y', strtotime($task->updated_at))}}</td>
                    <td>
                        {{-- Edit Button --}}
                        <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#edit-request-{{ $task->id }}" title="Edit">
                            <i class="fa-solid fa-pen"></i>
                        </button>

                        {{-- Delete Button --}}
                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-request-{{ $task->id }}" title="Delete">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                    <td></td>
                </tr>
                @include('hr.modal.action')
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-2">
            {{ $all_tasks->links() }}
        </div>
</div>

@endsection