<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addFirstResponderModalLabel">Add First Responder</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="firstResponderDetails">
            <form action="{{ url('first-responders') }}" method="POST" class="form">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label fw-bold">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label fw-bold">Type</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="" selected>Select Type</option>
                        <option value="fire_marshal">Fire Marshal</option>
                        <option value="first_aider">First Aider</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="submit-btn btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>