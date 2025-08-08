
<a href='{{ url("profiles") }}'> <button>Back To List</button></a>

<div>
  <h1>Your Profile Data</h1>
  User Id: {{ $profile->user->id }} <br>
  User Name:  {{ $profile->user->name }} <br>
  User Email:  {{ $profile->user->email }} <br>
    Profile Name:   {{ $profile->full_name }} <br>
    Profile Photo: <img src='{{ asset("$profile->profile_image") }}' width="60" alt="">
    Number:   {{ $profile->phone }} <br>
    Email:   {{ $profile->email }} <br>
</div>
