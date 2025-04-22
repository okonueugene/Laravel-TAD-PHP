<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Environment Concern</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="editForm" action="{{ url('/app/environment/' . $environment->id) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea class="form-control" id="comment" name="comment">{{ $environment->comments }}</textarea>
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
                        <option value="open" {{ $environment->status == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="closed" {{ $environment->status == 'closed' ? 'selected' : '' }}>Closed</option>
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
