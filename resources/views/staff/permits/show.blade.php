<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="viewPermitModalLabel">View Permit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="permitDetail">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="type_of_permit" class="form-label">Type Of Permit</label>
                        <input type="text" class="form-control" value="{{ $permit->type }}" id="type"
                            name="type" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="text" class="form-control" value="{{ $permit->date }}" id="date"
                            name="date" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="authorized_person" class="form-label">Authorized Person</label>
                        <input type="text" class="form-control" value="{{ $permit->authorized_person }}"
                            id="authorized_person" name="authorized_person" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="competent_person" class="form-label">Competent Person</label>
                        <input type="text" class="form-control" value="{{ $permit->competent_person }}"
                            id="competent_person" name="competent_person" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="area_owner" class="form-label">Area Owner</label>
                        <input type="text" class="form-control" value="{{ $permit->area_owner }}" id="area_owner"
                            name="area_owner" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
