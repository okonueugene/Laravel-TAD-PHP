<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('/app/users/' . $user->id) }}" method="POST" class="form">
            @method('PATCH')
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">User Name</label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Enter User Name" value="{{ $user->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email"
                        value="{{ $user->email }}">
                </div>
                @if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin'))
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role" id="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ $user->roles->first() ? ($role->id == $user->roles->first()->id ? 'selected' : '') : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label">Password (leave blank if you don't want to change)</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Enter Password">
                </div>
                <div class="mb-3">
                    <label for="avatar"
                        class="col-md-4 col-form-label text-md-right">{{ __('Avatar (optional)') }}</label>
                    <div class="col-md-6">
                        <input id="avatar" type="file" class="form-control" name="avatar">
                        <div id="image-preview-container" class="mt-3 d-flex flex-wrap gap-2"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary submit-btn waves-effect waves-light">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        //check if the element exists before adding the event listener
        if (document.getElementById('avatar')) {
            document.getElementById('avatar').addEventListener('change', function(event) {
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
    });
</script>
