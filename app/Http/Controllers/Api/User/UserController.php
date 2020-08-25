<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
// use App\Services\UserService;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\User\UserUpdateRequest;

class UserController extends Controller
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
    public function update(UserUpdateRequest $request){

        $data = $request->except(['id','password']);
        if($request->password != NULL){
            $data['password'] = Hash::make($request->password);
        }
        $user = Auth::user()->update($data);
        return response()->successResponse('User successfully updated.', [
            'user' => Auth::user(),
        ]);
    }

}