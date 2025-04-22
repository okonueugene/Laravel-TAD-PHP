@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="add-button">
            <a href="#" class="btn btn-primary btn-sm  float-end mx-2 modal-button" data-href="{{url('personnel/create')}}" >Add
                Personnel</a>
        </div>
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Personnel Detail</h4>
        <!-- DataTable with Buttons -->

        <div class="card bg-white">
            <div class="table bg-white">
                <table class="table table-hover table-bordered bg-white" id="page_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Designation</th>
                            <th>Date</th>
                            <th>Head Count</th>
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

            var url = "/personnel";
            var columns = [{
                    data: 'serial_no',
                    name: 'serial_no',
                    searchable: false
                },
                {
                    data: 'designation',
                    name: 'designation',
                },

                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'number',
                    name: 'number',
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
