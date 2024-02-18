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
                           
                             {{-- depending on the  $task_id differenciate the submitpage--}}
                            <td>
                                 {{-- $task_id:1 - Form1:Employee Information Form --}}
                                @if($task->task_id == 1)
                                    <a href="{{ route('doc.showForm1')}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>
                                
                                {{-- $task_id:2 - Form2:Emergency Contact Form --}}
                                 @elseif($task->task_id == 2)
                                <a href="{{ route('doc.showForm2')}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>
                               
                                {{-- $task_id:3 - Form3: My Number Card--}}
                                 @elseif($task->task_id == 3)
                                <a href="{{ route('doc.showForm3')}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>
                               
                                {{-- $task_id:4 - Copy1:Pension Book / Pension Certificate | 年金手帳、基礎年金番号通知書 --}}
                                @elseif($task->task_id == 4)
                                <a href="{{ route('doc.showCopy1')}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>

                                 {{-- $task_id:5 - Copy2:Employment Insurance Card | 雇用保険被保険者証 --}}
                                 @elseif($task->task_id == 5)
                                 <a href="{{ route('doc.showCopy2')}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>

                                  {{-- $task_id:6 - Copy3: Income Tax Withholing Slip | 給与所得者の源泉徴収票 --}}
                                 @elseif($task->task_id == 6)
                                 <a href="{{ route('doc.showCopy3')}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>

                                 {{-- $task_id:7 - Dependent1: Income Tax Withholing Slip | 給与所得者の源泉徴収票 --}}
                                 @elseif($task->task_id == 7)
                                 <a href="{{ route('doc.showDependent1')}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>

                                 {{-- $task_id:8 - Dependent2: Dependent/spouse ID copy --}}
                                 @elseif($task->task_id == 8)
                                 <a href="{{ route('doc.showDependent2')}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>
                                  
                                @endif
                            </td>
                          
                           
                        </tr>
                    {{-- @endif --}}
                @empty
                    <div class="mb-3 bg-info-subtle rounded p-3">
                        <p class="h5 text-muted">All documents are submitted!<br>Thank you very much <i class="fa-solid fa-face-smile"></i></p>
                    </div>
                @endforelse
        </tbody>
    </table>
</div>
@endsection