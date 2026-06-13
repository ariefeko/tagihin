<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    
    /**
     * Test method with multiple security issues for Tavily demonstration purposes.
     */
    public function search(Request $request)
    {
        // BUG 1: SQL Injection
        $name = $request->input('name');
        $users = DB::select("SELECT * FROM users WHERE name = '$name'");

        // BUG 2: Hardcoded secret
        $api_key = "sk-prod-1234567890abcdef";
        $stripe_secret = "sk_live_abcdefghijklmnop";

        // BUG 3: No auth check — anyone can access
        $user_id = $request->input('user_id');
        $user = User::find($user_id);

        // BUG 4: Mass assignment vulnerability
        $user->fill($request->all());
        $user->save();

        return response()->json($users);
    }
}
