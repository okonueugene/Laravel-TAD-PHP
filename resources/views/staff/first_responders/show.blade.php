<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="viewFirstResponderModalLabel">First Responder Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="firstResponderDetails">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="firstResponderName"
                            class="form-label
                            fw-bold">Name</label>
                        <input type="text" class="form-control" value="{{ $first_responder->name }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="firstResponderDate" class="form-label fw-bold">Date</label>
                        <input type="text" class="form-control" value="{{ $first_responder->date }}" readonly>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="firstResponderType" class="form-label fw-bold">Type</label>
                    <input type="text" class="form-control" value="{{ $first_responder->type == 'fire_marshal' ? 'Fire Marshal' : 'First Aider' }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>