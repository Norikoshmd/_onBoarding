@extends('layouts.app')

@section('title','Submitted items')

@section('content')

<div class="container bg-white opacity-90 p-3">
    <p class="h3 p-3"><i class="fa-solid fa-file-circle-exclamation fa-lg text-secondary"></i>&nbsp;&nbsp;Submitted items</p>
    <table class="table table-hover align-middle border-text-secondary">
        <thead class="table table-secondary">
            <tr class="text-center">
                <th>Submitted on</th>
                <th>Employee Name</th>
                <th></th>
                <th>Item</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($user_tasks as $task)
                @if($task->getIsSubmitted())
                    <tr class="text-center">
                        <td>{{date('M d, Y', strtotime($task->updated_at))}}</td>
                        <td>{{$task->user->name}}</td>
                        <td><img src="{{$task->user->employee->passport}}" alt="{{$task->user->employee->name}}" class="rounded-circle avatar-sm" ></td>

                        <td class="text-start">{{$task->task->name}}</td>
                        <td>
                            <a href="#" class="btn btn-primary"><i class="fa-regular fa-file fa-lg text-white"></i></a>

                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection