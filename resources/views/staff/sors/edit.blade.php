<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addPersonellModalLabel">Edit SOR</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="personellDetail">
            <form action="{{ url('/app/sors', [$data->id]) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                <!-- Observation Field -->
                <div class="mb-3">
                    <label class="form-label" for="basic-default-observation">Observation</label>
                    <input type="text" name="observation" class="form-control" id="basic-default-observation"
                        placeholder="Enter observation details" required value="{{ $data->observation }}">
                    @error('observation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status Field -->
                <div class="mb-3">
                    <label class="form-label" for="basic-default-status">Status</label>
                    <select class="form-select" id="basic-default-status" name="status" required>
                        <option value="0" @if ($data->status == 0) selected @endif>Open</option>
                        <option value="1" @if ($data->status == 1) selected @endif>Closed</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Action Owner Field -->
                <div class="mb-3">
                    <label class="form-label" for="basic-default-actionowner">Action Owner</label>
                    <input type="text" name="action_owner" class="form-control" id="basic-default-actionowner"
                        placeholder="Enter Action Owner" required value="{{ $data->action_owner }}">
                    @error('action_owner')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-client ">Client/Contractor</label>
                    <input type="text" name="client" class="form-control" id="basic-default-client"
                        value="{{ $data->client }}">
                </div>

                <!-- SOR Type Field -->
                <div class="mb-3">
                    <label class="form-label" for="basic-default-due">SOR Type</label>
                    <select class="form-select" id="basic-default-due" name="type_id" required>
                        <option value="">Select SOR Type</option>
                        @foreach ($sor_types as $type)
                            <option value="{{ $type->id }}" @if ($data->type_id == $type->id) selected @endif>
                                {{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Image Field -->
                @if ($data->media->count() > 0)
                    <label class="form-label">Incident Media</label>
                    <div class="row">
                        @foreach ($data->media as $media)
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
                <div class="mb-3">
                    <label class="form-label" for="basic-default-image">Add Media</label>
                    <input type="file" class="form-control" id="basic-default-image" name="images[]" multiple>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary submit-btn waves-effect waves-light">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
