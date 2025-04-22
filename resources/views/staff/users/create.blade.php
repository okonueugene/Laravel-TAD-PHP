 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title">Add User</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{ url('users') }}" method="POST" class="form">
             @csrf
             <div class="modal-body">
                 <div class="mb-3">
                     <label class="form-label">User Name</label>
                     <input type="text" class="form-control" name="name" id="name"
                         placeholder="Enter User Name">
                 </div>
                 <div class="error">
                     @error('name')
                         <span class="text-danger">{{ $message }}</span>
                     @enderror
                 </div>
                 <div class="mb-3">
                     <label class="form-label">Email</label>
                     <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
                 </div>
                 <div class="error">
                     @error('email')
                         <span class="text-danger">{{ $message }}</span>
                     @enderror
                 </div>
                 <div class="mb-3">
                     <label class="form-label">Password</label>
                     <input type="text" class="form-control" name="password" id="password"
                         placeholder="Enter Password">
                 </div>
                 <div class="error">
                     @error('password')
                         <span class="text-danger">{{ $message }}</span>
                     @enderror
                 </div>
                 <div class="mb-3">
                     <label class="form-label">Password Confirmation</label>
                     <input type="text" class="form-control" name="password_confirmation" id="password_confirmation"
                         placeholder="Password Confirmation">
                 </div>
                 <div class="error">
                     @error('password_confirmation')
                         <span class="text-danger">{{ $message }}</span>
                     @enderror
                 </div>
                 <div class="mb-3">
                     <label class="form-label">Role</label>
                     <select class="form-select" name="role" id="role">
                         @foreach ($roles as $role)
                             <option value="{{ $role->id }}">{{ $role->name }}</option>
                         @endforeach
                     </select>
                 </div>
                 <div class="error">
                     @error('role')
                         <span class="text-danger">{{ $message }}</span>
                     @enderror
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary submit-btn waves-effect waves-light">Submit</button>
                 </div>
         </form>
     </div>
 </div>
