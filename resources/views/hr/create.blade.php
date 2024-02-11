@extends('layouts.app')

@section('title', 'Create Tasks')

@section('content')

{{-- to assign --}}
<form action="{{ route('hr.store') }}" method="post">
@csrf
    <div class="container bg-white rounded-3 opacity-90 p-3">
        <p class="fw-bold fs-5 mt-3 ">Documents request to</p>
        <div class="card">
            <div class="card-header bg-secondary-subtle">
              <input type="hidden" name="assigned_to" value="{{$employee->name}}"><p class="fw-bold fs-5 p-2">{{$employee->name}}</p>
            </div>
            <div class="card-body">
                {{-- show endorsed docs --}}
            </div>
        </div>
            <hr>

            <div class="accordion" id="mandatory">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      BASIC INFO
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <table class="table table-hover align-middle bg-white border-text-secondary">
                        <thead>
                            <th>Document Name</th>
                        </thead>
                        <tbody>
                            <div class="form-group">
                                <tr>
                                    <td><input type="checkbox" name="doc_names[]" id="checkbox1" value="Employee Information Form" class="form-check-input">
                                        <label for="checkbox1" class="form-check-label"> &nbsp; Employee Information Form</label>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="doc_names[]" id="checkbox2" class="form-check-input" value="Emergency Contact Form">
                                        <label for="checkbox2" class="form-check-label"> &nbsp; Emergency Contact Form</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="doc_names[]" id="checkbox3" class="form-check-input" value="Commutation Allowance Application">
                                        <label for="checkbox3" class="form-check-label"> &nbsp; Commutation Allowance Application</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="doc_names[]" id="checkbox4" class="form-check-input" value="Concent Form for bank transfer">
                                        <label for="checkbox4" class="form-check-label"> &nbsp; Concent Form for bank transfer</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="doc_names[]" id="checkbox5" class="form-check-input" value="Application for Exemption for dependents of Employment Income Earner">
                                        <label for="checkbox5" class="form-check-label"> &nbsp; Application for Exemption for dependents of Employment Income Earner</label>
                                    </td>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            COPIES
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table table-hover align-middle bg-white border-text-secondary">
                                <thead>
                                    <th>Document Name</th>
                                 
                                </thead>
                                <tbody>
                                    <div class="form-check">
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]"  id="checkbox6" class="form-check-input" value="Pension Book / Pension Certificate | 年金手帳、基礎年金番号通知書">
                                                <label for="checkbox6" class="form-check-label"> &nbsp; Pension Book / Pension Certificate | 年金手帳、基礎年金番号通知書</label>
                                            </td>
                                        </tr>
                                       <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox7" class="form-check-input" value="Employment Insurance Card | 雇用保険被保険者証">
                                                <label for="checkbox7" class="form-check-label"> &nbsp; Employment Insurance Card | 雇用保険被保険者証</label>
                                            </td>
                                       </tr>
                                       <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox8" class="form-check-input" value="Income Tax Withholing Slip | 給与所得者の源泉徴収票">
                                                <label for="checkbox8" class="form-check-label"> &nbsp; Income Tax Withholing Slip | 給与所得者の源泉徴収票</label>
                                            </td>
                                       </tr>
                                       <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox9" class="form-check-input" value="Certificate of Resignation | 退職証明書">
                                                <label for="checkbox9" class="form-check-label"> &nbsp; Certificate of Resignation | 退職証明書</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox10" class="form-check-input" value="Graduation Certificate of the highest education">
                                                <label for="checkbox10" class="form-check-label"> &nbsp; Graduation Certificate of the highest education</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox11" class="form-check-input" value="Certificate of Qualification">
                                                <label for="checkbox11" class="form-check-label"> &nbsp; Certificate of Qualification</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox12" class="form-check-input" value="Passport">
                                                <label for="checkbox12" class="form-check-label"> &nbsp; Passport</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox13" class="form-check-input" value="Residence Card">
                                                <label for="checkbox13" class="form-check-label"> &nbsp; Residence Card</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox14" class="form-check-input" value="My Number Card | マイナンバーカード">
                                                <label for="checkbox14" class="form-check-label"> &nbsp; My Number Card | マイナンバーカード</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox15" class="form-check-input" value="Bank book / Bank card / Bank Account information">
                                                <label for="checkbox15" class="form-check-label"> &nbsp; Bank book / Bank card / Bank Account information</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox16" class="form-check-input" value="Residence Register Certificate | 住民票の写し">
                                                <label for="checkbox16" class="form-check-label"> &nbsp; Residence Register Certificate | 住民票の写し</label>
                                            </td>
                                        </tr>
                                    </div>
                                </tbody>
                              </table>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          DEPENDENT(S)
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table table-hover align-middle bg-white border-text-secondary">
                                <thead>
                                    <th>Document Name</th>
                                    
                                </thead>
                                <tbody>
                                    <div class="form-check">
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox17" class="form-check-input"  value="Notification of transfer of dependents of health insurance | 健康保険被扶養者異動届">
                                                <label for="checkbox17" class="form-check-label"> &nbsp; Notification of transfer of dependents of health insurance | 健康保険被扶養者異動届</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox18" class="form-check-input" value="Dependent Current Status Report | 国内居住被扶養者現況表">
                                                <label for="checkbox18" class="form-check-label"> &nbsp; Dependent Current Status Report | 国内居住被扶養者現況表</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox19" class="form-check-input" value="National pension CategoryIII Insured Person Notification  | 国民年金第3号被保険者関係届">
                                                <label for="checkbox19" class="form-check-label"> &nbsp; National pension CategoryIII Insured Person Notification  | 国民年金第3号被保険者関係届</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox20" class="form-check-input" value="National pension CategoryIII Romanized Name Registration | 国民年金第3号被保険者関係届">
                                                <label for="checkbox20" class="form-check-label"> &nbsp; National pension CategoryIII Romanized Name Registration | 国民年金第3号被保険者関係届</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox21" class="form-check-input" value="Pension book/certificate for dependent spouse">
                                                <label for="checkbox21" class="form-check-label"> &nbsp; Pension book/certificate for dependent spouse</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox22" class="form-check-input" value="Dependent spouse ID copy">
                                                <label for="checkbox22" class="form-check-label"> &nbsp; Dependent spouse ID copy</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="doc_names[]" id="checkbox23" class="form-check-input" value="My Number Card of dependent spouse">
                                                <label for="checkbox23" class="form-check-label"> &nbsp; My Number Card of dependent spouse</label>
                                            </td>
                                        </tr>
                                   
                                </tbody>
                              </table>
                        </div>
                      </div>
                    </div>
                    

                    <div class="row justify-content-center">
                        <div class="col-3">
                            <a href="{{route('recruiter.index')}}" class="mt-3 form-control btn btn-warning">Cancel</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="mt-3 form-control btn btn-primary" >Submit</button>
                        </div>
                    </div>

</form>
    </div>   
@endsection


{{-- show the $employee === $assigned_to

<div class="container bg-white rounded-3 opacity-90 p-3">
    @forelse($employees as $employee)
        <div class="row mb-3 fw-bold">
            <div class="col-6">
                <label for="name" class="form-label">Name</label>
                <input value="{{ $employee->name }}" disabled>
            </div>
                
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
            <p class="h5 mb-3 fw-bold text-secondary">Data Upload <span class="text-danger h6 text-italic"> * please upload all the submited data from new employee for smoother transaction</p>
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
        <div class="row mx-auto justify-content-center">
            <div class="col-4 gx-3">
               <a href="{{ route('recruiter.index')}}" class="btn btn-outline-warning btn-sm"> Cancel</a>
               <button type="submit" class="btn btn-secondary btn-sm"> Submit</button>
            </div>
        </div>
        @empty
        @endforelse
    </form> --}}


