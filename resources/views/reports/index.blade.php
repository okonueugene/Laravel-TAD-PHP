<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Report Template</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 14px;
        }

        .header {
            padding: 20px;
            border-bottom: 1px solid #00b3ff;
            text-align: center;
        }

        #sor {
            margin-top: 20px;
        }

        .sor-chart {
            width: 100%;
            height: 250px;
            margin: 12px 12px 12px 12px;
        }

        .small-chart {
            width: 80%;
            height: 190px;
            margin: 12px 12px 12px 12px;
        }

        .row {
            display: flex;
        }

        .column {
            flex: 50%;
        }


        #cover {
            background-color: #00b3ff;
            padding: 20px;
            text-align: center;
        }

        #report-page {
            padding: 20px;
            margin-top: 20px;
            border-top: 3px solid #00b3ff;
            page-break-inside: avoid;
            page-break-after: auto;
        }

        .column {
            float: left;
            width: 50%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        h1 {
            font-size: 2em;
            margin: 0;
        }

        h2 {
            font-size: 1.5em;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: avoid;
        }

        tr,
        th,
        td {
            border: 1px solid #00b3ff;
            padding: 8px;
            text-align: left;
            page-break-inside: avoid;
            page-break-after: auto;
        }

        th {
            background-color: #00b3ff;
        }

        #permits {
            margin-top: 20px;
        }

        #environment {
            margin-top: 20px;
        }

        #tasks {
            margin-top: 20px;
        }

        #incidents {
            margin-top: 20px;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: rgb(246, 246, 246);
            color: white;
            text-align: center;
        }

        .footer .office {
            color: rgb(82, 158, 200);
            margin-top: 3px;
        }

        /**
            * Set the margins of the PDF to 0
            * so the background image will cover the entire page.
            **/
        @page {
            margin: 0cm 0cm;
        }

        /**
            * Define the real margins of the content of your PDF
            * Here you will fix the margins of the header and footer
            * Of your background image.
            **/
        body {
            margin-top: 0.3cm;
            margin-bottom: 1cm;
            margin-left: 1cm;
            margin-right: 1cm;
        }

        /**
            * Define the width, height, margins and position of the watermark.
            **/
        #watermark {
            position: fixed;
            top: 40%;
            left: 10%;
            /** The width and height may change
                    according to the dimensions of your letterhead
                **/
            width: 80%;
            height: 60%;

            /** Your watermark should be behind every content**/
            z-index: -10000;
        }

        #cover-image {
            position: fixed;
            top: 25%;
            left: 10%;
            width: 80%;
            height: 60%;
        }
    </style>
</head>

