<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addPersonellModalLabel">View Personnel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="personellDetail">

            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" id="name" value="{{ $data->name }}" name="name"
                    disabled>
            </div>
            <div class="mb-3">
                <label class="form-label" for="designation">Designation</label>
                <input type="text" class="form-control" id="designation" value="{{ $data->designation }}"
                    name="designation" disabled>
            </div>
           
        </div>
    </div>
</div>
