<?php

namespace App\Http\Controllers\Api\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Post\PostCreateRequest;

class PostController extends Controller
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
    public function create(PostCreateRequest $request){
        $data['chat'] = $request->chat;
        $data['from_id'] = Auth::user()->id;
        $data['flag'] = Transaction::FLAG_POST;
        $data['status'] = 1;
        Transaction::create($data);
        return response()->successResponse('Post successfully created.');
    }

}