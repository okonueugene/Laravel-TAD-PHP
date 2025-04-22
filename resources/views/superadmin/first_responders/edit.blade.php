<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editFirstResponderModalLabel">Edit First Responder</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="editFirstResponderDetails">
            <form action="{{ url('app/first-responders', $first_responder->id) }}" method="PATCH" class="form">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $first_responder->name }}" >
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label fw-bold">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ $first_responder->date }}" >
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label fw-bold">Type</label>
                    <select class="form-select" id="type" name="type" >
                        <option value="" selected>Select Type</option>
                        <option value="fire_marshal" {{ $first_responder->type == 'fire_marshal' ? 'selected' : '' }}>Fire Marshal</option>
                        <option value="first_aider" {{ $first_responder->type == 'first_aider' ? 'selected' : '' }}>First Aider</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn submit-btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>