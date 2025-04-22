<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addCompanyModalLabel">Add Company</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="companyDetail">
            <form action="{{ url('/app/company/') }}" method="POST" class="form">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="designation">Designation</label>
                    <select class="form-select" id="designation" name="designation" required>
                        <option value="" selected>Select Designation</option>
                        <option value="sub_contractor">Sub-Contractor</option>
                        <option value="contractor">Contractor</option>
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

