<?php

namespace App\Http\Controllers\Traits;

trait ApiResponse{
    // public
    public function success($status, $data, $message){
        return response()->json([
            'status' => $status,
            'data' => $data,
            'message' => $message
        ]);
    }

    public function error($status, $message){
        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }
}
