@extends('layout.staff.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="add-button ">
            <a href="#" class="btn btn-primary btn-sm float-end modal-button" data-href="{{ url('/app/trainings/create') }}">
                <i class="fa fa-plus me-2"></i>Add Training
            </a>
        </div>
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Awareness Trainings</h4>

        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered" id="page_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Topic</th>
                            <th> Attendees</th>
                            <th>Date</th>
                            <th>Actions</th>
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

            var url = "/app/trainings";
            var columns = [{
                    data: 'serial_no',
                    name: 'serial_no',
                    searchable: false
                },
                {
                    data: 'topic',
                    name: 'topic'
                },
                {
                    data: 'attendees',
                    name: 'attendees'
                },

                {
                    data: 'date',
                    name: 'date'
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
