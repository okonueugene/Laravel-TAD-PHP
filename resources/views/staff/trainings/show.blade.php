<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="viewTrainingModalLabel">View Training</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="viewTrainingModalBody">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="topic" class="form-label fw-bold">Topic</label>
                        <input type="text" class="form-control" value="{{ $training->topic }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="attendees" class="form-label fw-bold">Attendees</label>
                        <input type="text" class="form-control" value="{{ $training->attendees }}" readonly>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="comments" class="form-label fw-bold">Comments</label>
                <textarea class="form-control" id="comments" name="comments" rows="4" readonly>{{ $training->comments }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label fw-bold">Images</label>
                <div class="row">
                    @if(count($training->media) > 0)
                    @foreach ($training->media as $media)
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
                <p>No media available for this training.</p>
                @endif
            </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>
