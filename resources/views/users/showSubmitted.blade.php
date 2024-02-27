@extends('layouts.app')

@section('title','Home')

@section('content')

<div class="container bg-white opacity-90 rounded p-3">
    <h1 class="h4 mb-3 mt-2 fw-bold">Submitted Documents/Data</h1>
    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="opacity-75 ">
            <tr class="text-center table table-secondary h5">
                <th>Requested Date</th>
                <th>Document/Data Name</th>
                <th>Date Submitted</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
                @forelse ($user_tasks as $task)
                    {{-- @if($task->user->id === Auth::user()->id && $doc->user->id) --}}
                        <tr class="text-center">
                            <td>{{ $task->created_at }}</td>
                            <td class="text-start">{{ $task->task->name }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    {{-- @endif --}}
                @empty
                    <div class="mb-3">
                        <p class="h3">All documents are submitted!</p>
                    </div>
                @endforelse
        </tbody>
    </table>

</div>
    
@endsection
