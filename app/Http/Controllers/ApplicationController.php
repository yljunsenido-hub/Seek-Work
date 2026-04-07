<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function create()
{
    $user = auth()->user(); // Get the logged-in user

    if ($user->profile) {
        return redirect()->route('dashboard');
    }

    // Pass the $user variable to the view
    return view('profile.setup', compact('user'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'headline'  => 'required|string',
            'location'  => 'required',
            'bio'       => 'nullable|string',
        ]);

        // This creates the profile and automatically sets the user_id
        auth()->user()->profile()->create($validated);

        return redirect()->route('dashboard')->with('success', 'Profile created!');
    }
}
