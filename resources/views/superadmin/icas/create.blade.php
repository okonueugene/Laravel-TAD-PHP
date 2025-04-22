@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>ICA Records</h4>
        <!-- DataTable with Buttons -->
        <div class="col-xl">
            <div class="card border-secondary mb-4 h-100 ">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add A Record</h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('icas') }}" method="POST" enctype="multipart/form-data" id="addIcaForm">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-observation">Observation</label>
                            <input type="text" name="observation" class="form-control" id="basic-default-observation"
                                placeholder="This ....">
                            <div class="error">
                                @error('observation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-status">Status</label>
                            <select class="form-select" id="basic-default-status" name="status">
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
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
                            <input type="hidden" name="steps_taken_json" id="steps_taken_json">
                            <button type="button" class="btn btn-primary" onclick="addStep()">Add Step</button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-actionowner">Action Owner</label>
                            <input type="text" name="action_owner" class="form-control" id="basic-default-actionowner"
                                placeholder="Action Owner">
                            <div class="error">
                                @error('action_owner')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-image">Images</label>
                            <input type="file" class="form-control" id="basic-default-image" name="images[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light submit-btn">Submit</button>
                        <button type="button" class="btn btn-secondary waves-effect waves-light float-end"
                            id="close">Close</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
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

            // Make the list sortable (optional)
            // You can use a library like Sortable.js for drag-and-drop sorting

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
        // Close the modal
        document.getElementById('close').addEventListener('click', function() {
            window.location.href = "{{ route('icas.index') }}";
        });

        $(document).on('submit', '#addIcaForm', function(e) {
            e.preventDefault();
            var form = $(this);
            var submitButton = form.find('.submit-btn');

            //replace the text of the submit button with loader
            submitButton.html('<i class="fa fa-spinner fa-spin"></i> Please wait...');

            // Disable submit button
            submitButton.prop('disabled', true);

            //check if submit is successful
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(result) {
                    if (result.success == true) {
                        iziToast.success({
                            title: "Success",
                            message: result.msg,
                            position: "topRight",
                            timeout: 10000,
                            transitionIn: "fadeInDown"
                        });
                        window.location.href = "{{ route('icas.index') }}";
                    } else {
                        iziToast.error({
                            title: "Error",
                            message: result.msg,
                            position: "topRight",
                            timeout: 10000,
                            transitionIn: "fadeInDown"
                        });
                        //replace the text of the submit button with loader
                        submitButton.html('Submit');
                        // Enable submit button
                        submitButton.prop('disabled', false);
                    }
                },
                error: function(err) {
                    iziToast.error({
                        title: "Error",
                        message: "An error occurred. Please try again",
                        position: "topRight",
                        timeout: 10000,
                        transitionIn: "fadeInDown"
                    });
                    //replace the text of the submit button with loader
                    submitButton.html('Submit');
                    // Enable submit button
                    submitButton.prop('disabled', false);
                }
            });
        });
    </script>
@endsection
