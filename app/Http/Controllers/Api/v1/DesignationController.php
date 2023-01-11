<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDesignationRequest;
use App\Http\Requests\UpdateDesignationRequest;
use App\Http\Resources\DesignationResource;
use App\Models\Designation;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class DesignationController extends Controller
{


    public function listDesignations(): JsonResponse
    {
      if (!$designations=Designation::with('department')->get()) {
          return $this->notFoundResponse('Designations resource not found');
      }
        return $this->resourceCollectionResponse(DesignationResource::collection($designations),
            'all designations retrieve successfully', true, 200);
    }
    public function index(Request $request): Response
    {

        if(!$designations =QueryBuilder::for(Designation::class)
            ->with(['department','users'])
            ->allowedFilters(['designation'])
            ->paginate(10)){
            return $this->notFoundResponse('Designations resource not found');
        }
        return $this->resourceCollectionResponse(DesignationResource::collection($designations),
            'all designations retrieve successfully', true, 200);
    }


    public function store(StoreDesignationRequest $request): JsonResponse
    {

        if (!$designation = Designation::create($request->validated())) {
            return $this->badRequestResponse('an error occurred');
        }
        return $this->resourceResponse(new DesignationResource($designation),'Designation created successfully', 201);
    }


    public function show($id): JsonResponse
    {
        if(!$designation = Designation::with(['department','users'])->findOrFail($id)){
            return $this->notFoundResponse('Designation not found');
        }
        return $this->resourceResponse(new DesignationResource($designation),'Designation retrieved successfully');
    }


    public function update(UpdateDesignationRequest $request, $id): JsonResponse
    {
        if(!$designation = Designation::with('department')->findOrFail($id)){
            return $this->notFoundResponse('Designation not found');
        }
        $designation->update([
            'designation' => $request->designation,
            'description' => $request->description,
            'department_id' => $request->department_id,
        ]);
        return $this->resourceResponse(new DesignationResource($designation),'Designation updated successfully');
    }


    public function destroy($id): JsonResponse
    {
        if(!$designation = Designation::findOrFail($id)){
            return $this->notFoundResponse('Designation not found');
        }
        $designation->delete();
        return $this->successResponse('Designation deleted successfully');
    }
}
