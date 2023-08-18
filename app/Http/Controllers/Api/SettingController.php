<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResouce;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $settings = Setting::findOrFail(1);
        $settings = Setting::find(60);

        if($settings){
            return ApiResponse::sendResponse(200 , 'Settings Retrived Successfully' , new SettingResouce($settings));
        }
            return ApiResponse::sendResponse(200 , 'Settings Not Found' , []);


        //  return SettingResouce::collection($settings);    //  => Get One Date
    }
}
