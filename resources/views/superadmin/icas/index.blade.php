@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (auth()->user()->can('add_icas'))
        <div class="add-button mt-4">
            <a href="{{ route('icas.create')}}" class="btn btn-primary btn-sm float-end modal-button">Add ICA</a>
        </div>
    @endif
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Immediate Collective Actions (ICA's)</h4>
        {{-- search  --}}

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered" id="page_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Observation</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection


@section('javascript')
    <script>
        $(document).ready(function() {

            var url = "/icas";
            var columns = [{
                    data: 'serial_no',
                    name: 'serial_no',
                    searchable: false
                },
                {
                    data: 'observation',
                    name: 'observation',
                    searchable: false
                },

                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'status',
                    name: 'status'
                },

                {
                    data: 'action_owner',
                    name: 'action_owner'
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
