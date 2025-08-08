<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Profiles List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-5">
     <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>All Profiles</h2>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn btn-danger">Logout</button>
    </form>
  </div>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('profiles.create') }}" class="btn btn-primary mb-3">Create New Profile</a>

    @if($profiles->isEmpty())
        <p>No profiles found.</p>
    @else
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Hobbies</th>
                    <th>Date of Birth</th>
                    <th>Profile Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profiles as $profile)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $profile->full_name }}</td>
                        <td>{{ $profile->email }}</td>
                        <td>{{ $profile->phone }}</td>
                        <td>{{ $profile->address }}</td>
                        <td>{{ $profile->hobbies }}</td>
                        <td>{{ $profile->date_of_birth->format('Y-m-d') }}</td>
                        <td>
                          @if($profile->profile_image)
                            <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="Profile Image" style="width:100px; height:100px; object-fit:cover; border-radius:5px;">
                          @else
                            N/A
                          @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
