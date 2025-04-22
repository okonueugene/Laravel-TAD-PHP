<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Environment Concern</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="editForm" class="form" action="{{ url('environment/' . $environment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="" selected>Select Type</option>
                        <option value="Waste Management"
                            {{ $environment->type == 'Waste Management' ? 'selected' : '' }}>Waste Management</option>
                        <option value="Air Management" {{ $environment->type == 'Air Management' ? 'selected' : '' }}>
                            Air Management</option>
                        <option value="Noise Management"
                            {{ $environment->type == 'Noise Management' ? 'selected' : '' }}>Noise Management</option>
                        <option value="Soil Management" {{ $environment->type == 'Soil Management' ? 'selected' : '' }}>
                            Soil Management</option>
                        <option value="Biodiversity Management"
                            {{ $environment->type == 'Biodiversity Management' ? 'selected' : '' }}>Biodiversity
                            Management</option>
                        <option value="Energy Management"
                            {{ $environment->type == 'Energy Management' ? 'selected' : '' }}>Energy Management</option>
                        <option value="Chemical Management"
                            {{ $environment->type == 'Chemical Management' ? 'selected' : '' }}>Chemical Management
                        </option>
                        <option value="Water Management"
                            {{ $environment->type == 'Water Management' ? 'selected' : '' }}>Water Management</option>
                        <option value="Checklist" {{ $environment->type == 'Checklist' ? 'selected' : '' }}>Checklist
                        </option>
                        <option value="Other" {{ $environment->type == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea class="form-control" id="comment" name="comment">{{ $environment->comment }}</textarea>
                </div>
                <div class="form-group">
                    <label for="corrective_action">Corrective Actions</label>
                    <div class="sortable-actions-container">
                        <ul id="corrective_actions_list" class="list-group-sortable">
                            @if (!empty($environment->corrective_actions))
                                @foreach ($environment->corrective_actions as $index => $action)
                                    <li class="list-group-item d-flex align-items-center"
                                        style="list-style-type: none;">
                                        <span class="mr-2">{{ $index }}.</span>
                                        <input type="text" class="form-control mr-2" value="{{ $action }}"
                                            placeholder="Enter Corrective Action">
                                        <button type="button" class="btn btn-danger"
                                            onclick="removeAction(this, {{ $index }})">Remove</button>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <input type="hidden" name="corrective_actions_json" id="corrective_actions_json">
                    </div>
                    <button type="button" class="btn btn-primary mt-2" onclick="addAction()">Add Action</button>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="pending" {{ $environment->status == 'pending' ? 'selected' : '' }}>Pending
                        </option>
                        <option value="approved" {{ $environment->status == 'approved' ? 'selected' : '' }}>Approved
                        </option>
                        <option value="rejected" {{ $environment->status == 'rejected' ? 'selected' : '' }}>Rejected
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="project_manager" class="form-label">Project Manager</label>
                    <input type="text" class="form-control" id="project_manager" name="project_manager"
                        value="{{ $environment->project_manager }}" required>
                </div>
                <div class="mb-3">
                    <label for="auditor" class="form-label">Auditor</label>
                    <input type="text" class="form-control" id="auditor" name="auditor"
                        value="{{ $environment->auditor }}" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="updateActionsJson()">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
 var removedActions = [];

 function removeAction(button , index) {
    //Add the index to the removedActions array
   removedActions.push(index);
    //Remove the action from the list
    button.closest('li').remove();
 }

 function addAction()
 {
     const list = document.getElementById('corrective_actions_list');
     const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex align-items-center';
        listItem.style.listStyleType = 'none';
        listItem.innerHTML = `
            <input type="text" class="form-control mr-2" placeholder="Enter Corrective Action">
            <button type="button" class="btn btn-danger" onclick="this.parentNode.remove();">Remove</button>
        `;
        list.appendChild(listItem);
 }

    function updateActionsJson()
    {
        const actions = [];
        const actionElements = document.querySelectorAll('#corrective_actions_list li input');
    
        actionElements.forEach(element => {
            actions.push(element.value);
        });
    
        document.getElementById('corrective_actions_json').value = JSON.stringify(actions);
    }

</script>
