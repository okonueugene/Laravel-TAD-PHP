<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
        <!-- Modal header -->
        <div class="modal-header">
            <h5 class="modal-title" id="showModalLabel">ICA Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Observation</label>
                <input type="text" class="form-control" value="{{ $ica->observation }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="steps_taken">Steps Taken</label>
                <div class="sortable-steps-container">
                    <ol id="steps_taken_list" class="list-group" readonly>
                        @if (!empty($ica->steps_taken))
                        @foreach ($ica->steps_taken as $index => $step)
                        <li class="list-group-item">{{ $index + 1 }}. {{ $step }}</li>
                            @endforeach
                        @else
                            <li class="list-group-item">No steps taken yet.</li>
                        @endif
                    </ol>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="date">Date</label>
                <input type="date" class="form-control" value="{{ $ica->date }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="status">Status</label>
                <input type="text" class="form-control" value="{{ ucfirst($ica->status) }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="action_owner">Action Owner</label>
                <input type="text" class="form-control" value="{{ $ica->action_owner }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="added_by">Added By</label>
                <input type="text" class="form-control" value="{{ $ica->user->name }}" readonly>
            </div>
            <div>
                @if (count($ica->media) > 0)
                    <label class="form-label">Ica Media</label>
                    <div class="row">
                        @foreach ($ica->media as $media)
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
                    <p>No media available for this ica.</p>
                @endif
            </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>
