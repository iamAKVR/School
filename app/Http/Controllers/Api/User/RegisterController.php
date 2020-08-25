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
       
       $data = $request->all();
       $data['api_token'] = Str::random(60);
       $data['username'] = $request->first_name." ".$request->last_name;
       $data['status'] = 1;
       $data['password'] = Hash::make($request->password);
       $user = User::create($data);

       if($request->hasFile('profile_image')){
            $filename = $data['phone'].md5(time().rand(0,9999));
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $profile_image = $filename.'.'.$extension;
            $profile_image_path = config('app.url')."/storage/".User::getUserProfileImagePath($user->id)."/".$profile_image;
            if (!File::isDirectory(Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix() . User::getUserProfileImagePath($user->id))) {
                Storage::disk('public')->makeDirectory(User::getUserProfileImagePath($user->id));
            }
            Storage::disk('public')->put(User::getUserProfileImagePath($user->id).'/'.$profile_image,  File::get($request->file('profile_image')));
        } 
        $user->profile_picture =  $profile_image_path; 
        $user->save();
        return response()->successResponse('User created', [
            'user' => $user,
        ]);
    }

}