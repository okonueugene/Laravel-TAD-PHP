<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">View Company</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="companyDetail">
            <div class="mb-3">
                <label class="form-label" for="basic-default-name">Name</label>
                <input type="text" class="form-control" id="basic-default-name" name="name"
                    value="{{ $company->name }}" disabled required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-name">Designation</label>
                <input type="text" class="form-control" id="basic-default-name" name="designation"
                    value="{{ ucwords(str_replace('_', ' ', $company->designation)) }}" disabled required>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
