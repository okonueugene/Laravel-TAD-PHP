<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('users/' . $user->id) }}" method="POST" class="form">
            @method('PATCH')
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">User Name</label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Enter User Name" value="{{ $user->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email"
                        value="{{ $user->email }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select class="form-select" name="role" id="role">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ $user->roles->first() ? ($role->id == $user->roles->first()->id ? 'selected' : '') : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary submit-btn waves-effect waves-light">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
