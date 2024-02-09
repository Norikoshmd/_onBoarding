@extends('layouts.app')

@section('title','Register New')

@section('content')
<div class="col-12 container bg-white rounded-3 opacity-90 p-3">
    <div class="row mt-3">
        <div class="col-8">
            <p class="fw-bold fs-4"><i class="fa-solid fa-user-plus text-secondary fa-lg img-thumbnail rounded-circle"></i>&nbsp; Register New Employee</p>
        </div>
        <div class="col-auto ms-auto">
          <a href="{{ route('recruiter.index')}}" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-angles-right"></i> back to the list</a>
         </div>
    </div>
       
    <hr>
    <form action="{{ route('recruiter.store')}}" method="post" enctype="multipart/form-data">
     @csrf
        <div class="row mb-3 fw-bold">
            <div class="col-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Will Smith (full name ONLY)">
            </div>
                @error('name')
                <p class="text-danger small">{{ $message }}</p>
                @enderror
            <div class="col-4">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select">
                    <option name="" value="" hidden>Select</option>
                    <option name="male" value="Male">Male</option>
                    <option name="male" value="Female">Female</option>
                </select>
            </div>
                @error('gender')
                <p class="text-danger small">{{ $message }}</p>
                @enderror
        </div>
        
        <div class="row mb-3 fw-bold">
            <div class="col-6">
                <label for="email_address" class="form-label">Email Address</label>
                <input type="mail" name="email" class="form-control" value="{{ old('email') }}" placeholder="onboarding@mail.com">
            </div>
            @error('email')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
            <div class="col-6">
                <label for="visa_status" class="form-label">Visa Status</label>
                <select name="visa_status" id="visa_status" class="form-select">
                    <option value=""hidden>Select</option>
                    <option name="engineer" value="Engineer/Specialist in Humanities/International services | 技術・人文・知識・国際業務">Engineer/Specialist in Humanities/International services | 技術・人文・知識・国際業務</option>
                    <option name="student" value="Student | 留学<">Student | 留学</option>
                    <option name="spouse_japanese" value="Spouse or child of Japanese national | 日本人の配偶者等">Spouse or child of Japanese national | 日本人の配偶者等</option>
                    <option name="pr" value="Parmanent Resident | 定住者">Parmanent Resident | 定住者</option>
                    <option name="spouse_pr" value="Spouse of parmanent resident | 永住者の配偶者等">Spouse of parmanent resident | 永住者の配偶者等</option>
                </select>
                @error('visa_status')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row mb-3 fw-bold">
            <div class="col-4">
                <label for="start_day" class="form-label">Start Day</label>
                <input type="date" name="startday" class="form-control" value="{{ old('startday') }}">
                @error('startday')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-4">
                <label for="work_for" class="form-label">Work for</label>
                <input type="text" name="workat"class="form-control" value="{{ old('workat') }}" placeholder="Support Team, Company name, HR etc.,">
                @error('workat')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <hr>
        <div class="row mb-3 fw-bold">
            <p class="h5 mb-3 fw-bold text-secondary">Data Upload <span class="text-primary h6 text-italic"> * please upload all the submited data from new employee for smoother transaction</p>
            <div class="col-4">
                <label for="visa_f" class="form-label">Residence Card (Front)</label>
                <input type="file" name="visa_f" class="form-control">
                @error('visa_f')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-4">
                <label for="visa_b" class="form-label">Residence Card (Back)</label>
                <input type="file" name="visa_b" class="form-control">
                @error('visa_b')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-4">
                <label for="passport" class="form-label">Passport</label>
                <input type="file" name="passport" class="form-control">
                @error('passport')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <hr>
        <div class="row mb-5 fw-bold">
            <label for="remarks" class="form-label">Remarks</label>
            <textarea name="remarks" id="remarks" rows="2" class="form-control" placeholder="in case new employee needs urgent visa extension/status change, please contact us(HR) ASAP."></textarea>
            @error('remarks')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>
    
            <div class="row gx-3 mx-auto justify-content-center">
                <div class="col-auto">
                    <a href="{{ route('recruiter.index')}}" class="btn btn-outline-warning btn-sm"> Cancel</a>
                </div>
               <div class="col-auto">
                <button type="submit" class="btn btn-secondary btn-sm"> Save </button>
               </div>
            </div>
    </form>
</div>
@endsection