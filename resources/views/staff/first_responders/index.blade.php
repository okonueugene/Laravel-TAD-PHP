@extends('layout.staff.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="add-button ">
            <a href="#" class="btn btn-primary btn-sm float-end modal-button" data-href="{{url('/app/first-responders/create')}}">
                Add First Responder
            </a>
        </div>
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>First Responder</h4>

        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered" id="page_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
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

            var url = "/app/first-responders";
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
