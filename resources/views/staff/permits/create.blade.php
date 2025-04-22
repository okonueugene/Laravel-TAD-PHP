<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addPersonellModalLabel">Add Personnel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body" id="permitDetail">
            <form action="{{ url('/app/permits') }}" class="form" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-name">Permit Type</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="">Select Permit</option>
                        <option value="General Work">General Work</option>
                        <option value="Hot Work">Hot Work</option>
                        <option value="Cold Work">Cold Work</option>
                        <option value="Confined Space Entry">Confined Space Entry</option>
                        <option value="Work At Height">Work At Height</option>
                        <option value="Excavation/Demolition">Excavation/Demolition</option>
                        <option value="Live Electrical Work">Live Electrical Work</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="start_date">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
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



