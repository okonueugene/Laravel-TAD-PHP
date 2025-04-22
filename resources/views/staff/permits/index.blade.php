@extends('layout.staff.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (auth()->user()->can('add_permit'))
            <div class="add-button ">
                <a href="javascript:void(0)" class="btn btn-primary float-end modal-button"
                    data-href="{{ url('/app/permits/create') }}">Add Permit</a>
            </div>
        @endif
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Permits Applicable</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered" id="page_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Type Of Permit</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Duration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                </table>
            </div>
        </div>

    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {

            var url = "/app/permits";

            var columns = [{
                    data: 'serial_no',
                    name: 'serial_no',
                    searchable: false
                },
                {
                    data: 'type',
                    name: 'type',
                },

                {
                    data: 'start_date',
                    name: 'start_date',
                },
                {
                    data: 'end_date',
                    name: 'end_date',
                },
                {
                    data: 'duration',
                    name: 'duration',
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
