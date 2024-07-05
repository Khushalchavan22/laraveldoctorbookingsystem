<!DOCTYPE html>
<html>
<head>
    <title>All Appointments</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .btn-postpone {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-postpone:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .btn-reject {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-reject:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .table thead th {
            background-color: #f8f9fa;
            color: #333;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .btn-logout {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .btn-logout:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h2>All Appointments</h2>
    
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-logout btn-sm">Logout</button>
            </form>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <form method="GET" action="{{ route('appointments.by-date', ['date' => $searchDate ?? '']) }}" class="form-inline mt-4 mb-4">
            <div class="form-group">
                <label for="searchDate" class="sr-only">Search by Date</label>
                <input type="date" class="form-control" id="searchDate" name="date" placeholder="Search by Date" value="{{ $searchDate ?? '' }}">
            </div>
            <button type="submit" class="btn btn-primary ml-2">Search</button>
        </form>

        <button class="btn btn-secondary mb-4" onclick="goBack()">Back</button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Patient Email</th>
                    <th>Doctor ID</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->patient_name }}</td>
                        <td>{{ $appointment->patient_email }}</td>
                        <td>{{ $appointment->doctor_id }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>{{ $appointment->appointment_time }}</td>
                        <td>
                       
                            <button type="button" class="btn btn-postpone btn-sm" data-toggle="modal" data-target="#postponeModal{{ $appointment->id }}">Postpone</button>

                            <form action="{{ route('appointments.reject', $appointment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-reject btn-sm">Reject</button>
                            </form>

                            <div class="modal fade" id="postponeModal{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="postponeModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="postponeModalLabel">Postpone Appointment</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="newDate{{ $appointment->id }}">New Appointment Date</label>
                                                    <input type="date" class="form-control" id="newDate{{ $appointment->id }}" name="appointment_date" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="newTime{{ $appointment->id }}">New Appointment Time</label>
                                                    <input type="time" class="form-control" id="newTime{{ $appointment->id }}" name="appointment_time" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
