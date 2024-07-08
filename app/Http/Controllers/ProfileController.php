<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $profile = $user->profile ?: $user->profile()->create();
        $posts = $user->posts;
        return view('profiles.show', compact('user', 'profile', 'posts'));
    }

    public function edit(User $user)
    {
        $profile = $user->profile ?: $user->profile()->create();
        return view('profiles.edit', compact('user', 'profile'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'bio' => 'nullable|string',
            'website' => 'nullable|url',
            'location' => 'nullable|string',
        ]);

        $user->profile()->update([
            'bio' => $request->bio,
            'website' => $request->website,
            'location' => $request->location,
        ]);

        return redirect()->route('profiles.show', $user);
    }
}
