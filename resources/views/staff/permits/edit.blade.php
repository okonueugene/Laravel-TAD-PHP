<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editPermitModalLabel">Edit Permit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="editPermit">
            <form action="{{ url('/app/permits', $permit->id) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="start_date">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date"
                        value="{{ $permit->start_date }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date"
                        value="{{ $permit->end_date }}" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submit-btn">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
