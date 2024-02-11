<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\AdminAuthRequest;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function store(AdminAuthRequest $request)
    {
        $validated = $request->validated();
        if (Auth::attempt($validated)) {
            return redirect()->intended('admin/dashboard')
                ->withSuccess('Giriş yapıldı!');
        }
        return redirect("admin/login")->withErrors('Giriş bilgileri hatalı!');
    }

    public function destroy(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
