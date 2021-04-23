<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Broker;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Config;

class MobileLoginController extends Controller
{
    public function __construct()
    {
        $this->user = new User;
        $this->broker = new Broker;
    }

    public function brokersLogin(Request $request)
    {

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        $credentials = request(['username', 'password']);

        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();

        $tokenResult = $user->createToken('Token');

        $token = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        $broker = $token;

        Broker::where("id", $broker->id)->update(['updated_at' => Carbon::now()]);

        return response()->json([
            'success' => true,
            'token' => $token,
            'data' => array(
                'id' => $broker->id,
                'broker_code' => $broker->broker_code,
                'username' => $broker->username,
                'name' => $broker->name,
                'activation_key' => $broker->activation_key,
                'spa_id' => $broker->spa_id,
                'multi_id' => $broker->multi_id
            )
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
