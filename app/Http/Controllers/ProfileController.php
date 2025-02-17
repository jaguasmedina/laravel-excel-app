<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);

        auth()->user()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('profile.edit')->with('success', 'Perfil actualizado con éxito.');
    }
}
