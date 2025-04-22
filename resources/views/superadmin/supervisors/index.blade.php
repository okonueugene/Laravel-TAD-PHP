@extends('layout.app')

@section('content')
    <div class="container-lg flex-grow-1 container-p-y">
        @if (auth()->user()->can('add_supervisor'))
            <div class="add-button">
                <a href="#" class="btn btn-primary btn-sm float-end modal-button" data-href="{{url('supervisor/create')}}">Add
                    Supervisor</a>
            </div>
        @endif
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Supervisor’s Details</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered" id="page_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Designation</th>
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

            var url = "/supervisor";
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
                    data: 'designation',
                    name: 'designation',
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
