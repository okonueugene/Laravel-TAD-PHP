@extends('layout.staff.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>{{ $data['title'] }}</h4>
        <div class="row">
            <!-- User Profile card -->
            <div class="mb-4 col-lg-5 col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Welcome {{ ucwords($data['user']->name) }} 🎉</h5>
                                <br>
                                <p class="mb-2">Site : {{ auth()->user()->site->name }}</p>
                                <p id="date-time"></p>
                                <a href="javascript:;" class="btn btn-primary">View Profile</a>
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('assets/img/illustrations/card-advance-sale.png') }}" height="205"
                                    alt="view sales">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Profile card -->

            <!-- Site Analytics -->
            <div class="col-lg-7 mb-4">
                <div class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg"
                    id="swiper-with-pagination-cards">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="text-white mb-0 mt-2">Site Analytics</h5>
                                    <small>Total number personel in site</small>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                                        <h6 class="text-white mt-0 mt-md-3 mb-3">Summary</h6>
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <p class="mb-0 me-2">People </p>
                                                        <p class="mb-0 fw-semibold  website-analytics-text-bg">
                                                            {{ is_numeric($data['personells']) ? $data['personells'] : 0 }}
                                                        </p>

                                                    </li>
                                                    <li class="d-flex align-items-center mb-2">
                                                        <p class="mb-0 me-2">First Aiders</p>
                                                        <p class="mb-0 fw-semibold website-analytics-text-bg">
                                                            {{ is_numeric($data['first_aider']) ? $data['first_aider'] : 0 }}
                                                        </p>

                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-6">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <p class="mb-0 me-2">Fire Marshalls</p>
                                                        <p class="mb-0 fw-semibold website-analytics-text-bg">
                                                            {{ is_numeric($data['fire_marshal']) ? $data['fire_marshal'] : 0 }}

                                                    </li>
                                                    <li class="d-flex align-items-center mb-2">
                                                        <p class="mb-0 me-2">Safety Executives</p>
                                                        <p class="mb-0 fw-semibold website-analytics-text-bg">
                                                            {{ is_numeric($data['executives']) ? $data['executives'] : 0 }}
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                                        <img src="{{ asset('assets/img/illustrations/card-website-analytics-1.png') }}"
                                            alt="Website Analytics" width="170" class="card-website-analytics-img">
                                    </div>
                                </div>
                            </div>
                        </div>
       
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <!--/ Site Analytics -->

            <!-- Assigned Personel -->
            <div class="col-xl-12 mb-4 col-lg-7 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0">Assigned Personel</h5>
                            <small class="text-muted">Updated 1 month ago</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-md-4 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-primary me-3 p-2"><i
                                            class="ti ti-user ti-sm"></i></div>
                                    <div class="card-info">
                                        <h5 class="mb-0">Supervisor </h5>
                                        <small>{{ $data['supervisor'] }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-info me-3 p-2"><i class="ti ti-user ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">Fire Marshall </h5>
                                        <small>{{ $data['fire_marshal'] }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-danger me-3 p-2"><i
                                            class="ti ti-user ti-sm"></i></div>
                                    <div class="card-info">
                                        <h5 class="mb-0">First Aider</h5>
                                        <small>{{ $data['first_aider'] }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Assigned Personel -->

            <!-- Tasks analytics -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
                        <div class="card-title mb-0">
                            <h5 class="mb-2">Tasks</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive">
                            <table id="tasks_dashboard_table" class="table table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th class="w-px-200">Task Title</th>
                                        <th class="w-px-200">Assigned to</th>
                                        <th class="w-px-200">Status</th>
                                        <th class="w-px-200">Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Tasks analytics -->
            <!-- Safety Observation Record -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Safety Observation Record</h5>
                            <small class="text-muted">Last 7 Days</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="supportTrackerMenu" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="supportTrackerMenu">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-12 col-lg-4">
                                <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-1">
                                    <h1 class="mb-0">{{ $data['total_sors'] }}</h1>
                                    <p class="mb-0">Total SOR's</p>
                                </div>
                                <ul class="p-0 m-0">
                                    <li class="d-flex gap-3 align-items-center mb-lg-3 pt-2 pb-1">
                                        <div class="badge rounded bg-label-primary p-1"><i class="ti ti-ticket ti-sm"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-nowrap">Reported Hazards</h6>
                                            <small class="text-muted">{{ $data['total_hazards'] }}</small>
                                        </div>
                                    </li>
                                    <li class="d-flex gap-3 align-items-center mb-lg-3 pb-1">
                                        <div class="badge rounded bg-label-info p-1"><i
                                                class="ti ti-circle-check ti-sm"></i></div>
                                        <div>
                                            <h6 class="mb-0 text-nowrap">Suggested Improvements</h6>
                                            <small class="text-muted">{{ $data['total_improvements'] }}</small>
                                        </div>
                                    </li>
                                    <li class="d-flex gap-3 align-items-center  mb-lg-3  pb-1">
                                        <div class="badge rounded bg-label-warning p-1"><i class="ti ti-clock ti-sm"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-nowrap">Good Practices</h6>
                                            <small class="text-muted">{{ $data['total_goodpractises'] }}</small>
                                        </div>
                                    </li>
                                    <li class="d-flex gap-3 align-items-center pb-1">
                                        <div class="badge rounded bg-label-warning p-1"><i class="ti ti-clock ti-sm"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-nowrap">Bad Practices</h6>
                                            <small class="text-muted">{{ $data['total_badpractises'] }}</small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-8 col-md-12 col-lg-8">
                                <div id="sorAnalytics"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Safety Observation Record -->

            <!-- Environmental Issues -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2"> Environmental Issues </h5>
                            <small class="text-muted"> Environmental Issues Summary</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="salesByCountry" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountry">
                                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($data['environment']) > 0)
                            <ul class="list-group p-0 m-0">
                                @foreach ($data['environment'] as $env)
                                    <a href="{{ url('environment') }}">
                                        <li class="list-group-item d-flex align-items-center mb-4">
                                            <div
                                                class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                <div class="me-2">
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="mb-0 me-1 text-primary">{{ $env->type }}</h6>
                                                    </div>
                                                </div>
                                                <div class="user-progress">
                                                    <p class="text-success fw-semibold mb-0">
                                                        {{ \Carbon\Carbon::parse($env->created_at)->diffForHumans() }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        @else
                            <div class="alert alert-warning" role="alert">
                                No environmental issues available
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!--/  Environmental Issues  -->

            <!-- Permits Applicable -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Permits Applicable</h5>
                            <small class="text-muted">Permits Applicable summary</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="sourceVisits" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        @if ($data['permits']->count() > 0)
                            @foreach ($data['permits'] as $permit)
                                <ul class="list-unstyled mb-0 flex-grow-1">
                                    <li class="d-flex align-items-center mb-4">
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <div class="d-flex align-items-center">
                                                    <h6 class="mb-0 me-1">{{ $permit->type }}</h6>
                                                </div>
                                            </div>
                                            <div class="user-progress">
                                                <p class="text-success fw-semibold mb-0">
                                                    {{ \Carbon\Carbon::parse($permit->created_at)->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        @else
                            <div class="alert alert-warning flex-grow-1 d-flex align-items-center justify-content-center"
                                role="alert">
                                No permits available
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!--/ Permits Applicable -->


            <!-- Activities tab-->
            <div class="col-md-6 col-xl-4 col-xl-4 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between pb-2 mb-1">
                        <div class="card-title mb-1">
                            <h5 class="m-0 me-2">Activities tab</h5>
                            <small class="text-muted">Activities tab by categories</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="salesByCountryTabs" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="nav-align-top">
                            <div class="tab-content pb-0">
                                <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">
                                    @foreach ($data['activities'] as $index => $activity)
                                        @if ($index > 0)
                                            <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
                                        @endif
                                        <ul class="timeline timeline-advance timeline-advance mb-2 pb-1">
                                            <li class="timeline-item ps-4 border-left-dashed">
                                                @if ($activity->event == 'created' || $activity->event == 'updated')
                                                    <span class="timeline-indicator timeline-indicator-success">
                                                        <i class="ti ti-circle-check"></i>
                                                    </span>
                                                @else
                                                    <span class="timeline-indicator timeline-indicator-warning">
                                                        <i class="ti ti-alert"></i>
                                                    </span>
                                                @endif
                                                <div class="timeline-event ps-0 pb-0">
                                                    <div class="timeline-header">
                                                        <small
                                                            class="text-success text-uppercase fw-semibold">{{ $activity->event }}
                                                        </small>
                                                    </div>
                                                    <h6 class="mb-0">{{ $activity->causer->name }}</h6>
                                                    <p class="text-muted mb-0 text-nowrap">{{ $activity->description }}
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Activities tab -->

            <!-- Incidents table -->
            <div class="col-12 col-xl-6 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                <div class="card h-100">
                    <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
                        <div class="card-title" style="margin-top: 10px;">
                            <h5 class="mb-2">Incidents</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive">
                            <table class="table table-striped table-hover table-sm" id="incidents_dashboard_table">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Reported by</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Projects table -->

            <!-- Icas table -->
            <div class="col-12 col-xl-6 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                <div class="card h-100">
                    <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
                        <div class="card-title mb-0">
                            <h5 class="mb-2">ICA's</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive">
                            <table class="table table-striped table-hover table-sm" id="icas_dashboard_table">
                                <thead>
                                    <tr>
                                        <th>Action Owner</th>
                                        <th>Add by</th>
                                        <th>Status</th>
                                        <th class="w-px-200">
                                            Created
                                        </th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/ Projects table -->
            </div>
            <!--/ Content -->
        </div>
        <!--/ Content -->
    @endsection
    <script>
        window.addEventListener("load", () => {
            console.log("loaded");
            clock();

            function clock() {
                let value = new Date();
                let date = value.toLocaleString("en-us", {
                    weekday: "short",
                    month: "short",
                    day: "2-digit",
                });

                let time = value.toLocaleString("en-US", {
                    hour: "numeric",
                    minute: "numeric",
                    second: "numeric",
                    hour12: true,

                });

                document.getElementById("date-time").innerHTML = `Time: ${time}`;

                setTimeout(clock, 1000);

            }
            $(document).ready(function() {
                //columns for tasks table
                var tasks_columns = [{
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'assigned_to',
                        name: 'assigned_to'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }
                ];

                //columns for incidents table
                var incidents_columns = [

                    {
                        data: 'incident_type',
                        name: 'incident_type'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'incident_status',
                        name: 'incident_status'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }
                ];

                //columns for icas table
                var icas_columns = [{
                        data: 'action_owner',
                        name: 'action_owner'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }
                ];

                $('#tasks_dashboard_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('dash-tasks') }}"
                    },
                    columns: tasks_columns,
                    pageLength: 4, // Set the number of rows per page to 4
                    createdRow: function(row, data, dataIndex) {}
                });
                // Incidents table
                $('#incidents_dashboard_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('dash-incidents') }}"
                    },
                    columns: incidents_columns,
                    pageLength: 4, // Set the number of rows per page to 4
                    createdRow: function(row, data, dataIndex) {}

                });

                // Icas table
                $('#icas_dashboard_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('dash-icas') }}"
                    },
                    columns: icas_columns,
                    pageLength: 4, // Set the number of rows per page to 4
                    createdRow: function(row, data, dataIndex) {}

                });
            });
            //use apex charts to draw sorAnalytics total vs completed
            var closed_sors = <?php echo $data['total_sors_percentage']; ?>;
            console.log(closed_sors);
            const sorAnalytics = document.querySelector('#sorAnalytics'),
                sorAnalyticsOptions = {
                    series: [closed_sors],
                    labels: ['Closed SORs'],
                    chart: {
                        height: 360,
                        type: 'radialBar'
                    },
                    plotOptions: {
                        radialBar: {
                            offsetY: 10,
                            startAngle: -140,
                            endAngle: 130,
                            hollow: {
                                size: '65%'
                            },
                            track: {
                                background: '#e7e7e7',
                                strokeWidth: '100%'
                            },
                            dataLabels: {
                                name: {
                                    offsetY: -20,
                                    color: '#111',
                                    fontSize: '13px',
                                    fontWeight: '400',
                                    fontFamily: 'Public Sans'
                                },
                                value: {
                                    offsetY: 10,
                                    color: '#111',
                                    fontSize: '38px',
                                    fontWeight: '600',
                                    fontFamily: 'Public Sans'
                                }
                            }
                        }
                    },
                    colors: [config.colors.primary],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            shadeIntensity: 0.5,
                            gradientToColors: [config.colors.primary],
                            inverseColors: true,
                            opacityFrom: 1,
                            opacityTo: 0.6,
                            stops: [30, 70, 100]
                        }
                    },
                    stroke: {
                        dashArray: 10
                    },
                    grid: {
                        padding: {
                            top: -20,
                            bottom: 5
                        }
                    },
                    states: {
                        hover: {
                            filter: {
                                type: 'none'
                            }
                        },
                        active: {
                            filter: {
                                type: 'none'
                            }
                        }
                    },
                    responsive: [{
                            breakpoint: 1025,
                            options: {
                                chart: {
                                    height: 330
                                }
                            }
                        },
                        {
                            breakpoint: 769,
                            options: {
                                chart: {
                                    height: 280
                                }
                            }
                        }
                    ]
                };
            if (typeof sorAnalytics !== undefined && sorAnalytics !== null) {
                var sorAnalyticsChart = new ApexCharts(sorAnalytics, sorAnalyticsOptions);
                sorAnalyticsChart.render();
            }

        });
    </script>
