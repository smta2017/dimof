<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'username',
        'email',
        'mobile',
        'password',
        'created_at',
        'updated_at'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return user::class;
    }


    public static function sentOTP()
    {
        return  $verificationCode = 1234;
        // Store verification code temporarily
    }

    public static function verifyOTP($otp, $user_mobile) :bool
    {
        if ($otp == 1234) {
            $user = User::where('mobile', $user_mobile)->first();
            if ($user) {
                $user->update(['mobile_verified_at' => now()]);
                return \true;
            } 
        }
        return  \false ;
    }
}
