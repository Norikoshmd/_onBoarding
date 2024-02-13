@extends('layouts.app')

@section('title','Create New Request')

@section('content')

<div class="container bg-white opacity-90 p-3 rounded">
    <form action="{{ route('hr.store')}}" method="post">
        @csrf
        <div class="row p-3 justify-content-center">
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
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a href="#" class="btn btn-outline-warning"><i class="fa-solid fa-pen"></i></a>
                            </div>
                            <div class="col-auto">
                                <form action="{{ route('hr.task.destroy',$task->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger ms-2" onclick="return confirm('Are you sure you want to delete this task?')"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td></td>
                </tr>
                @endforeach
                
            </tbody>
        </table>

</div>

@endsection