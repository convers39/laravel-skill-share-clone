<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $name = $request->user()->name;
        return redirect()->route('account.show', ['name' => strtolower($name)]);
    }

    public function show(Request $request)
    {
        $profile = $request->user()->profile;
        return view('account.show', [
            'profile' => $profile,
        ]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $profile = $request->user()->profile;
        $profile->update($request->all());
        return back()->with('success', 'Profile updated successfully');
    }
}
