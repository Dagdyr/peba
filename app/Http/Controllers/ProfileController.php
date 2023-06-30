<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use http\Client\Curl\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function updateAbout(Request $request){
        $about = $request->about;
        $id = auth()->user()->getAuthIdentifier();
        $user =  \App\Models\User::where('id', $id)->first();
        $user->about = $about;
        $user->save();
        return json_encode(['result'=>'success']);
    }
    public function updateName(Request $request){
        $name = $request->name;
        $lastname = $request->lastname;
        $id = auth()->user()->getAuthIdentifier();
        $user =  \App\Models\User::where('id', $id)->first();
        $user->name = $name;
        $user->lastname = $lastname;
        $user->save();
        return json_encode(['result'=>'success']);
    }
}
