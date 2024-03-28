<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegsterRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class AuthController extends AppBaseController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(private UserRepository $userRepo)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['mobile', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegsterRequest $request)
    {
        $user = User::create($request->all());

        $OTP =  $this->userRepo::sentOTP();

        return $this->sendResponse($OTP,'OTP has ben sent.');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify_register(RegsterRequest $request)
    {
        if(!$this->userRepo::verifyOTP($request->otp,$request->user_mobile)){
            return $this->sendError('wrong otp',400);
        }

        $user = User::create($request->all());

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
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
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
