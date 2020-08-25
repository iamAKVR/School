<?php

namespace App\Services;


use App\Models\User;
use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService
{
	public function __construct()
    {
        $this->user = new User();
    }

	public function checkUser($phone,$password){
		if( $user = User::query()->where('phone',$phone)->where('status','1')->first() ){
			if( Hash::check($password,$user['password']) ){
				return $user;
			} else{
				return false;
			}
		} else{
			return false;
		}
	}

}
