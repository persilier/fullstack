<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTravelRequest;
use App\Http\Requests\UpdateTravelRequest;
use App\Http\Resources\TravelResource;
use App\Models\Travel;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;

class TravelController extends Controller
{

    public function index(): JsonResponse
    {
        if(!$travel=QueryBuilder::for(Travel::class)
            ->allowedFilters(['employee.first_name','status','travelType.arrangement_type'])
            ->with(['company','employee','travelType'])
            ->latest()->paginate(15)){
            return $this->notFoundResponse('not found');
        }
        return $this->resourceCollectionResponse(TravelResource::collection($travel),'Travel resource retrieved');
    }


    public function store(StoreTravelRequest $request)
    {

        if(!$travel = Travel::create($request->validated())){
            return $this->badRequestResponse('an error occurred');
        }
        return $this->resourceResponse(new TravelResource($travel),'Travel resource created successfully');
    }


    public function show($id)
    {
        if(!$travel=Travel::with(['company','employee','travelType'])->findOrFail($id)){
            return $this->notFoundResponse('travel not found');
        }
        return $this->resourceResponse(new TravelResource($travel),'Travel retrieved successfully');
    }


    public function update(UpdateTravelRequest $request, $id)
    {
        if(!$travel=Travel::with(['company','employee','travelType','employee.roles'])->findOrFail($id)){
            return $this->notFoundResponse('travel not found');
        }
        $travel->update($request->validated());
        return $this->resourceResponse(new TravelResource($travel),'Travel updated successfully');
    }


    public function destroy($id)
    { if(!$travel=Travel::with(['company','employee','travelType'])->findOrFail($id)){
        return $this->notFoundResponse('travel not found');
    }
    $travel->delete();
        return $this->noContentResponse();
    }
}
