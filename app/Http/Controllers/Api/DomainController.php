<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\DomainResource;
use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $domains = Domain::all();

        if(count($domains) > 0){
            return ApiResponse::sendResponse(200 , 'Get All Domains' , DomainResource::collection($domains));
        }
            return ApiResponse::sendResponse(200 , 'Domans are Empty' , []);
    }
}
