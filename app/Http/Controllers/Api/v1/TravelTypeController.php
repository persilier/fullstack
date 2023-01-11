<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTravelTypeRequest;
use App\Http\Requests\UpdateTravelTypeRequest;
use App\Http\Resources\TravelTypeResource;
use App\Models\TravelType;
use Illuminate\Http\JsonResponse;

class TravelTypeController extends Controller
{

    public function index(): JsonResponse
    {
        if(!$travelType= TravelType::all()){
            return $this->notFoundResponse('no found type');
        }
        return $this->resourceCollectionResponse( TravelTypeResource::collection($travelType),'travel type retrieved');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTravelTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTravelTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TravelType  $travelType
     * @return \Illuminate\Http\Response
     */
    public function show(TravelType $travelType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTravelTypeRequest  $request
     * @param  \App\Models\TravelType  $travelType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTravelTypeRequest $request, TravelType $travelType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TravelType  $travelType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TravelType $travelType)
    {
        //
    }
}
