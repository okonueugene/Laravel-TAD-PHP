<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addPersonellModalLabel">Add Personnel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body" id="personellDetail">
            <form action="{{ url('/app/personnel') }}" class="form" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-name">Designation</label>
                    <input type="text" class="form-control" id="basic-default-name"
                        name="designation" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-headcount">Head Count</label>
                    <input type="number" class="form-control" id="basic-default-headcount"
                        name="number" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="submit-btn btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>