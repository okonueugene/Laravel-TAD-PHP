<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editIncidentModalLabel">Edit Incident</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="editIncident">
            <form action="{{ url('app/incidents', $incident->id) }}" method="POST" class="form">
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
                                            class="card-img-top" width="200px" height="200px">
                                        <div class="card-body">
                                            <p style="font-size: 11px;">{{ $media->file_name }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>No media available for this incident.</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-image">Add Media</label>
                    <input type="file" class="form-control" id="basic-default-image" name="images[]" multiple>
                </div>
                <button type="submit" class="btn btn-primary waves-effect waves-light submit-btn">Submit</button>
                <button type="button" class="btn btn-secondary waves-effect waves-light float-end" id="close">Close</button>
            </form>
        </div>
    </div>
</div>