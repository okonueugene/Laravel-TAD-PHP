<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addPersonellModalLabel">Edit Supervisor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="personellDetail">
            <form action="{{ url('app/supervisor', [$data->id]) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $data->name }}" name="name"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="designation">Designation</label>
                    <input type="text" class="form-control" id="designation" value="{{ $data->designation }}"
                        name="designation" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submit-btn waves-effect waves-light">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
