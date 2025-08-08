<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $table='profiles';

    protected $fillable=[
        'full_name',
        'user_id',
        'email',
        'phone',
        'address',
        'bio',
        'profile_image',
        'hobbies',
        'date_of_birth'];

        protected $casts = [
    'date_of_birth' => 'date',
];


    public function user(){
return $this->belongsTo(User::class);
    }
}

