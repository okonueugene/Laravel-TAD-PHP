<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addTrainingModalLabel">Add Training</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="addTrainingModalBody">
            <form action="{{ url('/app/trainings') }}" method="POST" class="form" type="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="topic" class="form-label fw-bold">Topic</label>
                    <input type="text" class="form-control" id="topic" name="topic" required>
                </div>
                <div class="mb-3">
                    <label for="attendees" class="form-label fw-bold">Attendees</label>
                    <input type="number" class="form-control" id="attendees" name="attendees" required>
                </div>
                <div class="mb-3">
                    <label for="comments" class="form-label fw-bold">Comments</label>
                    <textarea class="form-control" id="comments" name="comments" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Images</label>
                    <input type="file" class="form-control" id="basic-default-image" name="images[]" multiple>
                    <small class="form-text text-muted">Select one or more images to preview them below.</small>
                    <div id="image-preview-container" class="mt-3 d-flex flex-wrap gap-2"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="submit-btn btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
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
</script>