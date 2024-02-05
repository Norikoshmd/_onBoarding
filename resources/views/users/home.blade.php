@extends('layouts.app')

@section('title','Home')

@section('content')

    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="opacity-75 ">
            <tr class="text-center table table-secondary">
                <th></th>
                <th>Document Name</th>
                <th></th>
                <th></th>
                {{-- <th>Due Date</th>
                <th>Day(s) to Due Date</th> --}}
                {{-- <th></th>
                <th></th> --}}
            </tr>
        </thead>
        <tbody>
                @forelse ($tasks as $task)
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
                            <td class="text-start"><a href="{{ $task->link }}" class="btn btn-outline-primary btn-sm" target="_blank"><i class="fa-solid fa-file-signature fa-lg "></i></a></td></td> 
                            {{-- <td>{{ $task->due_date }}</td>
                            <td>{{ $task->daysUntilDue() }} day(s) </td>
                             --}}
                            <td><a href="{{ $task->link }}" class="btn btn-primary btn-sm" target="_blank"><i class="fa-solid fa-question"></i></a></td>
                        </tr>
                    @endif
                @empty
                    <div class="mb-3">
                        <p class="h3">All documents are submitted!</p>
                    </div>
                @endforelse
        </tbody>
        
    </table>

@endsection
