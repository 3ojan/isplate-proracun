<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assuming you're using the User model

class ProfileController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'organization' => 'required',
            'rkpid' => 'required',
            // Add other fields as necessary
        ]);

        // Assuming you have a User model
        $profile = User::create($validatedData);

        return response()->json($profile, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'organization' => 'required',
            'rkpid' => 'required',
            // Add other fields as necessary
        ]);

        $profile = User::find($id);
        $profile->update($validatedData);

        return response()->json($profile);
    }
}
