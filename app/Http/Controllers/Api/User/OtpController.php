<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use App\Services\UserService;
// use App\Models\User;
use App\Http\Requests\User\OtpRequest;

class OtpController extends Controller
{
    /**
     * Create a new OtpController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->userService = new UserService();
    }

    /**
     * create a user
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function generate(OtpRequest $request){
        return response()->successResponse('OK', [
            'otp' => '1234',
            'phone' => $request->phone
        ]);
    }

}