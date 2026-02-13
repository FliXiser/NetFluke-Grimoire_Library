<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. ตรวจว่ามี email + password มั้ย
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. หา user จาก email
        $user = User::where('email', $request->email)->first();

        // 3. ถ้าไม่เจอ หรือ password ไม่ตรง
        if (!$user || $user->password !== $request->password) {
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }

        // 4. login ผ่าน
        return response()->json([
            'message' => 'Login success',
            'user' => $user
        ]);
    }
}
