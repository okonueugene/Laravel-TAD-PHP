<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $employee->empname }}'s Attendance Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">{{ $employee->empname }}'s Attendance for {{ now()->format('F Y') }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    @if ($attendances->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Clock-in Times</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendances as $date => $records)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($date)->format('D, M d, Y') }}</td>
                            <td>
                                @foreach ($records as $record)
                                    <div>{{ \Carbon\Carbon::parse($record->datetime)->format('h:i A') }}</div>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">No attendance details found for this employee this month.</div>
    @endif
</div>

</body>
</html>
