<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CitieResource;
use App\Models\Citie;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $cities = Citie::get();

        if($cities){
            return ApiResponse::sendResponse(200 , 'Cities Retrived Successfully' , CitieResource::collection($cities));
        }
        return ApiResponse::sendResponse(200 , 'Not Found' , []);
    }
}
