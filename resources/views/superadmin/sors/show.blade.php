<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addPersonellModalLabel">Show</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="personellDetail">
            <form action="{{ url('sors',[$data->id]) }}" enctype="multipart/form-data" class="form" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="basic-default-observation">Observation</label>
                    <input type="text" name="observation" class="form-control" id="basic-default-observation"
                        placeholder="This ...." disabled value="{{$data->observation}}">
                    <div class="error">
                        @error('observation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-status">Status</label>
                    <select class="form-select" id="basic-default-status" name="status" disabled>
                        <option value="0" @if ($data->status == 0) selected @endif>Open</option>
                        <option value="1" @if ($data->status == 1) selected @endif>Closed</option>
                    </select>
                    <div class="error">
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="basic-default-actionowner">Action Owner</label>
                    <input type="text" name="action_owner" class="form-control" id="basic-default-actionowner"
                        placeholder="Action Owner" disabled  value="{{$data->action_owner}}">
                    <div class="error">
                        @error('action_owner')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="basic-default-due">SOR Type</label>
                    <select class="form-select" id="basic-default-due" name="type_id" disabled>
                        <option value="">Select Record Type</option>
                        @foreach ($sor_types as $type)
                            <option value="{{ $type->id }}" @if ($data->type_id == $type->id) selected @endif>{{ $type->name }}</option>
                        @endforeach

                    </select>
                    <div class="error">
                        @error('type_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               
            </form>
        </div>
    </div>
</div>
