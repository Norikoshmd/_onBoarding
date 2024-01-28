@extends('layouts.app')

@section('title','Home')

@section('content')

    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="opacity-75">
            <tr>
                <th></th>
                <th>Document Name</th>
                <th>Due Date</th>
                <th></th>
                <th><a href="#"><i class="fa-solid fa-question"></i></a></th>
            </tr>
        </thead>
        <tbody>
            {{-- tasks should be updated here --}}
        {{-- @forelse ($collection as $item)
        <tr>

        </tr>
            
        @empty
        <div class="mb-3">
            <p class="h3">All documents are submitted!</p>
        </div>
            
        @endforelse --}}
      

        </tbody>
        
    </table>

@endsection
