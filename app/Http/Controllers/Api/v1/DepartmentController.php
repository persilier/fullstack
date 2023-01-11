<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class DepartmentController extends Controller
{


    public function index(): Response
    {
        if (!$departments=QueryBuilder::for(Department::class)
            ->with(['users','teams'=>['teamMembers'=>['employee:id,first_name,last_name,avatar','team:id,name']]])
            ->allowedFilters(['department'])
            ->paginate(10)) {
            return $this->notFoundResponse('Department resource not found');
        }
        return $this->resourceCollectionResponse(DepartmentResource::collection($departments),
            'all departments retrieve successfully', true, 200);
    }



    public function store(StoreDepartmentRequest $request): JsonResponse
    {
        if (!$department=Department::create($request->validated())) {
            return $this->badRequestResponse('an error occurred while creating department');
        }
        return $this->resourceResponse(new DepartmentResource($department),'department create successfully');

    }


    public function show($id): JsonResponse
    {
        if (!$department=Department::with(['users','teams', 'teams'=>['teamMembers'=>['employee:id,first_name,last_name,avatar','team:id,name']]])
            ->findOrFail($id)) {
            return $this->notFoundResponse('Department not found');
        }
        return $this->resourceResponse(new DepartmentResource($department),'Department retrieved successfully');
    }


    public function update(UpdateDepartmentRequest $request, $id): JsonResponse
    {
        if (!$department =Department::findOrFail($id)) {
            return $this->notFoundResponse('Department not found');
        }
        $department->update($request->validated());
        return $this->resourceResponse(new DepartmentResource($department),'Department updated successfully');
    }


    public function destroy($id): JsonResponse
    {
        if(!$department =Department::findOrFail($id)){
            return $this->notFoundResponse('Department not found');
        }
        $department->delete();

        return $this->successResponse('Department deleted successfully');
    }

    public function listDepartments(): JsonResponse
    {
        if(!$departments = Department::all()){
            return $this->notFoundResponse('not found list department');
        }
        return $this->resourceCollectionResponse(DepartmentResource::collection($departments),
            'all list departments retrieve successfully', true, 200);
    }
}
