<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="detailsModalLabel">Incident Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="incidentDetails">
            <div class="mb-3">
                <label class="form-label" for="">Incident Description</label>
                <textarea class="form-control" name="incident_description" id="basic-default-observation"
                    rows="4" readonly>{{ $incident->incident_description }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-status">Investigation Status</label>
                <input type="text" class="form-control" id="basic-default-status" name="investigation_status"
                    value="{{ $incident->investigation_status == 'open' ? 'Open' : 'Closed' }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-incident_status">Incident Status</label>
                <input type="text" class="form-control" id="basic-default-incident_status" name="incident_status"
                    value="{{ $incident->incident_status == 'no' ? 'Not Done' : 'Done' }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="date">Date</label>
                <input type="text" class="form-control" id="date" name="date"
                    value="{{ $incident->incident_date }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-due">Incident Type</label>
                <input type="text" class="form-control" id="basic-default-due" name="incident_type_id"
                    value="{{ ucwords(str_replace('_', ' ', $incident->incidentType->incident_type)) }}" readonly>
            </div>
            <div class="mb-3">
                @if ($incident->media)
                    <label class="form-label">Incident Media</label>
                    <div class="row">
                        @foreach ($incident->media as $media)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <?php
                                    $mediaUrl = $media->original_url;
                                    
                                    // Define the regex pattern to match the part you want to replace
                                    $pattern = '/http:\/\/localhost\/storage\//';
                                    
                                    // Define the replacement string (the part you want to replace it with)
                                    $replacement = '';
                                    
                                    // Use preg_replace to replace the matched part with the replacement
                                    $cleanedUrl = preg_replace($pattern, $replacement, $mediaUrl);
                                    
                                    //set the cleaned url as the new url
                                    $mediaUrl = $cleanedUrl;
                                    
                                    ?>
                                    <img src="{{ asset('storage/' . $mediaUrl) }}" alt="{{ $media->file_name }}"
                                        class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $media->file_name }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No media available for this incident.</p>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>
