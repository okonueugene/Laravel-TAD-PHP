<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Logs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Device Attendance Logs</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    @if ($paginatedRows->count())
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>PIN</th>
                        <th>Date & Time</th>
                        <th>Verified</th>
                        <th>Status</th>
                        <th>Work Code</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paginatedRows as $row)
                        <tr>
                            <td>{{ $row['PIN'] }}</td>
                            <td>{{ $row['DateTime'] }}</td>
                            <td>{{ $row['Verified'] }}</td>
                            <td>{{ $row['Status'] }}</td>
                            <td>{{ $row['WorkCode'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $paginatedRows->links('pagination::bootstrap-5') }}
        </div>
    @else
        <div class="alert alert-info">No attendance records found.</div>
    @endif
</div>

</body>
</html>
