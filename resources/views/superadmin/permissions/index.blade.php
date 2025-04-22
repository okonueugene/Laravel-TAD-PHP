@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-semibold mb-4 mx-auto text-center">permissions List</h4>
        <div class="button btn-success float-end">
            <a href="javascript:void(0)" class="btn btn-primary btn-sm">Add permission</a>
        </div>
        <p class="mb-4 mx-auto text-center">
            A permission provided access to predefined menus and features so that depending on <br> assigned permission
            an
            administrator can have access to what user needs.
        </p>
        <!-- permission cards -->

        <div class="col-xl">
            <div class="card border-secondary mb-4 h-100 ">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-body">
                        <table class="table table-hover table-bordered" id="page_table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Guard Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {

            var url = "/permissions";
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
                    data: 'guard_name',
                    name: 'guard_name',
                }
            ];

            var filters = {};

            page_table = __initializePageTable(url, columns, filters);

        });
    </script>
@endsection
