<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{



    public function log() {
         return view('auth.ulogin');
    }
    public function userlist()
    {
        $user = user::get();


        // dd(Auth::user()->roles->first()->name);

        return response()->json($user);
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $registerUserData = $request->validate([
            'name' => 'required|string',
            'status' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'status' => $request['status'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $user->assignRole($request->role);

        // Optionally, return the created user's data along with the success message
        return response()->json([
            'message' => 'User Created',
            'user' => $user->only(['id', 'name', 'email', 'status', 'roles']), // Return user data excluding sensitive information
        ]);
    }

    public function login(Request $request)
    {
        $loginUserData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:8'
        ]);
        $user = User::where('email', $loginUserData['email'])->first();
        if (!$user || !Hash::check($loginUserData['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        }
        $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
        ]);
    }

    public function showLoginForm()
    {
        // Fetch the data you want to display on the login page
        $hotels = Hotel::all();
        $hotel = Hotel::all();



        // Pass the data to the login view
        return view('auth.login', compact('hotels' , 'hotel'));
    }
    public function hotelView(Request $request)
    {
        $hotel = Hotel::with('images')
                      ->where('id', $request->id)
                      ->first(); 

        if (!$hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel not found'
            ], 404);
        }

        $roomTypes = ['sharing', 'quad', 'quint', 'triple', 'double'];
        $dailyPrices = [];

        return response()->json([
            'success' => true,
            'hotel' => $hotel,
            'dailyPrices' => $dailyPrices,
            'images' => $hotel->images
        ]);
    }





    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            "message" => "logged out"
        ]);
    }
}
