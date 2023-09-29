<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

use Session;


class AuthController extends Controller
{
    use HttpResponses;

    public function register(Request $request)
    {
        $fields = $request->validate([
            "name" => 'required|string',
            "email" => 'required|string|unique:users,email',
            "password" => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'user_id' => uniqid("user_") . date('YmdHis') . uniqid()
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        return $this->success([
            'user' => $user,
            'token' => $token,
        ], 'User registered successfully!', 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            "email" => 'required|string',
            "password" => 'required|string',
        ]);

        // Check Email
        $where = ["email" => $fields['email']];
        $user = User::where($where)->first();

        // Check Password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return $this->error([
                'message' => "Bad credentials"
            ], '', 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return $this->success([
            'user' => $user,
            'token' => $token
        ], '', 200);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return $this->success([
            'message' => 'logged out'
        ]);
    }

    public function userDetails(Request $request)
    {
        $user = $request->user();
        dd($user);
    }


    public function index()
    {
        return view('login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin-categories')
                ->withSuccess('Signed in');
        }

        return redirect('/owner')->withError('Login details are not valid');
    }


    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/owner')->with('success', 'logged out successfully !');
    }
}
