<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">View User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="role">Role</label>
                <input type="text" class="form-control" id="role" name="role" value="{{ $user->roles->first()->name }}" readonly>
            </div>
        </div>
    </div>
</div>