<body>
    <!-- Watermark -->
    {{-- <div id="watermark">
        <img style="opacity: 0.2" src="https://www.opticom.co.ke/wp-content/uploads/2023/03/cropped-Opticom-Logo-18.png"
            alt="Watermark" width="100%" />
    </div> --}}

    <!-- Cover Page -->
    <div class="cover-page">
        <h1 style="text-align: center; margin-top: 200px">
            Weekly QHSE Report For {{ auth()->user()->site->name }}
        </h1>
        <p style="text-align: center">Date: {{ date('m/d/Y') }}</p>
        {{-- @if ($data['site']->media && count($data['site']->media) > 0)
            <img src="{{ public_path('storage/' . parse_image_url($data['site']->media[0]->original_url)) }}"
                alt="{{ $data['site']->media[0]->file_name }}" id="cover-image" style="width: 100%; height: 100%" />
        @endif --}}
    </div>

    <div style="page-break-before: always"></div>

    <div class="header">
        <table class="table">
            <tr>
                <td width="33.3%" align="center">
                    <img style="display: block" 
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/OptimumGrouplogo.png'))) }}"
                        width="100px"
                        height="100px"
                        alt="OptiSafe Logo" />
                </td>
                <td width="33.3%" align="center">
                    <div><strong class="font-weight-semibold">Site Name : {{ $data['site']->name }}</strong></div>
                    <div><strong class="font-weight-semibold">Location : {{ $data['site']->location }}</strong></div>
                    <div><strong class="font-weight-semibold">Project Name : {{ $data['project_name'] }}</strong></div>
                </td>
            </tr>
        </table>

        <hr style="background-color: #00b3ff; height: 2px; margin: 0; padding: 0" />

        <table class="table">
            <tr>
                <td width="20%" align="Left">
                    <h6 class="text-big text-large font-weight-bold mb-3">
                        <span style="text-transform: uppercase">Report No #PTR-</span>{{ date('Y') }}
                    </h6>
                </td>
                <td width="60%" align="center">
                    <strong class="font-weight-bold">
                        <h2>Weekly Site Report</h2>
                    </strong>
                </td>
                <td width="20%" align="right">
                    <div>
                        Date:
                        <strong class="font-weight-semibold">{{ date('m/d/Y') }}</strong>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <br />
    <!-- Personnel Section -->
    <div id="report-page">
        <h2>Personnel Information</h2>
        <p><strong>Personnel Present:</strong> {{ $data['personells'] }}</p>
        <p><strong>Fire Marshal:</strong> {{ $data['fire_marshal'] }}</p>
        <p><strong>First Aider:</strong> {{ $data['first_aider'] }}</p>
        <p><strong>Supervisor:</strong> {{ $data['supervisor'] }}</p>
        <p><strong>Safety Supervisor:</strong> {{ $data['safety_supervisor'] }}</p>
        <p><strong>Executives:</strong> {{ $data['executives'] }}</p>
    </div>
    @if ($data['tasks'] && count($data['tasks']) > 0)
        <!-- Tasks Section -->
        <div id="report-page">
            <h2>Tasks Being Worked On</h2>
            <table id="tasks">
                <tr>
                    <th>Title</th>
                    <th>From</th>
                    <th>Due Date</th>
                    <th>Assigned To</th>
                    <th>Status</th>
                    <th>Images</th>
                </tr>
                <tbody>
                    @foreach ($data['tasks'] as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->from }}</td>
                            <td>{{ $task->to }}</td>
                            <td>{{ $task->assignee->name }}</td>
                            <td>{{ $task->status }}</td>
                            @if ($task->media && count($task->media) > 0)
                                <td class="text-center">
                                    @foreach ($task->media as $media)
                                        <img src="{{ public_path('storage/' . parse_image_url($media->original_url)) }}"
                                            alt="{{ $media->file_name }}" class="card-img-top"
                                            style="width: 100px; height: 100px" />
                                    @endforeach
                                </td>
                            @else
                                <td>No Images Present</td>
                            @endif
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    @if ($data['permits'] && count($data['permits']) > 0)
        <!-- Permits Section -->
        <div id="report-page">
            <h2>Permits In Use</h2>
            <table id="permits">
                <tr>
                    <th>Permit Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Added At</th>
                </tr>
                <tbody>
                    @foreach ($data['permits'] as $permit)
                        <tr>
                            <td>{{ $permit->type }}</td>
                            <td>{{ $permit->start_date }}</td>
                            <td>{{ $permit->end_date }}</td>
                            <td>{{ $permit->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <!-- SORs Section -->
    @if ($data['sors'] && count($data['sors']) > 0)
        <div id="report-page">
            <div class="row">
                <div class="column">
                    <h2>Safety Observation Reports (SORs)</h2>
                    <p><strong>Total SORs:</strong> {{ $data['total_sors'] }}</p>
                    <p>
                        <strong>Bad Practices:</strong> {{ $data['total_badpractises'] }}
                    </p>
                    <p>
                        <strong>Good Practices:</strong> {{ $data['total_goodpractises'] }}
                    </p>
                    <p><strong>Hazards:</strong> {{ $data['total_hazards'] }}</p>
                    <p>
                        <strong>Improvements:</strong> {{ $data['total_improvements'] }}
                    </p>
                    <p>
                        <strong>SORs Completed:</strong> {{ $data['total_sors_complete'] }}
                    </p>
                    <p>
                        <strong>Completion Percentage:</strong> {{ $data['total_sors_percentage'] }}%
                    </p>
                </div>
                <div class="column">
                    <img class="sor-chart"
                        src="https://quickchart.io/chart?chart={
type: 'doughnut',
data: {
labels: ['Bad Practices', 'Good Practices', 'Hazards', 'Improvements'],
datasets: [{
  label: 'SORs',
  data: [{!! $data['total_badpractises'] !!}, {!! $data['total_goodpractises'] !!}, {!! $data['total_hazards'] !!}, {!! $data['total_improvements'] !!}],
}]
}
}&width=500&height=300&devicePixelRatio=1.0&format=png&version=2.9.3" />
                </div>
            </div>
        </div>
        {{-- <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/2/Blossoms.jpg'))) }}"> --}}
        <table id="sors">
            <tr>
                <th>Type</th>
                <th>Action Owner</th>
                <th>Contractor/Client</th>
                <th>Observation</th>
                <th>Status</th>
                <th>Images</th>
            </tr>
            <tbody>
                @foreach ($data['sors'] as $sor)
                    <tr>
                        <td>{{ $sor->type->name }}</td>
                        <td>{{ $sor->action_owner }}</td>
                        <td>{{ $sor->client }}</td>
                        <td>{{ $sor->observation }}</td>
                        <td style="{{ $sor->status == 'closed' ? 'color: green' : 'color: red' }}">
                            {{ $sor->status == 'closed' ? 'Closed' : 'Pending' }}
                        </td>
                        <td class="text-center">
                            @if ($sor->media && count($sor->media) > 0)
                                @foreach ($sor->media as $media)
                                    <img src="{{ public_path('storage/' . parse_image_url($media->original_url)) }}"
                                        alt="{{ $media->file_name }}" class="card-img-top"
                                        style="width: 100px; height: 100px" />
                                @endforeach
                            @else
                                <span>No Images Present</span>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @endif
    <!-- Trainings Section -->
    @if ($data['trainings'] && count($data['trainings']) > 0)
        <div id="report-page">
            <div class="row">
                <div class="column">
                    <h2>Awareness Trainings</h2>
                </div>
            </div>
            <table id="trainings">
                <tr>
                    <th>Topic</th>
                    <th>No of Attendees</th>
                    <th>Trainer</th>
                    <th>Comment</th>
                    <th>Date</th>
                </tr>
                <tbody>
                    @foreach ($data['trainings'] as $training)
                        <tr>
                            <td>{{ $training->topic }}</td>
                            <td>{{ $training->attendees }}</td>
                            <td>{{ $training->user->name }}</td>
                            <td>{{ $training->comments }}</td>
                            <td>{{ $training->date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    @if ($data['incidents'] && count($data['incidents']) > 0)
        <!-- Incidents Section -->
        <div id="report-page">
            <div class="row">
                <div class="column">
                    <h2>Incidents</h2>
                    <p><strong>Near Misses:</strong> {{ $data['total_near_misses'] }}</p>
                    <p>
                        <strong>First Aid Cases:</strong> {{ $data['total_first_aid_cases'] }}
                    </p>
                    <p>
                        <strong>Medical Cases:</strong> {{ $data['total_medical_cases'] }}
                    </p>
                    <p>
                        <strong>Lost Time Cases:</strong> {{ $data['total_lost_time_cases'] }}
                    </p>
                    <p>
                        <strong>SIF:</strong> {{ $data['total_sif'] }}
                    </p>
                    <p><strong>Total Incidents:</strong> {{ $data['total_incidents'] }}</p>
                    <p>
                        <strong>Incidents Pending:</strong> {{ $data['total_incidents_pending'] }}
                    </p>
                    <p>
                        <strong>Incidents Closed:</strong> {{ $data['total_incidents_closed'] }}
                    </p>
                    <p>
                        <strong>Closing Percentage:</strong> {{ $data['total_incidents_percentage'] }}%
                    </p>
                </div>
                <div class="column">
                    <img class="sor-chart"
                        src="https://quickchart.io/chart?chart={
type: 'doughnut',
data: {
labels: ['Near Misses', 'First Aid Cases', 'Medical Cases', 'Lost Time Cases', 'SIF'],
datasets: [{
  label: 'Incidents',
  data: [{!! $data['total_near_misses'] !!}, {!! $data['total_first_aid_cases'] !!}, {!! $data['total_medical_cases'] !!}, {!! $data['total_lost_time_cases'] !!}, {!! $data['total_sif'] !!}],
}]
}

}&width=500&height=300&devicePixelRatio=1.0&format=png&version=2.9.3" />
                </div>
            </div>
            <table id="incidents">
                <tr>
                    <th>Type</th>
                    <th>Reporter</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Images</th>
                    <th>Created At</th>
                </tr>
                <tbody>
                    @foreach ($data['incidents'] as $incident)
                        <tr>
                            <td>{{ ucwords(str_replace('_', ' ', $incident->incidentType->incident_type)) }}</td>
                            <td>{{ $incident->user->name }}</td>
                            <td>{{ $incident->incident_description }}</td>
                            <td style="{{ $incident->incident_status == 'yes' ? 'color: green' : 'color: red' }}">
                                {{ $incident->incident_status == 'yes' ? 'Closed' : 'Pending' }}
                            </td>
                            <td class="text-center">
                                @if ($incident->media && count($incident->media) > 0)
                                    @foreach ($incident->media as $media)
                                        <img src="{{ public_path('storage/' . parse_image_url($media->original_url)) }}"
                                            alt="{{ $media->file_name }}" class="card-img-top"
                                            style="width: 100px; height: 100px" />
                                    @endforeach
                                @else
                                    <span>No Images Present</span>
                                @endif
                            </td>
                            <td>{{ $incident->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if ($data['icas'] && count($data['icas']) > 0)
        <!-- ICAs Section -->
        <div id="report-page">
            <h2>Immediate Corrective Actions (ICAs)</h2>
            <div class="row">
                <div class="column">
                    <p><strong>Total ICAs:</strong> {{ $data['total_icas'] }}</p>
                    <p><strong>ICAs Pending:</strong> {{ $data['total_icas_pending'] }}</p>
                    <p><strong>ICAs Closed:</strong> {{ $data['total_icas_closed'] }}</p>
                    <p><strong>Closing Percentage:</strong> {{ $data['total_icas_percentage'] }}%</p>
                </div>
                <div class="column">
                    <img class="small-chart"
                        src="https://quickchart.io/chart?chart={
type: 'doughnut',
data: {
labels: ['Pending', 'Closed'],
datasets: [{
  label: 'ICAs',
  data: [{!! $data['total_icas_pending'] !!}, {!! $data['total_icas_closed'] !!}],
}]
}

}&width=500&height=300&devicePixelRatio=1.0&format=png&version=2.9.3" />
                </div>
            </div>
            <table id="icas">
                <tr>
                    <th>Reporter</th>
                    <th>Observation</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Date</th>
                </tr>
                <tbody>
                    @foreach ($data['icas'] as $ica)
                        <tr>
                            <td>{{ $ica->user->name }}</td>
                            <td>{{ $ica->observation }}</td>
                            <td class="text-center">
                                @if ($ica->media && count($ica->media) > 0)
                                    @foreach ($ica->media as $media)
                                        <img src="{{ public_path('storage/' . parse_image_url($media->original_url)) }}"
                                            alt="{{ $media->file_name }}" class="card-img-top"
                                            style="width: 100px; height: 100px" />
                                    @endforeach
                                @else
                                    <span>No Images Present</span>
                                @endif
                            </td>
                            <td style="{{ $ica->status == 'closed' ? 'color: green' : 'color: red' }}">
                                {{ $ica->status == 'closed' ? 'Closed' : 'Pending' }}
                            </td>
                            <td>{{ $ica->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    @if ($data['environment'] && count($data['environment']) > 0)
        <!-- Environment Section -->
        <div id="report-page">
            <h2>Environment Reports</h2>
            <table id="environment">
                <tr>
                    <th>Type</th>
                    <th>Comments</th>
                    <th>Project Manager</th>
                    <th>Auditor</th>
                    <th>Action Owner</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
                <tbody>
                    @foreach ($data['environment'] as $report)
                        <tr>
                            <td>{{ $report->type }}</td>
                            <td>{{ $report->comments }}</td>
                            <td>{{ $report->project_manager }}</td>
                            <td>{{ $report->auditor }}</td>
                            <td>{{ $report->action_owner }}</td>
                            <td style="{{ $report->status == 'closed' ? 'color: green' : 'color: red' }}">
                                {{ $report->status == 'closed' ? 'Closed' : 'Pending' }}
                            </td>
                            <td>{{ $report->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <div class="footer">
        <div class="office">
            Head office: I&M House, 5th Floor, 2nd Ngong Avenue,
            Upper Hill, Nairobi, Kenya.
        </div>
        <div style="color: black">
            For any enquires please contact info@opticom.co.ke or get in touch with us on 020 7909011 / 020 2686857
        </div>
        <br />
    </div>
</body>

</html>
