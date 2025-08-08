<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><b>Create Profile</b></h2>
    <a href="{{ route('profiles.index') }}" class="btn btn-secondary">← Back to Profiles</a>
  </div>

  <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 shadow rounded">
    @csrf

    <div class="mb-3">
      <label for="full_name" class="form-label">Full Name</label>
      <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}" required autofocus>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
      <label for="phone" class="form-label">Phone</label>
      <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
    </div>

    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
    </div>

    <div class="mb-3">
      <label for="bio" class="form-label">Bio</label>
      <textarea name="bio" class="form-control" rows="3" required>{{ old('bio') }}</textarea>
    </div>

    <div class="mb-3">
      <label for="profile_image" class="form-label">Profile Image (jpg/jpeg/png, max 2MB)</label>
      <input type="file" name="profile_image" class="form-control" accept="image/jpeg,image/png,image/jpg" required>
    </div>

    <div class="mb-3">
      <label for="hobbies" class="form-label">Hobbies</label>
      <input type="text" name="hobbies" class="form-control" value="{{ old('hobbies') }}" required>
    </div>

    <div class="mb-3">
      <label for="date_of_birth" class="form-label">Date of Birth</label>
      <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Save Profile</button>

    @if ($errors->any())
      <div class="alert alert-danger mt-3">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </form>
</div>
</body>
</html>
