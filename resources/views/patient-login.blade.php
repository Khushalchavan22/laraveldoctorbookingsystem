<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 40px;
        }
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-login {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
        .btn-dr-login {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }
        .btn-dr-login:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="mb-4">Patient Login</h1>

   
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
   
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-primary btn-login">Login</button>
        </form>


        <form method="GET" action="{{ route('Doctor-login') }}">
            <button type="submit" class="btn btn-success btn-dr-login">Doctor Login</button>
        </form>

        <div class="mt-3 text-center">
            <p>Don't have an account? <a href="{{ route('patient-register') }}">Register here</a></p>
        </div>
    </div>

 
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
        
                var errorDiv = document.createElement('div');
                errorDiv.className = 'alert alert-danger';
                errorDiv.textContent = '{{ session('error') }}';
                document.body.insertBefore(errorDiv, document.body.firstChild);
            });
        </script>
    @endif
</body>
</html>
