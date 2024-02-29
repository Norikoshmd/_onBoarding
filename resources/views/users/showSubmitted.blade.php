@extends('layouts.app')

@section('title','Home')

@section('content')



<div class="container bg-white opacity-90 rounded p-3">
    <h1 class="h4 mb-3 mt-2 fw-bold">Submitted Documents/Data</h1>
    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="opacity-75 ">
            <tr class="text-center table table-secondary h5">
                <th>Document/Data Name</th>
                <th>Date Submitted</th>
                <th>Requested Date</th>
            </tr>
        </thead>
        <tbody>
         
                @forelse ($user_tasks as $task)
               
                    @if($task->getIsSubmitted())
                        <tr class="text-center">
                            <td>{{date('M d, Y', strtotime($task->updated_at))}}</td>
                            <td class="text-start">{{ $task->task->name }}</td>
                            <td>{{date('M d, Y', strtotime($task->created_at))}}</td>
                            
                        </tr>
                    @endif
                @empty
                    <div class="mb-3">
                        <p class="h3">All documents are submitted!</p>
                    </div>
                @endforelse
        </tbody>
    </table>

</div>
    
@endsection
