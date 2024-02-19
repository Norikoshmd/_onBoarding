{{-- Delete --}}
<div class="modal fade" id="delete-request-{{ $task->id }}">
    <div class="modal-dialog">
        <form action="{{route('hr.task.destroyAssigned',$task->id)}}" method="post">
           
            @csrf
            @method('DELETE')
            <div class="modal-content border-danger">
                <div class="modal-header border-danger">
                    <h3 class="h5 modal-title text-danger">
                        <i class="fa-regular fa-trash-can"></i> Delete Request
                    </h3>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <span class="fw-bold">{{ $employee->task }}</span> ?</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>