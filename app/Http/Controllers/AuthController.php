<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{

    public function dashboard(){
        return view('dashboard');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|confirmed',
        ]);
        if(User::where('email', $request->email)->first()){
            return response([
                "message"=>"Email already exists.",
                'status'=>'failed'
            ],200);
        };
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $token = $user->createToken($request->email)->plainTextToken;
        return response([
            'token'=>$token,
            'message'=>'Registration successfully',
            'status'=>'success'
        ],201);

    }

    public function index(Request $request){
        return view('login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['token' => $token]);
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    public function logout(Request $request)
    {
        /**
         * @var $user App\Models\User
         */

        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
        try {
            $user->tokens()->delete();
        } catch (\Exception $e) {
            Log::error('Token revocation failed: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to revoke tokens'], 500);
        }

        return redirect('/');
    }
}
