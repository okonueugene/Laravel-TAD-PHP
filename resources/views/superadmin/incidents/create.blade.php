<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addPersonellModalLabel">Add Incident</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="addIncident">
            <form action="{{ url('incidents') }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="">Incident Description</label>
                    <textarea class="form-control" name="incident_description" id="basic-default-observation" placeholder="This ...."
                        rows="4"></textarea>
                    <div class="error">
                        @error('incident_description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-status">Investigation Status</label>
                    <select class="form-select" id="basic-default-status" name="investigation_status">
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                    </select>
                    <div class="error">
                        @error('investigation_status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-incident_status">Incident Status</label>
                    <select class="form-select" id="basic-default-incident_status" name="incident_status">
                        <option value="no">Open</option>
                        <option value="yes">Closed</option>
                    </select>
                    <div class="error">
                        @error('incident_status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="media">Media</label>
                    <input type="file" class="form-control" id="media" name="media[]" multiple>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-due">Incident Type</label>
                    <select class="form-select" id="basic-default-due" name="incident_type_id">
                        <option>Select Record Type</option>
                        @foreach ($incident_types as $type)
                            <option value="{{ $type->id }}">
                                {{ ucwords(str_replace('_', ' ', $type->incident_type)) }}</option>
                        @endforeach

                    </select>
                    <div class="error">
                        @error('incident_type_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary waves-effect waves-light submit-btn">Submit</button>
                <button type="button" class="btn btn-secondary waves-effect waves-light float-end" id="close">Close</button>
            </form>

        </div>
    </div>
</div>

<script></script>
