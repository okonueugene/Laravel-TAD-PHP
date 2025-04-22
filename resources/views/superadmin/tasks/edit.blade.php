<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editTaskModalLabel">Edit Task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="editTask">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('/app/user-tasks', $task->id) }}" method="POST" class="form">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Task Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $task->title }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Task Description</label>
                            <input type="text" class="form-control" name="description" value="{{ $task->description }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Task Comments</label>
                            <input type="text" class="form-control" name="comments" value="{{ $task->comments }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Start
                                Date</label>
                            <input type="date" class="form-control" name="from" value="{{ $task->from }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Due Date</label>
                            <input type="date" class="form-control" name="to" value="{{ $task->to }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Task Status</label>
                            <select class="form-select" name="status" value="{{ $task->status }}">
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <div>
                            @if (count($task->media) > 0)
                            <label class="form-label">Task Media</label>
                                <div class="row">
                                    @foreach ($task->media as $media)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ asset('storage/' . parse_image_url($media->original_url)) }}"
                                                    alt="{{ $media->file_name }}" class="card-img-top">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $media->file_name }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>No media available for this task.</p>
                            @endif
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary submit-btn waves-effect waves-light">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
