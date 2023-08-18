<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\DistrictResource;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $district = District::where('city_id' , $request->input('city_id'))->get();
        if(count($district) > 0){
            return ApiResponse::sendResponse(200 , 'District Successfully' , DistrictResource::collection($district));
        }
            return ApiResponse::sendResponse(200 , 'Not Found' , []);
    }
}
