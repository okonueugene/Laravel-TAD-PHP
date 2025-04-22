@extends('layout.staff.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-semibold mb-4 mx-auto text-center">Roles List</h4>
        @if (auth()->user()->can('add_roles'))
            <div class="button btn-success float-end">
                <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#addRoleModal">Add Role</a>
            </div>
        @endif
        <p class="mb-4 mx-auto text-center">
            A role provided access to predefined menus and features so that depending on <br> assigned role an
            administrator can have access to what user needs.
        </p>
        <!-- Role cards -->

        <div class="col-xl">
            <div class="card border-secondary mb-4 h-100 ">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-body">
                        <table class="table table-hover table-bordered" id="page_table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
@endsection

@section('modals')
    <!-- Add Role Modal -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Role Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Role Name"
                                required>
                            <div class="error">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Permissions</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="selectAllPermissions">
                                <label class="form-check-label" for="selectAllPermissions">Select All</label>
                            </div>
                            <select class="form-select" name="permissions[]" id="multiple-select-field" multiple required>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>

                            <div class="error">
                                @error('permissions')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="editRoleModal"
        aria-hidden="true">
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Edit Role</h5>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Edit Role Form -->
                    <form id="editRoleForm">
                        <div class="mb-3">
                            <label class="form-label">Role Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Permissions</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="selectAllPermissions2">
                                {{-- <label class="form-check-label" for="selectAllPermissions2">Select All</label> --}}
                            </div>
                            <select class="form-select" name="permissions[]" id="multiple-select-field2" multiple>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- / Modal Body -->
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Initialize selectize for permissions
        $('#multiple-select-field').selectize({
            plugins: ['remove_button'],
            delimiter: ',',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                };
            }
        });

        // Initialize selectize for permissions
        $('#multiple-select-field2').selectize({
            plugins: ['remove_button'],
            delimiter: ',',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                };
            }
        });
    </script>

    <script>
        // Populate all permissions when "Select All" checkbox is checked
        $('#selectAllPermissions').click(function() {
            if ($(this).is(':checked')) {
                const allPermissions = @json($permissions->pluck('id'));
                $('#multiple-select-field')[0].selectize.setValue(allPermissions);
            } else {
                $('#multiple-select-field')[0].selectize.clear();
            }
        });

        // Populate all permissions when "Select All" checkbox is checked
        $('#selectAllPermissions2').click(function() {
            if ($(this).is(':checked')) {
                const allPermissions = @json($permissions->pluck('id'));
                $('#multiple-select-field2')[0].selectize.setValue(allPermissions);
            } else {
                $('#multiple-select-field2')[0].selectize.clear();
            }
        });
    </script>

    <script>
        // Function to edit role
        function editRole(role) {
            var roleId = $(role).data('role-id');

            // Get the CSRF token from the XSRF-TOKEN cookie
            const csrfToken = document.cookie
                .split('; ')
                .find(cookie => cookie.startsWith('XSRF-TOKEN='))
                .split('=')[1];

            // Set up Axios to include the CSRF token in the headers
            axios.defaults.headers.common['X-XSRF-TOKEN'] = csrfToken;

            // Send an Axios GET request to fetch role data with the given roleId and csrf token
            axios.get(`/roles/${roleId}`)
                .then(function(response) {
                    console.log(response.data);

                    // Populate the edit role form with fetched data
                    $('#editRoleForm #name').val(response.data.role);

                    // Clear and update the select field with the role's permissions
                    var select = $('#editRoleForm #multiple-select-field2');
                    select.empty();

                    // If the role has permissions, populate the select field with those permissions
                    if (response.data.rolePermissions.length > 0) {
                        $.each(response.data.rolePermissions, function(permissionId) {
                            select.append('<option value="' + permissionId + '">' + permissionId + '</option>');
                        });
                    } else {
                        // If the role has 0 permissions, populate with all original permissions
                        @foreach ($permissions as $permission)
                            select.append('<option value="{{ $permission->id }}">{{ $permission->name }}</option>');
                        @endforeach
                    }

                    // Add remaining permissions as options
                    var selectedPermissions = select.val();
                    @foreach ($permissions as $permission)
                        if (selectedPermissions.indexOf('{{ $permission->id }}') === -1) {
                            select.append('<option value="{{ $permission->id }}">{{ $permission->name }}</option>');
                        }
                    @endforeach

                    // Submit form on submit
                    $('#editRoleForm').submit(function(e) {
                        e.preventDefault();

                        // Get the form data
                        var formData = {
                            name: $('#editRoleForm #name').val(),
                            permissions: $('#editRoleForm #multiple-select-field2').val(),
                        };
                        console.log(formData);

                        // Send an AXIOS PATCH request
                        axios.patch(`/roles/${roleId}`, formData)
                            .then(function(response) {
                                console.log(response.data);
                                // Hide the modal
                                $('#editRoleModal').modal('hide');

                                // Show a success toast
                                toastr.success(response.data.message, 'Success!');
                                location.reload();
                            })
                            .catch(function(error) {
                                console.log(error.response.data);
                                // Show an error toast
                                toastr.error(error.response.data.message, 'Error!');
                            });
                    });
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        $(document).ready(function() {

            var url = "/app/roles";
            var columns = [{
                    data: 'serial_no',
                    name: 'serial_no',
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name',
                },

                {
                    data: 'permissions',
                    name: 'permissions',
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-left notexport',
                    searchable: false
                }
            ];

            var filters = {};

            page_table = __initializePageTable(url, columns, filters);

        });
    </script>
@endsection
