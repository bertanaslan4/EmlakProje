<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;

class UserController extends Controller
{
    public function index () {
        $users = User::all();
        return view('admin.user.list', compact('users'));
    }

    public function store (StoreRequest $request) {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        Alert::success('Success', 'User created successfully!');
        return redirect()->route('admin.user-list');
    }

    public function update (UpdateRequest $request) {
        $validated = $request->validated();
        if(!empty($validated['password']))
            $validated['password'] = bcrypt($validated['password']);
        else
            unset($validated['password']);

        $user = User::findOrFail($request->input('user_id'));
        $user->update($validated);

        Alert::success('Success', 'User updated successfully!');
        return redirect()->route('admin.user-list');
    }

    public function destroy(int $id){
        $user = User::findOrFail($id);
        $user->delete();
        Alert::success('Success', 'User deleted successfully!');
        return redirect()->route('admin.user-list');
    }

    public function getUser(int $id){
        $user = User::findOrFail($id);
        return response()->json($user);
    }
}
