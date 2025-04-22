<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add Free Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="addForm" class="form">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Type</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="" selected>Select Type</option>
                        <option value="Waste Management">Waste Management</option>
                        <option value="Air Management">Air Management</option>
                        <option value="Noise Management">Noise Management</option>
                        <option value="Soil Management">Soil Management</option>
                        <option value="Biodiversity Management">Biodiversity Management</option>
                        <option value="Energy Management">Energy Management</option>
                        <option value="Chemical Management">Chemical Management</option>
                        <option value="Water Management">Water Management</option>
                        <option value="Checklist">Checklist</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea class="form-control" id="comment" name="comment" required></textarea>
                </div>
                <div class="form-group" style="margin-top: 10px;">
                    <label for="corrective_action">Corrective Actions</label>
                    <div class="actions-container">
                        <ul id="corrective_actions_list" class="list-group">
                        </ul>
                    </div>
                    <input type="hidden" name="corrective_action" id="corrective_action">
                    <button type="button" class="btn btn-primary" onclick="addAction()">Add
                        Action</button>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="project_manager" class="form-label">Project Manager</label>
                    <input type="text" class="form-control" id="project_manager" name="project_manager" required>
                </div>
                <div class="mb-3">
                    <label for="auditor" class="form-label">Auditor</label>
                    <input type="text" class="form-control" id="auditor" name="auditor" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function addAction() {
        // Create a new list item element for the step
        const newStep = document.createElement('li');
        newStep.classList.add('list-group-item');

        // Input field for step description
        const stepInput = document.createElement('input');
        stepInput.type = 'text';
        stepInput.classList.add('form-control');
        stepInput.placeholder = 'Enter Action Description';
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
        const stepsList = document.getElementById('corrective_actions_list');
        stepsList.appendChild(newStep);
    }

    function updateStepsJson() {
        let steps = {}; // Initialize steps as an object

        const stepElements = document.querySelectorAll('#corrective_actions_list li input');

        let index = 1; // Start index from 1

        stepElements.forEach((element) => {
            const trimmedStep = element.value.trim();
            if (trimmedStep) {
                steps[index] = trimmedStep; // Use index as key and step description as value
                index++;
            }
        });

        const stepsJson = JSON.stringify(steps); // Convert object to JSON string

        document.getElementById('corrective_action').value = stepsJson;

        console.log(stepsJson);
    }

    // Handle form submission
    $('#addForm').submit(function(e) {
        e.preventDefault();
        let comments = $('#comment').val();
        let type = $('#type').val();
        let corrective_action = $('#corrective_action').val();
        let status = $('#status').val();
        let project_manager = $('#project_manager').val();
        let auditor = $('#auditor').val();

        let data = {
            comments: comments,
            type: type,
            corrective_action: corrective_action,
            status: status,
            project_manager: project_manager,
            auditor: auditor
        };

        console.log(data);

        axios.post('{{ url('environment') }}', data)
            .then(function(response) {
                console.log(response);
                if (response.data) {
                    window.location.reload();
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    });
</script>
