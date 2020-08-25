<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Models\User;
use App\Http\Requests\User\RegisterFormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class RegisterController extends Controller
{
    /**
     * Create a new RegisterController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * create a user
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(RegisterFormRequest $request){ 
       
       $data = $request->except(['confirm_password']);
       $data['api_token'] = Str::random(60);
       $data['status'] = 1;
       $data['password'] = Hash::make($request->password);
       $user = User::create($data);
        return response()->successResponse('User created', [
            'user' => $user,
        ]);
    }

}