@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (empty(request()->type_param))
            <div class="add-button">
                <a href="#" class="btn btn-primary btn-sm  float-end mx-2 modal-button"
                    data-href="{{ url('sors/create') }}">Add</a>
            </div>
        @else
            <div class="add-button">
                <a href="#" class="btn btn-primary btn-sm  float-end mx-2 modal-button"
                    data-href="{{ url('sors/create') }}?type_param={{request()->type_param}}">Add</a>
            </div>
        @endif
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>{{ $page_title }}</h4>
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
                                <option value="">All</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if (empty(request()->type_param))
                            <div class="col-sm-3 form-group">
                                <label for="type">SORs Type</label>
                                <select class="form-select" id="type" name="type">
                                    <option value="">All</option>
                                    @foreach ($sor_types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="col-sm-3 form-group">
                            <label for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">All</option>
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- DataTable with Buttons -->
        <div class="card">

            <div class="table">
                <table class="table table-hover table-bordered" width="100%" id="page_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Observation</th>
                            <th>Added By</th>
                            <th>Action Owner</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    {{-- viewSorModal --}}
    <div class="modal fade" id="viewSorModal" tabindex="-1" aria-labelledby="viewSorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewSorModalLabel">View SOR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-observation">Observation</label>
                        <input type="text" class="form-control" id="basic-default-observation" name="observation"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-steps-taken">Steps Taken</label>
                        <div id="basic-default-steps-taken"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-date">Date</label>
                        <input type="text" class="form-control" id="basic-default-date" name="created_at" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-status">Status</label>
                        <input type="text" class="form-control" id="basic-default-status" name="status" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Media</label>
                        <div id="mediaContainer"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            //  example json       {"id":"1","assignor_id":"1","action_owner":"Dry construction","type_id":"1","observation":"Poor site housekeeping","status":"0","steps_taken":"[]","date":"2024-06-05","created_at":"2024-06-05 11:55:59","updated_at":"2024-06-05 11:55:59"},

            var url = "{{ url('sors') }}?type_param={{ request()->type_param }}";


            var columns = [{
                    data: 'serial_no',
                    name: 'serial_no',
                    searchable: false
                },
                {
                    data: 'observation',
                    name: 'observation'
                },
                {
                    data: 'assignor',
                    name: 'assignor'
                },
                {
                    data: 'action_owner',
                    name: 'action_owner'
                },
                {
                    data: 'date',
                    name: 'date'
                },

                {
                    data: 'type',
                    name: 'type'
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

            console.log(JSON.stringify(filters) + 'first');

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
                console.log(JSON.stringify(filters) + 'second');

                // Destroy the existing DataTable
                page_table.destroy();

                // Reinitialize the DataTable with new filters
                page_table = __initializePageTable(url, columns, filters);
            });

        });
    </script>
@endsection
