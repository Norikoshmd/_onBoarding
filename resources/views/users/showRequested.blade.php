@extends('layouts.app')

@section('title','Home')

@section('content')

<div class="container bg-white opacity-90 rounded p-3">
    <h1 class="h4 mb-3 mt-2 fw-bold ms-2">Required Documents / Data <i class="fa-regular fa-hand-point-up"></i></h1>
    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="opacity-75 ">
            <tr class="text-center table table-secondary h5">
                <th>No.</th>
               {{-- hidden task id in td--}}
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
                @forelse ($employee_tasks as $task)
                    {{-- @if($task->employee_id === Auth::User()) --}}
                    {{-- need to connect user info to employee --}}
                        <tr class="text-center h5">
                         {{-- @if($task->daysUntilDue() <= 3) text-danger @else text-success @endif"> --}}
                            <td></td>
                            <td hidden>{{ $task->task_id}}</td>
                            <td class="text-start">{{ $task->task->name}}</td> 
                             {{-- depending on the  $task_id differenciate the a--}}
                            <td>
                               
                                <a href="#" target="_blank" rel="noopener noreferrer" ><i class="fa-solid fa-circle-question fa-2x text-primary"></i></a>
                           
                            </td>
                             {{-- depending on the  $task_id differenciate the submitpage--}}
                            <td>
                                 {{-- $task_id:1 - Form1:Employee Information Form --}}
                                @if($task->task_id == 1)
                                    <a href="{{ route('doc.showForm1')}}" class="btn btn-outline-primary"><i class="fa-solid fa-file-import fa-lg"></i></a>
                                
                                {{-- $task_id:2 - Form2:Emergency Contact Form --}}
                                {{-- @elseif($task->task_id == 2) --}}
                                {{-- $task_id:3 - Form3:Commutation Allowance Application--}}
                                {{-- @elseif($task->task_id == 3) --}}
                                {{-- $task_id:4 - Form4:Concent Form for bank transfer --}}
                                {{-- @elseif($task->task_id == 4) --}}
                                {{-- $task_id:5 - Form5:Application for Exemption for dependents of Employment Income Earner --}}
                                {{-- @elseif($task->task_id == 5) --}}


                                {{-- $task_id:6 - Copy1:My Number Card--}}
                                {{-- $task_id:7 - Copy2:Pension Book / Pension Certificate | 年金手帳、基礎年金番号通知書 --}}
                                @elseif($task->task_id == 7)
                                  
                                @endif
                            </td>

                            <a href="{{ route('doc.showCopy1')}}" class="btn btn-outline-primary"><i class="fa-solid fa-file-import fa-lg"></i></a>
                        </tr>
                    {{-- @endif --}}
                @empty
                    <div class="mb-3">
                        <p class="h3">Thank you <i class="fa-solid fa-face-smile"></i><br>All documents are submitted!</p>
                    </div>
                @endforelse
        </tbody>
    </table>
</div>
@endsection
