{{-- Activate --}}
<div class="modal fade" id="activate-employee-{{ $employee->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-primary">
            <div class="modal-header border-primary">
                <h3 class="h5 modal-title text-primary">
                    <i class="fa-solid fa-user-check"></i> Activate Registered Employee
                </h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to Activate '<span class="fw-bold"> {{ $employee->name }} </span>' ?</p>
                <div class="mt-3">
                    <img src="{{ $employee->passport }}" alt=" {{ $employee->name }}" class="image-lg">
                    <table class="table table-hover align-middle bg-white border-text-secondary w-50 mx-auto mt-3">
                        <tr>
                            <td class="text-end table table-info">Start Date</td>
                            <td class="text-start">{{ $employee->startday }}</td>
                         </tr>
                        <tr class="text-center ">
                           <td class="text-end table table-info">Name</td>
                           <td class="text-start">{{ $employee->name }}</td>
                        </tr>

                        <tr>
                            <td class="text-end table table-info">Email Address</td>
                            <td class="text-start"> {{ $employee->email }}</td>
                        </tr>
                        <tr>
                            <td class="text-end table table-info">Work for</td>
                            <td class="text-start">{{ $employee->workat }}</td>
                        </tr>
                    </table>

                </div>
            </div>
            <div class="modal-footer border-0">
                {{-- <form action="{{ route('recruiter.activate',$employee->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Activate</button>
                </form> --}}
            </div>
        </div>
    </div>
</div>


{{-- Deactivate --}}
<div class="modal fade" id="deactivate-employee-{{ $employee->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-circle-exclamation"></i> Deactivate Registered Employee
                </h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to deactivate '<span class="fw-bold"> {{  $employee->name }}</span>' ?</p>
                <div class="mt-3">
                    <img src="{{ $employee->passport }}" alt=" {{ $employee->name }}" class="image-lg">
                    <table class="table table-hover align-middle bg-white border-text-secondary w-50 mx-auto mt-3">
                        <tr>
                            <td class="text-end table table-info">Start Date</td>
                            <td class="text-start">{{ $employee->startday }}</td>
                         </tr>
                        <tr class="text-center ">
                           <td class="text-end table table-info">Name</td>
                           <td class="text-start">{{ $employee->name }}</td>
                        </tr>

                        <tr>
                            <td class="text-end table table-info">Email Address</td>
                            <td class="text-start"> {{ $employee->email }}</td>
                        </tr>
                        <tr>
                            <td class="text-end table table-info">Work for</td>
                            <td class="text-start">{{ $employee->workat }}</td>
                        </tr>
                    </table>

                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('recruiter.deactivate',$employee->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Deactivate</button>
                </form>
            </div>
        </div>
    </div>
</div>