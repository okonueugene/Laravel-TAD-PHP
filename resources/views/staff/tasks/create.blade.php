<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
        <!-- Modal header -->
        <div class="modal-header">
            <h5 class="modal-title" id="showModalLabel">Add Task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ url('/app/user-tasks') }}" method="POST" enctype="multipart/form-data" class="form"
                id="addForm">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title" required>

                    <div class="error">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter Description" rows="4" required></textarea>
                    <div class="error">
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Comments</label>
                    <textarea class="form-control" name="comments" placeholder="Enter Comments" rows="4"></textarea>
                    <div class="error">
                        @error('comments')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" class="form-control" name="from" placeholder="Enter Start Date" required>
                    <div class="error">
                        @error('from')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Due Date</label>
                    <input type="date" class="form-control" name="to" placeholder="Enter Due Date" required>
                    <div class="error">
                        @error('to')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status">
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                        <option value="continuous">Continuous</option>
                    </select>
                    <div class="error">
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Assign To</label>
                    <select class="form-select" name="user_id" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <div class="error">
                        @error('user_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Photos</label>
                    <input type="file" class="form-control" id="basic-default-image" name="media[]" multiple>
                    <small class="form-text text-muted">Select one or more images to preview them below.</small>
                    <div id="image-preview-container" class="mt-3 d-flex flex-wrap gap-2"></div>
                    <div class="error">
                        @error('media')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary submit-btn">Add Task</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
