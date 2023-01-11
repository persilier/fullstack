<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTerminationTypeRequest;
use App\Http\Requests\UpdateTerminationTypeRequest;
use App\Http\Resources\TerminationTypeResource;
use App\Models\TerminationType;
use Illuminate\Http\JsonResponse;

class TerminationTypeController extends Controller
{

    public function index(): JsonResponse
    {
        if(!$terminationType=TerminationType::all()){
            return $this->notFoundResponse('not found resources');
        }
        return $this->resourceCollectionResponse(TerminationTypeResource::collection($terminationType),
            'all types terminations available');
    }


    public function store(StoreTerminationTypeRequest $request)
    {
        //
    }


    public function show(TerminationType $terminationType)
    {
        //
    }


    public function update(UpdateTerminationTypeRequest $request, TerminationType $terminationType)
    {
        //
    }


    public function destroy(TerminationType $terminationType)
    {
        //
    }
}
