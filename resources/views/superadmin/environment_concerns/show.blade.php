<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="showModalLabel">View Environment Concern</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label" for="basic-default-type">Type</label>
                <input type="text" class="form-control" id="basic-default-type" value="{{ $environment->type }}"
                    readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-comment">Comment</label>
                @if ($environment->comment !== null)
                    <textarea class="form-control" id="basic-default-comment" rows="4" readonly>{{ $environment->comment }}</textarea>
                @else
                    <input type="text" class="form-control" id="basic-default-comment" value="No comment" readonly>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-corrective_action">Corrective Actions</label>
                @if (!empty($environment->corrective_actions))
                    <ol id="corrective_actions_list" class="list-group" readonly>
                        @foreach ($environment->corrective_actions as $index => $action)
                            <li class="list-group-item">{{ $index }}. {{ $action }}</li>
                        @endforeach
                    </ol>
                @else
                    <input type="text" class="form-control" id="basic-default-corrective_action"
                        value="No corrective actions" readonly>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-status">Status</label>
                <input type="text" class="form-control" id="basic-default-status" value="{{ $environment->status }}"
                    readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-project_manager">Project Manager</label>
                <input type="text" class="form-control" id="basic-default-project_manager"
                    value="{{ $environment->project_manager }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-auditor">Auditor</label>
                <input type="text" class="form-control" id="basic-default-auditor"
                    value="{{ $environment->auditor }}" readonly>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>
