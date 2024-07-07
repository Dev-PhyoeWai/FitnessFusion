<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
class ApiBaseController extends Controller{
    public function success($status,$data,$message){
        return response()->json([
            'status'=>$status,
            'data'=>$data,
            'message'=>$message
        ]);
    }
    public function error($status,$message){
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);
    }
}
