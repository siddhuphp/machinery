<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Traits\HttpResponses;

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
        $response = $this->login($request);
        // Check if the response was successful
        if ($response->getStatusCode() === 200) {
            $content = $response->getContent();
            $data = json_decode($content, true);
            return redirect('admin-categories')->with('success', 'Successfully inserted !');
        }

        if ($response->getStatusCode() === 401) {
            return redirect('/owner')->with('error', 'Bad credentials');
        }

        return redirect("/owner")->with('error', 'Something went wrong! Please try again.');
    }
}
