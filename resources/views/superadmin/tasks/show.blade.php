<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="viewTaskModalLabel">View Task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="viewTask">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="title">Task Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $task->title }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Task Description</label>
                        <input type="text" class="form-control" id="description" name="description"
                            value="{{ $task->description }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="comments">Task Comments</label>
                        <input type="text" class="form-control" id="comments" name="comments"
                            value="{{ $task->comments }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="from">Start Date</label>
                        <input type="date" class="form-control" id="from" name="from"
                            value="{{ $task->from }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="to">Due Date</label>
                        <input type="date" class="form-control" id="to" name="to"
                            value="{{ $task->to }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="status">Task Status</label>
                        <select class="form-select" id="status" name="status" value="{{ $task->status }}" readonly>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div>
                        @if ($task->media)
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
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>
