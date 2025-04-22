@extends('layout.app')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card card-bordered mb-3">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <span class="me-2">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        <h6> Invitation List </h6>
                    </button>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <table class="table table-hover table-bordered" id="accordion_table">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Sent By</th>
                                        <th>Status</th>
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
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header text-center">
                <h5>
                    Manage Users
                </h5>
                <div class="add-user float-end">
                    <a href="#" class="btn btn-primary btn-sm float-end modal-button"
                        data-href="{{ url('users/create') }}">
                        Add User
                    </a>
                </div>
                <div class="invite-user float-end me-2">
                    <a href="#" class="btn btn-primary btn-sm float-end modal-button"
                        data-href="{{ route('invitation') }}">
                        Invite User
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="table">
                    <table class="table table-hover table-bordered" id="page_table">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Action</th>
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
    <!-- / Content -->
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {

            var url = "/userslist";
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
                    data: 'rolenames',
                    name: 'rolenames',
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

            // Invitation Table
            var link = "{{ route('invitations') }}";


            var columns = [{
                    data: 'serial_no',
                    name: 'serial_no',
                    searchable: false
                },
                {
                    data: 'email',
                    name: 'email'
                },

                {
                    data: 'invited_by',
                    name: 'invited_by'

                },
                {
                    data: 'status',
                    name: 'status'
                },

                {
                    data: 'action',
                    name: 'action',
                    className: 'text-left notexport',
                    searchable: false


                }

            ];

            $('#accordion_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: link,
                    type: 'GET'
                },
                columns: columns,
                "order": [
                    [0, "desc"]
                ],
                "columnDefs": [{
                    "targets": 'notexport',
                    "orderable": false,
                }]
            });

        });
    </script>
@endsection
