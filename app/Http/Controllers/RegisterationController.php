<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SignupRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\RegisterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterationController extends Controller
{
    protected $registerservice;

    public function __construct(RegisterService $registerservice)
    {
        $this->registerservice = $registerservice;
    }

    public function login()
    {
        return view('Registration.Signin');
    }
    public function register()
    {
        $role = Role::all();
        return view('Registration.signup', compact('role'));
    }
    public function store(Request $request)
    {
        // dd('hlo');
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role');
        $user->password = Hash::make($request->input('password'));
        if ($user->save()) {
            return redirect()->route('sigin');
        } else {
            return redirect()->back()->with('error', 'User not Created');
        }
    }
    public function check(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',  // It's a good idea to validate email format
            'password' => 'required',
        ]);
        // dd($credentials);

        if (Auth()->attempt($credentials)) {
            // Authentication passed
            // dd('appreve');
            $request->session()->regenerate();
            return redirect()->route('contact.list')->with('success', 'Login successful');
        } else {
            // Authentication failed
            // dd('not appreve');
            return redirect()->back()->with(
                'error',
                'The provided credentials do not match our records.',
            );
        }
    }
}
