<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editIncidentModalLabel">Edit Incident</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="editIncident">
            <form action="{{ route('incidents.update', $incident->id) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="">Incident Description</label>
                    <textarea class="form-control" name="incident_description" id="basic-default-observation" placeholder="This ...."
                        rows="4">{{ $incident->incident_description }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-status">Investigation Status</label>
                    <select class="form-select" id="basic-default-status" name="investigation_status">
                        <option value="open" {{ $incident->investigation_status == 'open' ? 'selected' : '' }}>Open
                        </option>
                        <option value="closed" {{ $incident->investigation_status == 'closed' ? 'selected' : '' }}>
                            Closed</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-incident_status">Incident Status</label>
                    <select class="form-select" id="basic-default-incident_status" name="incident_status">
                        <option value="no" {{ $incident->incident_status == 'no' ? 'selected' : '' }}>Open</option>
                        <option value="yes" {{ $incident->incident_status == 'yes' ? 'selected' : '' }}>Closed
                        </option>
                    </select>
                </div>
                <div>
                    @if (count($incident->media) > 0)
                        <label class="form-label">Incident Media</label>
                        <div class="row">
                            @foreach ($incident->media as $media)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img src="{{ asset('storage/' . parse_image_url($media->original_url)) }}"
                                            alt="{{ $media->file_name }}" class="card-img-top" width="200px"
                                            height="200px">
                                        <div class="card-body">
                                            <p style="font-size: 11px;">{{ $media->file_name }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-media">Add Images</label>
                            <input type="file" class="form-control" id="basic-default-media" name="media[]" multiple>
                        </div>
                    @else
                        <p>No media available for this ica.</p>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-media">Images</label>
                            <input type="file" class="form-control" id="basic-default-media" name="media[]" multiple>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submit-btn">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
