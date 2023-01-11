<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWarningTypeRequest;
use App\Http\Requests\UpdateWarningTypeRequest;
use App\Http\Resources\WarningTypeResource;
use App\Models\WarningType;
use Illuminate\Http\JsonResponse;

class WarningTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if(!$warnTypes= WarningType::all()){
            return $this->notFoundResponse('not found resource');
        }
        return $this->resourceCollectionResponse(WarningTypeResource::collection($warnTypes),
            'all warning types');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWarningTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWarningTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WarningType  $warningType
     * @return \Illuminate\Http\Response
     */
    public function show(WarningType $warningType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWarningTypeRequest  $request
     * @param  \App\Models\WarningType  $warningType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWarningTypeRequest $request, WarningType $warningType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WarningType  $warningType
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarningType $warningType)
    {
        //
    }
}
