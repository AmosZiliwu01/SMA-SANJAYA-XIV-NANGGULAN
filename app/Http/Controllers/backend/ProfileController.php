<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('backend.profile.index', [
            'user' => auth()->user(),
        ]);
    }

    public function update(Request $request)
    {
        try {

            $user = auth()->user();
            $request->validate([
                'username' => 'required|string|max:255|unique:users,username,' . $user->id,
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:6|confirmed',
                'phone' => 'nullable|string',
                'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048' ,
            ]);

            $user->username = $request->username;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            if ($request->hasFile('photo')) {
                $filename = $request->photo->store('profile', 'public');

                if ($user->photo) {
                    $oldPath = str_replace('storage/', '', $user->photo);
                    \Storage::disk('public')->delete($oldPath);
                }

                $user->photo = $filename;
            }

            $user->save();

            return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbaharui profil.: ' . $e->getMessage());
        }
    }
}
