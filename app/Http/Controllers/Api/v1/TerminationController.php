<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTerminationRequest;
use App\Http\Requests\UpdateTerminationRequest;
use App\Http\Resources\TerminationResource;
use App\Models\Termination;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;

class TerminationController extends Controller
{

    public function index(): JsonResponse
    {
        if(!$termination=QueryBuilder::for(Termination::class)
            ->allowedFilters(['employee.first_name','TerminationType.termination_title'])
            ->with(['employee','TerminationType','company','employee.roles'])->latest()->paginate(15)){
            return $this->notFoundResponse('no resource available');
        }
        return $this->resourceCollectionResponse(TerminationResource::collection($termination),'termination resource available');
    }


    public function store(StoreTerminationRequest $request): JsonResponse
    {
        if(!Termination::create($request->validated())){
            return $this->badRequestResponse('an error occurred');
        }
        return $this->createdResponse('termination created successfully');
    }


    public function show($id): JsonResponse
    {
        if(!$termination = Termination::with(['employee','TerminationType','company','employee.roles'])->findOrFail($id)){
            return $this->notFoundResponse('not found');
        }
        return $this->resourceResponse(new TerminationResource($termination),'termination found');
    }


    public function update(UpdateTerminationRequest $request, $id): JsonResponse
    {
        if(!$termination = Termination::with(['employee','TerminationType','company'])->findOrFail($id)){
            return $this->notFoundResponse('not found');
        }
        $termination->update($request->validated());
        return $this->resourceResponse(new TerminationResource($termination),'termination updated successfully');
    }


    public function destroy($id): JsonResponse
    {
        if(!$termination = Termination::with(['employee','TerminationType','company'])->findOrFail($id)){
            return $this->notFoundResponse('not found');
        }
        $termination->delete();
        return $this->noContentResponse();
    }
}
