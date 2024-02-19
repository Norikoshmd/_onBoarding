@extends('layouts.app')

@section('title','Home')

@section('content')

<div class="container bg-white opacity-90 rounded p-3">
    <h1 class="h4 mb-3 mt-2 fw-bold">Submitted Documents/Data</h1>
    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="opacity-75 ">
            <tr class="text-center table table-secondary">
                <th>No.</th>
                <th>Document/Data Name</th>
                <th>Date Submitted</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
                {{-- @forelse ($tasks as $task)
                    @if($task->assigned_to === Auth::User()->name)
                        <tr class="text-center @if($task->daysUntilDue() <= 3) text-danger @else text-success @endif">
                            <td></td>
                            <td>
                                @foreach($task->name as $name)
                                <ul class="list-group text-start ms-3">
                                    <li>{{ $name }} </li>
                                </ul>
                                @endforeach
                            </td>
                            <td class="text-start"><a href="{{ $task->link }}" class="btn btn-outline-primary btn-sm" target="_blank"><i class="fa-solid fa-file-signature fa-lg "></i></a></td></td>  --}}
                            {{-- <td>{{ $task->due_date }}</td>
                            <td>{{ $task->daysUntilDue() }} day(s) </td>
                             --}}
                            {{-- <td><a href="{{ $task->link }}" class="btn btn-primary btn-sm" target="_blank"><i class="fa-solid fa-question"></i></a></td>
                        </tr>
                    @endif
                @empty
                    <div class="mb-3">
                        <p class="h3">All documents are submitted!</p>
                    </div>
                @endforelse --}}
        </tbody>
        
    </table>

</div>
    
@endsection
