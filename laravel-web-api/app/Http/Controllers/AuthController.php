<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Utils\HttpStatus;
use Illuminate\Http\Request;
use App\utils\ResponseHelper;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     * Ini berarti middleware auth
     * akan diterapkan ke semua method dalam controller, kecuali method login.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Check if the account is exists
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return ResponseHelper::jsonResponse(
                HttpStatus::NOT_FOUND_404,
                'Email tidak ditemukan, pastikan email kamu terdaftar.'
            );
        }

        // check if the password is correct
        $credentials = $request->only('email', 'password');
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return ResponseHelper::jsonResponse(
                HttpStatus::UNAUTHORIZED_401,
                'Password yang anda masukkan salah, Silakan coba lagi.'
            );
        }

        $credentials = request(['email', 'password']);
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout('true');
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
