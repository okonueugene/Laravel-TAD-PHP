@extends('layout.staff.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (auth()->user()->can('add_tasks'))
            <div class="add-button ">
                <a href="javascript:void(0)" class="btn btn-primary float-end modal-button" data-href="{{ url('/app/user-tasks/create') }}">
                    Add Task
                </a> 
            </div>
        @endif
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Task Manager</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered" width="100%" id="page_table">
                    <thead>
                        <tr>

                            <th>Id</th>
                            <th>Task Title</th>
                            <th>Assigned To</th>
                            <th>Assignee</th>
                            <th>Start Date</th>
                            <th>Due Date</th>
                            <th>Task Status</th>
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



@section('javascript')
    <script>
        // Initialize the DataTable
        $(document).ready(function() {
            var url = "{{ url('/app/user-tasks') }}";

            var columns = [{
                    data: 'serial_no',
                    name: 'serial_no',
                    searchable: false
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'user',
                    name: 'user'
                },
                {
                    data: 'assignee',
                    name: 'assignee'
                },
                {
                    data: 'from',
                    name: 'from'
                },
                {
                    data: 'to',
                    name: 'to'
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

           var filters = {};

           page_table = __initializePageTable(url, columns, filters);
        });
    </script>
@endsection
