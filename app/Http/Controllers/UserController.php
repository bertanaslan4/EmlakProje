<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Dashboard\User\ProfileUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $appliedAdverts = $user->appliedAdverts;

        return view('front.user.dashboard.index', [
            'appliedAdverts' => $appliedAdverts,
        ]);
    }

    public function profile()
    {
        $user = auth()->user();
        $countries = Country::all();
        $states = State::where('country_id', $user->country_id)->orderBy('name')->get();
        $cities = City::where('state_id', $user->state_id)->orderBy('name')->get();
        $nationalities = Country::all();

        return view('front.user.dashboard.profile', [
            'user' => $user,
            'countries' => $countries,
            'nationalities' => $nationalities,
            'states' => $states,
            'cities' => $cities,
        ]);
    }

    public function profileUpdate(ProfileUpdateRequest $request)
    {
        $user = User::find(auth()->user()->id);

        $validated = $request->validated();

        $validated['dob'] = date('Y-m-d', strtotime($validated['dob']));

        $user->update($validated);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function passwordUpdate(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('success', 'Old password is incorrect');
        }

        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:8',
        ], [
            'password.required' => 'Password is required',
            'password.confirmed' => 'Password confirmation does not match',
            'password.min' => 'Password must be at least 8 characters',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user->update(['password' => bcrypt($request->password)]);

        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
