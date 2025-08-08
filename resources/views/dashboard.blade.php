<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow p-5 w-100" style="max-width: 600px;">
            <h1 class="text-center mb-4">Dashboard</h1>

            <div class="mb-3">
                <strong>Name:</strong> {{ Auth::user()->name }}
            </div>
            <div class="mb-3">
                <strong>Email:</strong> {{ Auth::user()->email }}
            </div>

            <form method="POST" action="{{ url('/logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Logout</button>
            </form>

            <div class="d-grid gap-2 mt-4">
                <a href="{{ route('profiles.create') }}" class="btn btn-primary">Create New Profile</a>
                <a href="{{ route('profiles.index') }}" class="btn btn-secondary">View All Profiles</a>
            </div>


        </div>
    </div>

</body>
</html>
