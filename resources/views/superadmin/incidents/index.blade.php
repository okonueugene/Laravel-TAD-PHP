@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (empty(request()->type_param))
            <div class="add-button">
                <a href="javascript:void(0)" class="btn btn-primary btn-sm  float-end mx-2 modal-button"
                    data-href="{{ url('incidents/create') }}">
                    Add Incident</a>
            </div>
        @else
            <div class="add-button">
                <a href="javascript:void(0)" class="btn btn-primary btn-sm  float-end mx-2 modal-button"
                    data-href="{{ url('incidents/create?type=' . request()->type_param) }}">
                    Add Incident</a>
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
                        @if (empty(request()->type_param))
                            <div class="col-sm-3 form-group">
                                <label>Incident Type</label>
                                <select class="form-control select2" id="incident_type">
                                    <option value="">All</option>
                                    @foreach ($incident_types as $type)
                                        <option value="{{ $type->id }}">
                                            {{ ucwords(str_replace('_', ' ', $type->incident_type)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="col-sm-3 form-group">
                            <label>Investigation</label>
                            <select class="form-control select2" id="investigation">
                                <option value="">All</option>
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>

                        <div class="col-sm-3 form-group">
                            <label>Reporting Done</label>
                            <select class="form-control select2" id="reporting_done">
                                <option value="">All</option>
                                <option value="yes">Done</option>
                                <option value="no">Not Done</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered" width="100%" id="page_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Incident Type</th>
                            <th>Investigation</th>
                            <th>Reporting Done</th>
                            <th>Date</th>
                            <th>Description</th>
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

            var url = "{{ url('incidents') }}?type_param={{ request()->type_param }}";
            var columns = [{
                    data: 'serial_no',
                    name: 'serial_no',
                    searchable: false
                },
                {
                    data: 'incident_type_name',
                    name: 'incident_type_name',
                    searchable: false
                },

                {
                    data: 'investigation_status',
                    name: 'investigation_status'
                },
                {
                    data: 'incident_status',
                    name: 'incident_status'
                },

                {
                    data: 'incident_date',
                    name: 'incident_date'
                },

                {
                    data: 'incident_description',
                    name: 'incident_description',
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
                incident_type: null,
                investigation: null,
                reporting_done: null
            };

            page_table = __initializePageTable(url, columns, filters);

            $(document).on('change', '#daterange, #incident_type, #investigation, #reporting_done', function() {

                // Access the start and end dates from the date range picker
                var startDate = $('#daterange').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var endDate = $('#daterange').data('daterangepicker').endDate.format('YYYY-MM-DD');

                filters = {
                    start_date: startDate,
                    end_date: endDate,
                    incident_type: $('#incident_type').val(),
                    investigation: $('#investigation').val(),
                    reporting_done: $('#reporting_done').val()
                }

                // Destroy the existing DataTable
                page_table.destroy();

                // Reinitialize the DataTable with new filters
                page_table = __initializePageTable(url, columns, filters);
            });

        });
    </script>
@endsection
