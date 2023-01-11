<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResignationRequest;
use App\Http\Requests\UpdateResignationRequest;
use App\Http\Resources\ResignationResource;
use App\Models\Resignation;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;

class ResignationController extends Controller
{

    public function index(): JsonResponse
    {
       if(!$resignations=QueryBuilder::for(Resignation::class)
           ->allowedFilters(['department.department','employee.first_name'])
           ->with(['department','company','employee'])->latest()->paginate(15)){
           return $this->notFoundResponse('not found resources');
       }
        return $this->resourceCollectionResponse(ResignationResource::collection($resignations),'all resignations retrieved successfully');
    }


    public function store(StoreResignationRequest $request): JsonResponse
    {
        if(!$resignation= Resignation::create($request->validated())){
            return $this->badRequestResponse('an error occurred while creating Resignation');
        }
        return $this->resourceResponse( new ResignationResource($resignation),'resignation created successfully');
    }


    public function show($id): JsonResponse
    {
        if(!$resignation=Resignation::with(['department','company','employee','employee.designation','employee.roles'])->findOrFail($id)){
            return $this->notFoundResponse('not found resignation');
        }
        return $this->resourceResponse(new ResignationResource($resignation),'Resignation retrieved successfully');
    }


    public function update(UpdateResignationRequest $request, $id): JsonResponse
    {
        if(!$resignation=Resignation::with(['department','company','employee'])->findOrFail($id)){
            return $this->notFoundResponse('not found resignation');
        }
        $resignation->update($request->validated());
        return $this->resourceResponse(new ResignationResource($resignation),'Resignation updated successfully');
    }


    public function destroy($id): JsonResponse
    {
        if(!$resignation=Resignation::with(['department','company','employee'])->findOrFail($id)){
            return $this->notFoundResponse('not found resignation');
        }
        $resignation->delete();
        return $this->noContentResponse();
    }
}
