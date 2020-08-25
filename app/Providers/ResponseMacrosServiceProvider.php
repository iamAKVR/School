<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Response;

class ResponseMacrosServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data=null,$message='Successful') {
            return Response::json([
                    'message' => $message,
                    'errors'  => null,
                    'data' => $data,
                ]);
        });

        Response::macro('error', function ($message = null,$errors = null,$status = 400) {
            return Response::json([
                'message'         => $message?:$status.' error',
                'errors'          => $errors,
                'status_code'     => $status,
            ], $status);
        });

        Response::macro('successResponse', function ($message = 'OK', $data=null) {
            return Response::json([
                    'status'  => 1,
                    'message' => $message,
                    'data' => $data,
                ]);
        });

        Response::macro('errorResponse', function ($errors = null, $data=null, $status = 400) {
            return Response::json([
                'status'          => 0,
                'errors'          => $errors,
                'data'            => $data,
                'code'            => $status
            ], $status);
        });

        Response::macro('pagination',function ($paginate,$key=null,$message='Successful',$dataAmender=null) {
            $paginatedData = $paginate->toArray();
            $responseData = [
                'status' => 1,
                'message' => $message
            ];
            $data = Arr::get($paginatedData,'data');

            if (is_callable($dataAmender)) {
                $data = $dataAmender($data,$paginate);
            }

            if ($key) {
                $responseData['data'][$key] = $data;
            } else {
                $responseData['data'] = $data;
            }

            $responseData['pagination'] = Arr::except($paginatedData, ['data']);
            return $responseData;
        });
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
