<?php

use Illuminate\Support\Facades\Http;

function getUser($userId){
    $url = env('URL_SERVICE_USER').'users/'.$userId;

    try {
       $response = Http::timeout(10)->get($url);
       $data = $response->json();
       $data['http_code'] = $response->getStatusCode();
       return $data;
    } catch (\Throwable $e) {
        return [
            'status' =>'error',
            'http_code' =>500,
            'message' => 'Service user unavailable'
        ];
    }
}

function getUserById($userId=[]){
    $url = env('URL_SERVICE_USER').'users/'.$userId;

    try {
        if(count($userId) === 0){
            return [
                'status' =>'success',
                'http_code' =>200,
                'data' => []
            ];
        }

        $response = Http::timeout(10)->get($url,['user_id[]'=>$userId]);
        $data = $response->json();
        $data['http_code'] = $response->getStatusCode();
        return $data;
    } catch (\Throwable $e) {
        return [
            'status' =>'error',
            'http_code' =>500,
            'message' => 'Service user unavailable'
        ];
    }
}