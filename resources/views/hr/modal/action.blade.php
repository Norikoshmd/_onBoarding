{{-- Edit --}}
<div class="modal fade" id="edit-request-{{ $task->id }}">
    <div class="modal-dialog">
        <form action="{{ route('hr.update',$task->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="modal-content border-warning">
                <div class="modal-header border-warning">
                    <h3 class="h5 modal-title">
                        <i class="fa-regular fa-pen-to-square"></i> Edit Request Item
                    </h3>
                </div>
                <div class="modal-body">
                    <input type="text" name="name" class="form-control mb-3" placeholder="Document/Data to Request" value="{{ $task->name }}">
                    <select name="category" id="category" class="form-select" style="width:70%;">
                        {{ $task->category }}
                        <option value="Basic">Basic</option>
                        <option value="Copies">Copies</option>
                        <option value="Dependent">Dependent</option>
                   </select>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-warning btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Delete --}}
<div class="modal fade" id="delete-request-{{ $task->id }}">
    <div class="modal-dialog">
        <form action="{{ route('hr.destroy',$task->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content border-danger">
                <div class="modal-header border-danger">
                    <h3 class="h5 modal-title text-danger">
                        <i class="fa-regular fa-trash-can"></i> Delete Request Item
                    </h3>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <span class="fw-bold">{{ optional($user->task)->name }}</span> ?</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>