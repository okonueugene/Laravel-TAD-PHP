<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monthly Attendance Summary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Monthly Attendance Summary</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    @if ($employees->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>PIN</th>
                        <th>Name</th>
                        <th>Occupation</th>
                        <th>Team</th>
                        <th>Days Present</th>
                        <th>Total Work Days</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee['pin'] }}</td>
                            <td>{{ $employee['name'] }}</td>
                            <td>{{ $employee['occupation'] }}</td>
                            <td>{{ $employee['team'] }}</td>
                            <td>{{ $employee['days_present'] }}</td>
                            <td>{{ $employee['work_days'] }}</td>
                            <td>
                                <a href="{{ url('admin/employee/' . $employee['pin'] . '/attendance') }}" class="btn btn-sm btn-primary">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $employees->links('pagination::bootstrap-5') }}
        </div>
    @else
        <div class="alert alert-info">No employee attendance records found for this month.</div>
    @endif
</div>

</body>
</html>
