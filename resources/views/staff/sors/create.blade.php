<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addPersonellModalLabel">Add</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="personellDetail">
            <form id="personellForm" enctype="multipart/form-data" class="form" method="POST" action="{{ url('/app/sors') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-observation">Observation</label>
                    <input type="text" name="observation" class="form-control" id="basic-default-observation"
                        placeholder="This ...." required>
                    <div class="error">
                        @error('observation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-status">Status</label>
                    <select class="form-select" id="basic-default-status" name="status" required>
                        <option value="0">Open</option>
                        <option value="1">Closed</option>
                    </select>
                    <div class="error">
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-stepstaken">Steps Taken</label>
                    <div class="sortable-steps-container">
                        <ul id="steps_taken_list" class="list-group">
                        </ul>
                    </div>
                    <input type="hidden" name="steps_taken_json" id="steps_taken_json" required>
                    <button type="button" class="btn btn-primary" onclick="addStep()">Add Step</button>
                    <div class="error">
                        @error('steps_taken')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-actionowner">Action Owner</label>
                    <input type="text" name="action_owner" class="form-control" id="basic-default-actionowner"
                        placeholder="Action Owner" required>
                    <div class="error">
                        @error('action_owner')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-client ">Client/Contractor</label>
                    <input type="text" name="client" class="form-control" id="basic-default-client"
                        placeholder="Client" required>
                    <div class="error">
                        @error('client')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-image">Images</label>
                    <input type="file" class="form-control" id="basic-default-image" name="images[]" multiple>
                    <small class="form-text text-muted">Select one or more images to preview them below.</small>
                    <div id="image-preview-container" class="mt-3 d-flex flex-wrap gap-2"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-due">SOR Type</label>
                    @if(empty($type_name))
                    <select class="form-select" id="basic-default-due" name="type_id" required>
                        <option value="">Select Record Type</option>
                        @foreach ($sor_types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @else
                        <input class="form-control" disabled value="{{$type_name}}">
                        <input type="hidden" name="type_id" value="{{$type_param}}">
                    @endif
                    <div class="error">
                        @error('type_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @if (auth()->user()->can('add_sor'))
                    <button type="submit" class="btn btn-primary submit-btn waves-effect waves-light">Submit</button>
                @endif
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
    function addStep() {
        // Create a new list item element for the step
        const newStep = document.createElement('li');
        newStep.classList.add('list-group-item');

        // Input field for step description
        const stepInput = document.createElement('input');
        stepInput.type = 'text';
        stepInput.classList.add('form-control');
        stepInput.placeholder = 'Enter Step Description';
        stepInput.addEventListener('input', () => updateStepsJson()); // Update JSON on input change

        newStep.appendChild(stepInput);

        // Button to remove the step
        const removeButton = document.createElement('button');
        removeButton.classList.add('btn', 'btn-sm', 'btn-danger');
        removeButton.textContent = 'Remove';
        removeButton.onclick = function() {
            this.parentNode.remove();
            updateStepsJson(); // Update JSON after removing a step
        };
        newStep.appendChild(removeButton);

        // Append the new step to the list
        const stepsList = document.getElementById('steps_taken_list');
        stepsList.appendChild(newStep);
    }

    function updateStepsJson() {
        let steps = {}; // Initialize steps as an object

        const stepElements = document.querySelectorAll('#steps_taken_list li input');

        let index = 1; // Start index from 1

        stepElements.forEach((element) => {
            const trimmedStep = element.value.trim();
            if (trimmedStep) {
                steps[index] = trimmedStep; // Use index as key and step description as value
                index++;
            }
        });

        const stepsJson = JSON.stringify(steps); // Convert object to JSON string

        document.getElementById('steps_taken_json').value = stepsJson;
    }

    document.getElementById('personellForm').addEventListener('submit', function(event) {
        updateStepsJson(); // Ensure the JSON is updated before form submission
    });
</script>
