<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    /**
     * Constants will be used to compare status
     */
    public const FLAG_SEND = 1;
    public const FLAG_RECEIVED = 2;
    public const FLAG_POST = 3;

    public const STATUS_PAUSED = 'paused';
    public const BASE_PLAN = '1';
    public const ADD_ONS_PLAN = '2';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_id','to_id','payment_id','amount','response','flag','status','chat','image'
    ];

    public function fromUser(){
        return $this->hasOne('App\Models\User','id','from_id');
    }

    public function toUser(){
        return $this->hasOne('App\Models\User','id','to_id');
    }
}
