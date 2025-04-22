<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editTrainingModalLabel">Edit Training</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="editTrainingModalBody">
            <form action="{{ url('/app/trainings/' . $training->id) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="topic" class="form-label fw-bold">Topic</label>
                    <input type="text" class="form-control" id="topic" name="topic"
                        value="{{ $training->topic }}" required>
                </div>
                <div class="mb-3">
                    <label for="attendees" class="form-label fw-bold">Attendees</label>
                    <input type="text" class="form-control" id="attendees" name="attendees"
                        value="{{ $training->attendees }}" required>
                </div>
                <input type="hidden" name="date" value="{{ $training->date }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn submit-btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
