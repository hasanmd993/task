<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Profile\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $profiles = Profile::where('user_id', auth()->id())->get();
    return view('profile.index', compact('profiles'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|unique:profiles,email',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'bio' => 'required|string',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'hobbies' => 'nullable|string|max:255',
        'date_of_birth' => 'required|date',
    ]);

    $imagePath = null;

if ($request->hasFile('profile_image')) {
    $imagePath = $request->file('profile_image')->store('profiles', 'public');
}
Profile::create([
        'user_id' => auth()->id(),
        'full_name' => $validated['full_name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'address' => $validated['address'],
        'bio' => $validated['bio'],
        'profile_image' => $imagePath,
        'hobbies' => $validated['hobbies'] ?? null,
        'date_of_birth' => $validated['date_of_birth'],
    ]);

    return redirect()->route('profiles.index')->with('success', 'Profile created!');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile=Profile::with('user')->findOrFail($id);
        return view('profile.show',compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
