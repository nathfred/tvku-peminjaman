<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function home()
    {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();

        if ($user->role == 'logistik') {
            return redirect()->route('logistik-index');
        } elseif ($user->role == 'divisi') {
            return redirect()->route('divisi-index');
        } else {
            return redirect()->route('logout');
        }

        return redirect()->route('logout');
    }

    public function back()
    {
        return redirect()->back();
    }
}
