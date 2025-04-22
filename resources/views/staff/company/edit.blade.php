<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editCompanyModalLabel">Edit Company</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="editCompany">
            <form action="{{ url('/app/company', $company->id) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="designation">Designation</label>
                    <select class="form-select" id="designation" name="designation" required>
                        <option value="" selected>Select Designation</option>
                        <option value="sub_contractor" @if ($company->designation == 'sub_contractor') selected @endif>
                            Sub-Contractor</option>
                        <option value="contractor" @if ($company->designation == 'contractor') selected @endif>
                            Contractor</option>
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