<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 40px;
        }
        .appointment-form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-logout btn-sm">Logout</button>
            </form>
    <div class="appointment-form">
        <h1 class="mb-4">Book Appointment</h1>
        
      
        <form method="POST" action="{{ route('appointment.book') }}">
            @csrf

            <div class="form-group">
                <label for="patient_name">Your Name</label>
                <input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="Enter your name" required>
            </div>

            <div class="form-group">
                <label for="patient_email">Your Email address</label>
                <input type="email" class="form-control" id="patient_email" name="patient_email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="doctor_id">Doctor</label>
                <select class="form-control" id="doctor_id" name="doctor_id" required>
                    <option value="">Select Doctor</option>
                    
                    <option value="1">Dr. John Doe</option>
                    <option value="2">Dr. Jane Smith</option>
               
                </select>
            </div>

            <div class="form-group">
                <label for="appointment_date">Appointment Date</label>
                <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
            </div>

            <div class="form-group">
                <label for="appointment_time">Appointment Time</label>
                <input type="time" class="form-control" id="appointment_time" name="appointment_time" required>
            </div>

            <button type="submit" class="btn btn-primary">Book Appointment</button>
        </form>

        
        @if(session('success'))
        <div class="mt-4 alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
</body>
</html>
