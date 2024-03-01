@extends('layouts.app')

@section('title','Home')

@section('content')

<div class="container bg-white opacity-90 rounded p-3">
    <h1 class="h4 mb-3 mt-2 fw-bold ms-2">Required Documents / Data <i class="fa-regular fa-hand-point-up"></i></h1>
    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="opacity-75 ">
            <tr class="text-center table table-secondary h5">
                <th>Requested Date</th>
               {{-- hidden task id in td--}}
                <th>Document Name</th>
                <th>Status</th>
                <th></th>
                {{-- <th>Due Date</th>
                <th>Day(s) to Due Date</th> --}}
                {{-- <th></th>
                <th></th> --}}
            </tr>
        </thead>
        <tbody>
           
            @forelse ($user_tasks as $task)
                    @if($task->user->id === Auth::user()->id)
                        <tr class="text-center h5">
                            <td>{{date('M d, Y', strtotime($task->created_at))}}</td>
                            <td hidden>{{ $task->task_id}}</td>
                            <td class="text-start">{{ $task->task->name}}</td> 
                            {{-- display different form to submit up on the $task_id --}}
                            <td>
                                {{-- $task_id:1 - Form1:Employee Information Form --}}
                                @if($task->task_id == 1)
                                    @if(!$task->getIsSubmitted())
                                            <a href="{{ route('doc.showDoc1',$task->id)}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>
                                    @else
                                        <button class="btn btn-primary p-2">Submitted </button>
                                        {{-- <a href="{{ route('doc.showSubmittedDoc1',$task->id) }}" class="text-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i> </a> --}}
                                    @endif
                                {{-- $task_id:2 - Form2:Emergency Contact Form --}}
                                @elseif($task->task_id == 2)
                                    @if(!$task->getIsSubmitted())
                                        <a href="{{ route('doc.showDoc2',$task->id)}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>
                                    @else
                                        <button class="btn btn-primary p-2">Submitted</button>
                                    @endif

                                {{-- $task_id:3 - Form3: My Number Card--}}
                                @elseif($task->task_id == 3)
                                    @if(!$task->getIsSubmitted())
                                        <a href="{{ route('doc.showDoc3',$task->id)}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>
                                    @else
                                        <button class="btn btn-primary p-2">Submitted</button>
                                    @endif

                                  
                                {{-- $task_id:4 - Copy1:Pension Book / Pension Certificate | 年金手帳、基礎年金番号通知書 --}}
                                @elseif($task->task_id == 4)
                                    @if(!$task->getIsSubmitted())
                                        <a href="{{ route('doc.showDoc4',$task->id)}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>
                                    @else
                                        <button class="btn btn-primary p-2">Submitted</button>
                                    @endif

                                {{-- $task_id:5 - Copy2:Employment Insurance Card | 雇用保険被保険者証 --}}
                                @elseif($task->task_id == 5)
                                    @if(!$task->getIsSubmitted())
                                        <a href="{{ route('doc.showDoc5',$task->id)}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>
                                    @else
                                        <button class="btn btn-primary p-2">Submitted</button>
                                    @endif

                                {{-- $task_id:6 - Copy3: Income Tax Withholing Slip | 給与所得者の源泉徴収票 --}}
                                @elseif($task->task_id == 6)
                                    @if(!$task->getIsSubmitted())
                                        <a href="{{ route('doc.showDoc6',$task->id)}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>
                                    @else
                                        <button class="btn btn-primary p-2">Submitted</button>
                                    @endif

                                {{-- $task_id:7 - Dependent1: Income Tax Withholing Slip | 給与所得者の源泉徴収票 --}}
                                @elseif($task->task_id == 7)
                                    @if(!$task->getIsSubmitted())
                                    <a href="{{ route('doc.showDoc7',$task->id)}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>
                                    @else
                                        <button class="btn btn-primary p-2">Submitted</button>
                                    @endif

                                {{-- $task_id:8 - Dependent2: Dependent/spouse ID copy --}}
                                @elseif($task->task_id == 8)
                                    @if(!$task->getIsSubmitted())
                                        <a href="{{ route('doc.showDoc8',$task->id)}}" class="btn btn-primary p-2"><i class="fa-solid fa-file-signature fa-lg"></i></a>
                                    @else
                                        <button class="btn btn-primary p-2">Submitted</button>
                                    @endif
                                @endif
                    @endif
                            </td>
                        </tr>
            @empty
                    <div class="mb-3 bg-info-subtle rounded p-3">
                        <p class="h5 text-muted">Has not assigned any request Yet.</p>
                    </div>
                
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-1">
        {{ $user_tasks->links() }}
      </div>
</div>
@endsection
