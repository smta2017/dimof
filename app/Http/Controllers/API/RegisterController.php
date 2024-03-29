<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegsterRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class RegisterController extends AppBaseController
{
    /**
     * Create a new RegisterController instance.
     *
     * @return void
     */
    public function __construct(private UserRepository $userRepo)
    {
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
    public function verify_register(Request $request)
    {
        if(!$this->userRepo::verifyOTP($request->otp,$request->user_mobile)){
            return $this->sendError('Wrong otp',400);
        }

        $user = User::where('mobile', $request->user_mobile)->first();

        $token = auth('api')->login($user);

        return $this->sendResponse($token,'Seccess Token');
    }

}
