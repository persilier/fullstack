<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAwardTypeRequest;
use App\Http\Requests\UpdateAwardTypeRequest;
use App\Http\Resources\AwardTypeResource;
use App\Models\AwardType;
use Illuminate\Http\JsonResponse;

/**
 * Summary of AwardTypeController
 * @author LeaveHR
 * @copyright (c) 2023
 */
class AwardTypeController extends Controller
{
    /**
     * Summary of index
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if (!$awardType = AwardType::all()) {
            return $this->notFoundResponse('not found response');
        }
        return $this->resourceCollectionResponse(AwardTypeResource::collection($awardType), 'awardType retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAwardTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAwardTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AwardType  $awardType
     * @return \Illuminate\Http\Response
     */
    public function show(AwardType $awardType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAwardTypeRequest  $request
     * @param  \App\Models\AwardType  $awardType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAwardTypeRequest $request, AwardType $awardType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AwardType  $awardType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AwardType $awardType)
    {
        //
    }
}
