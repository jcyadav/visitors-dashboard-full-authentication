<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssdtUser;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'Password' => 'required'
        ]);

        $user = AssdtUser::where('email_id', $request->Email)
            ->where('password', md5($request->Password))
            ->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Email or Password.'
            ]);
        }

        if ($user->is_active == 'BLOCKED') {
            return response()->json([
                'status' => false,
                'message' => 'Your account has been blocked.'
            ]);
        }

        // Update Last Login IP
        $user->last_login_ip = $request->ip();
        $user->save();

        // Create Session
        session([
            'user_id'    => $user->id,
            'full_name'  => $user->full_name,
            'email_id'   => $user->email_id
        ]);

        return response()->json([
            'status'   => true,
            'redirect' => route('Dashboard')
        ]);
    }


    public function myProfile()
    {
        $user = AssdtUser::find(session('user_id'));

        return view('pages.myprofile', compact('user'));
    }
    public function logout()
    {
        session()->flush();

        return redirect()->route('login');
    }
}