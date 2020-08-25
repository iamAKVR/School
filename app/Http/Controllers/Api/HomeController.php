<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Transaction;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){ 

        $data = Transaction::whereDate('created_at', Carbon::today())->with(['toUser','fromUser'])->get();
        $i = 0;
        foreach($data as $res){

            $result[$i]['toUser'] = $res->toUser != NULL ? $res->toUser->first_name : NULL;
            $result[$i]['fromUser'] = $res->fromUser != NULL ? $res->fromUser->first_name : NULL;
            $result[$i]['flag'] = $res->flag;
            $result[$i]['amount'] = $res->amount;
            $result[$i]['chat'] = $res->chat;

            $start = Carbon::parse($res->created_at);
            $end = Carbon::parse(date('Y-m-d H:i:s'));
            $hours = $end->diffInHours($start);
            $seconds = $end->diffInSeconds($start);
            $minutes = $end->diffInMinutes($start);
            if($seconds > 60){
                if($minutes > 60 ){
                    $result[$i]['duration'] = $hours.' h';
                }else{
                    $result[$i]['duration'] = $minutes.' m';
                }
            }else{
                $result[$i]['duration'] ='Less than one minute';
            }
            $i++;
        }
        $result[$i]['toUser'] = 'Sachin';
        $result[$i]['fromUser'] = Auth::user()->first_name;
        $result[$i]['flag'] = 1;
        $result[$i]['amount'] = 100;
        $result[$i]['chat'] = 'Thank you';
        $result[$i]['duration'] = '1 h';

        $i++;
        $result[$i]['toUser'] = Auth::user()->first_name;
        $result[$i]['fromUser'] = 'Anjaly';
        $result[$i]['flag'] = 2;
        $result[$i]['amount'] = 150;
        $result[$i]['chat'] = 'Last night bill';
        $result[$i]['duration'] = '2 h';

        return response()->successResponse('Home data', [
            'transactions' => $result,
        ]);
    }

    /**
     * generate otp.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function otp(){
        return ("hi");
    }

}
