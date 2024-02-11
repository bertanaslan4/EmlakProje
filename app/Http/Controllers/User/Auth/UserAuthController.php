<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\Auth\UserLoginRequest;
use App\Http\Requests\User\Auth\UserRegisterRequest;

class UserAuthController extends Controller
{
    public function store(UserLoginRequest $request)
    {
        $validated = $request->validated();
        if (Auth::attempt($validated)) {
            return redirect()->intended('/')
                ->withSuccess('Giriş yapıldı!');
        }
        return redirect("/")->withSuccess('Giriş yapılamadı!');
    }

    public function destroy(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function register(UserRegisterRequest $request){
        $validated = $request->validated();

        $user = User::create([
            ...$validated,
            'password' => bcrypt($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->route('home')->withSuccess('Kayıt başarılı!');
    }
}
