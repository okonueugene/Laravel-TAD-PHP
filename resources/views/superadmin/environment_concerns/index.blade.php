@extends('layout.app')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (auth()->user()->can('add_environment'))
            <div class="add-button ">
                <a href="{{ route('environmental-policy-checklist') }}" class="btn btn-primary btn-sm float-end mx-2">Add Policy
                    Checklist</a>
                <a href="#" class="btn btn-primary btn-sm  float-end mx-2 modal-button"
                    data-href="{{ url('environment/create') }}">Add
                    Free
                    Form</a>
            </div>
        @endif
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Enviromental Concern</h4>
        <div class="card filter-card">
            <div class="row">
                <div class="col-sm-12">
                    <h5>Filters</h5>
                    <div class="row">

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Date Range <span class="text-danger">*</span></label>
                                <input type="text" readonly id="daterange" class="form-control"
                                    value="{{ date('m/01/Y') }} - {{ date('m/t/Y') }}" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="assignor">Added By</label>
                            <select class="form-select" id="assignor" name="assignor">
                                <option value="0">All</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="type">Type</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="" selected>Select Type</option>
                                <option value="Waste Management">Waste Management</option>
                                <option value="Air Management">Air Management</option>
                                <option value="Noise Management">Noise Management</option>
                                <option value="Soil Management">Soil Management</option>
                                <option value="Biodiversity Management">Biodiversity Management</option>
                                <option value="Energy Management">Energy Management</option>
                                <option value="Chemical Management">Chemical Management</option>
                                <option value="Water Management">Water Management</option>
                                <option value="Checklist">Checklist</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">All</option>
                                <option value="pending">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered" id="page_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Type</th>
                            <th>Comment</th>
                            <th>Corrective Action</th>
                            <th>Status</th>
                            <th>Project Manager</th>
                            <th>Auditor</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {

            var url = "/environment";
            var columns = [{
                    data: 'serial_no',
                    name: 'serial_no',
                    searchable: false
                },
                {
                    data: 'type',
                    name: 'observationtype',
                    searchable: false
                },

                {
                    data: 'comments',
                    name: 'comments'
                },
                {
                    data: 'corrective_actions',
                    name: 'corrective_actions'
                },

                {
                    data: 'status',
                    name: 'status'
                },

                {
                    data: 'project_manager',
                    name: 'project_manager'
                },

                {
                    data: 'auditor',
                    name: 'auditor'
                },

                {
                    data: 'action',
                    name: 'action',
                    className: 'text-left notexport',
                    searchable: false
                }
            ];


            // Access the start and end dates from the date range picker
            var startDate = $('#daterange').data('daterangepicker').startDate.format('YYYY-MM-DD');
            var endDate = $('#daterange').data('daterangepicker').endDate.format('YYYY-MM-DD');

            var filters = {
                start_date: startDate,
                end_date: endDate,
                status: null,
                type: null,
                assignor: null
            };

            page_table = __initializePageTable(url, columns, filters);

            $(document).on('change', '#daterange , #status, #type, #assignor', function() {
                // Access the start and end dates from the date range picker
                var startDate = $('#daterange').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var endDate = $('#daterange').data('daterangepicker').endDate.format('YYYY-MM-DD');

                var status = $('#status').val();
                var type = $('#type').val();
                var assignor = $('#assignor').val();

                var filters = {
                    start_date: startDate,
                    end_date: endDate,
                    status: status,
                    type: type,
                    assignor: assignor
                };

                // Destroy the existing DataTable
                page_table.destroy();

                // Reinitialize the DataTable with new filters
                page_table = __initializePageTable(url, columns, filters);
            });

        });
    </script>
@endsection
