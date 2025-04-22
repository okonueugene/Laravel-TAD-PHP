<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h5 class="modal-title">Update ICA Details</h5>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
            <form id="updateIcasForm" action="{{ url('icas', $ica->id) }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                @method('PATCH')

                <!-- Observation field -->
                <div class="form-group">
                    <label for="observation">Observation</label>
                    <input type="text" class="form-control" id="observation" name="observation"
                        value="{{ $ica->observation }}">
                </div>

                <!-- Steps Taken field -->
                <div class="form-group">
                    <label for="steps_taken">Steps Taken</label>
                    <div class="sortable-steps-container">
                        <ul id="steps_taken_list" class="list-group list-group-flush">
                            @if (!empty($ica->steps_taken))
                                @foreach ($ica->steps_taken as $index => $step)
                                    <li class="list-group-item d-flex align-items-center"
                                        style="list-style-type: none;">
                                        <span class="mr-2">{{ $index + 1 }}.</span>
                                        <input type="text" class="form-control mr-2" value="{{ $step }}"
                                            placeholder="Enter Step Description">
                                        <button type="button" class="btn btn-danger"
                                            onclick="removeStep(this, {{ $index }})">Remove</button>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <input type="hidden" name="steps_taken_json" id="steps_taken_json">
                    </div>
                    <button type="button" class="btn btn-primary mt-2" onclick="addStep()">Add Step</button>
                </div>

                <!-- Date field -->
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date"
                        value="{{ $ica->date }}">
                </div>

                <!-- Status field -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="open" {{ $ica->status == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="closed" {{ $ica->status == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <br>
                <!-- Media field -->
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
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-image">Add Images</label>
                        <input type="file" class="form-control" id="basic-default-image" name="images[]" multiple>
                    </div>
                @else
                    <p>No media available for this ica.</p>


                    <div class="mb-3">
                        <label class="form-label" for="basic-default-image">Images</label>
                        <input type="file" class="form-control" id="basic-default-image" name="images[]" multiple>
                    </div>

                @endif

                <!-- Submit and Close buttons -->
                <br>
                <button type="submit" class="btn btn-primary submit-btn" onclick="updateStepsJson()">Update</button>
                <button type="button" class="btn btn-secondary float-end" data-bs-dismiss="modal">Close</button>
            </form>
        </div>
    </div>
</div>

<script>
    let removedSteps = [];

    function removeStep(button, stepIndex) {
        // Add the removed step index to the array
        removedSteps.push(stepIndex);

        // Remove the step from the DOM
        button.closest('li').remove();
    }

    function addStep() {
        const list = document.getElementById('steps_taken_list');
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex align-items-center';
        listItem.style.listStyleType = 'none';
        listItem.innerHTML = `
            <input type="text" class="form-control mr-2" placeholder="Enter Step Description">
            <button type="button" class="btn btn-danger" onclick="this.parentNode.remove();">Remove</button>
        `;
        list.appendChild(listItem);
    }

    function updateStepsJson() {
        const steps = [];
        const stepElements = document.querySelectorAll('#steps_taken_list li input');

        stepElements.forEach(element => {
            steps.push(element.value);
        });

        document.getElementById('steps_taken_json').value = JSON.stringify(steps);
    }
</script>
