<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdRequest;
use App\Http\Resources\AdResource;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index(){
        $ads = Ad::latest()->paginate(5);
        if(count($ads) > 0){
            if($ads->total() > $ads->perPage()){
                $data = [
                    'records' => AdResource::collection($ads),
                    'pagination links' => [
                        'current page' => $ads->currentPage(),
                        'per page' => $ads->perPage(),
                        'total' => $ads->total(),
                        'links' => [
                            'first' => $ads->url(1),
                            'last' => $ads->url($ads->lastPage()),
                        ],
                    ],
                ];
            }else {
                $data = AdResource::collection($ads);
            }

            return ApiResponse::sendResponse(200 , 'Ads Retrieved Successfully' ,$data);
        }
            return ApiResponse::sendResponse(200 , 'Ads are Empty' , []);
    }

    public function latest(){
        $ads = Ad::latest()->take(2)->get();
        if(count($ads) > 0){
            return ApiResponse::sendResponse(200 , 'Latest Ads Retrived' , AdResource::collection($ads));
        }
            return ApiResponse::sendResponse(200 , 'There are no latest ads' , []);
    }

    public function domain($domain_id){
        $ads = Ad::where('domain_id',$domain_id)->get();
        if(count($ads) == 0){
            return ApiResponse::sendResponse(200 , 'Ads are Empty' , []);
        }
            return ApiResponse::sendResponse(200 , 'Ads in the domain retrieved successfully' , AdResource::collection($ads));
    }

    public function search(Request $request){
        $word = $request->input('search') ?? null;
        $ads = Ad::when($word != null , function ($q) use ($word){
            $q->where('title' , 'like' , '%' . $word . '%');
        })->latest()->get();

        if(count($ads) == 0){
            return ApiResponse::sendResponse(200 , 'No Matching Data' , []);
        }
            return ApiResponse::sendResponse(200 , 'Search Completed' , AdResource::collection($ads));
    }

    public function create(AdRequest $request){
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $record = Ad::create($data);

        if($record){
            return ApiResponse::sendResponse(201 , 'Ad Created Successfully' , new AdResource($record));
        }
    }

    public function update(AdRequest $request , $adId){
        $ad = Ad::findOrFail($adId);

        if($ad->user_id != $request->user()->id){
            return ApiResponse::sendResponse(403 , 'You aren\'t allowed to take this action' , []);
        }

        $data = $request->validated();
        $updateAd = $ad->update($data);

        if($updateAd){
            return ApiResponse::sendResponse(201 , 'Ad updated Successfully' , new AdResource($ad));
        }
    }

    public function delete( $adId){
        $ad = Ad::findOrFail($adId);

        // return $ad;
        if(empty($ad)){} {
           return  'error';
        }
        return $ad ;
        // if($ad->user_id != $request->user()->id || $adId) {
        //     return ApiResponse::sendResponse(403 , 'You aren\'t allowed to take this action' , []);
        // }
        // $destroy = $ad->delete();
        // if($destroy){
        //     return ApiResponse::sendResponse(200 , 'Ad Deleted Successfully' , []);
        // }
    }
}
