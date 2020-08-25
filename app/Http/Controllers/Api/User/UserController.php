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

        $data = $request->except(['id','password','profile_image']);
        if($request->password != NULL){
            $data['password'] = Hash::make($request->password);
        }
        $user = Auth::user();
        if($request->hasFile('profile_image')){
            $filename = $data['phone'].md5(time().rand(0,9999));
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $profile_image = $filename.'.'.$extension;
            $profile_image_path = config('app.url')."/storage/".User::getUserProfileImagePath($user->id)."/".$profile_image;
            if (!File::isDirectory(Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix() . User::getUserProfileImagePath($user->id))) {
                Storage::disk('public')->makeDirectory(User::getUserProfileImagePath($user->id));
            }
            Storage::disk('public')->put(User::getUserProfileImagePath($user->id).'/'.$profile_image,  File::get($request->file('profile_image')));
            $data['profile_picture'] =  $profile_image_path;

            $url_array = explode('/',$user->profile_picture);
            $image = end($url_array);
            if (Storage::disk('public')->exists(User::getUserProfileImagePath($user->id).'/'.$image)) {
                Storage::disk('public')->delete(User::getUserProfileImagePath($user->id).'/'.$image);
            }
        } 
        Auth::user()->update($data);
        return response()->successResponse('User successfully updated.', [
            'user' => Auth::user(),
        ]);
    }

}