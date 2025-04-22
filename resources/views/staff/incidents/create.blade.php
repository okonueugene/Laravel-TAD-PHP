<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addPersonellModalLabel">Add Incident</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="addIncident">
            <form action="{{ url('/app/incidents') }}" method="POST" enctype="multipart/form-data" class="form">
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
                    <input type="file" class="form-control" id="basic-default-image" name="media[]" multiple>
                    <small class="form-text text-muted">Select one or more images to preview them below.</small>
                    <div id="image-preview-container" class="mt-3 d-flex flex-wrap gap-2"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-due">Incident Type</label>
                    <select class="form-select" id="basic-default-due" name="incident_type_id" required>
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

<script>

        //check if the element exists before adding the event listener
        if (document.getElementById('basic-default-image')) {

document.getElementById('basic-default-image').addEventListener('change', function(event) {
    const previewContainer = document.getElementById('image-preview-container');
    previewContainer.innerHTML = ''; // Clear previous previews

    const files = event.target.files;

    // If no files are selected, return
    if (!files.length) return;

    Array.from(files).forEach((file) => {
        // Check if the file is an image
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgContainer = document.createElement('div');
                imgContainer.style.position = 'relative';
                imgContainer.style.display = 'inline-block';

                // Create image element
                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = file.name;
                img.style.height = '100px';
                img.style.border = '1px solid #ddd';
                img.style.borderRadius = '5px';
                img.style.marginRight = '10px';

                // Create a remove button for each image
                const removeButton = document.createElement('button');
                removeButton.textContent = 'Remove';
                removeButton.style.position = 'absolute';
                removeButton.style.top = '5px';
                removeButton.style.right = '5px';
                removeButton.style.backgroundColor = '#ff4d4f';
                removeButton.style.color = '#fff';
                removeButton.style.border = 'none';
                removeButton.style.borderRadius = '5px';
                removeButton.style.padding = '2px 5px';
                removeButton.style.cursor = 'pointer';

                removeButton.addEventListener('click', function() {
                    imgContainer.remove(); // Remove the container
                    updateInputFiles(files, file); // Update file list
                });

                imgContainer.appendChild(img);
                imgContainer.appendChild(removeButton);
                previewContainer.appendChild(imgContainer);
            };
            reader.readAsDataURL(file);
        }
    });
});

// Function to update input files after removing one
function updateInputFiles(fileList, fileToRemove) {
    const dataTransfer = new DataTransfer();

    Array.from(fileList).forEach((file) => {
        if (file !== fileToRemove) {
            dataTransfer.items.add(file); // Add back files that aren't removed
        }
    });

    document.getElementById('basic-default-image').files = dataTransfer
    .files; // Update the input's file list
}
}
</script>
