<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($request->code == env('LOGISTIK_CODE', 'logistiktvkuch49')) {
            $user = User::create([
                'name' => $request->name,
                'role' => 'logistik',
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(10),
            ]);
        } elseif ($request->code == env('DIVISI_CODE', 'tvkuch49')) {
            $user = User::create([
                'name' => $request->name,
                'role' => 'divisi',
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(10),
            ]);
        } else {
            return back()->with('message', 'code-error');
        }

        event(new Registered($user));

        Auth::login($user);

        if ($request->code == env('LOGISTIK_CODE', 'logistiktvkuch49')) {
            return redirect(RouteServiceProvider::HOME_LOGISTIK);
        } elseif ($request->code == env('DIVISI_CODE', 'tvkuch49')) {
            return redirect(RouteServiceProvider::HOME_DIVISI);
        } else {
            return back()->with('message', 'code-error');
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
