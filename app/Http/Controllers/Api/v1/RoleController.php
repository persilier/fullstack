<?php

namespace App\Http\Controllers\Api\v1;

use App\ApiCode;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use MarcinOrlowski\ResponseBuilder\Exceptions\ArrayWithMixedKeysException;
use MarcinOrlowski\ResponseBuilder\Exceptions\ConfigurationNotFoundException;
use MarcinOrlowski\ResponseBuilder\Exceptions\IncompatibleTypeException;
use MarcinOrlowski\ResponseBuilder\Exceptions\InvalidTypeException;
use MarcinOrlowski\ResponseBuilder\Exceptions\MissingConfigurationKeyException;
use MarcinOrlowski\ResponseBuilder\Exceptions\NotIntegerException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class RoleController extends Controller
{

    public function index(): Response
    {
        if(!$roles=Role::with(['permissions'])->paginate(15)){
            return $this->notFoundResponse('No roles_count');
        }

        return $this->resourceCollectionResponse(RoleResource::collection($roles),
            'All roles retrieved successfully', true, 200);

    }

    public function store(Request $request): Response
    {
        $validated=$request->validate(['name'=>['required','min:3']]);

        $role=Role::create($validated);
        if(!$role){
            return $this->validationFailedResponse($validated);
        }
        return $this->resourceResponse(new RoleResource($role),'Role created successfully');
    }


    public function show(Role $role): Response
    {
        return $this->resourceResponse(new RoleResource($role),'Role retrieved successfully');

    }

    public function update(Request $request, Role $role): Response
    {
        $validated=$request->validate(['name'=>['required','min:3']]);
        $role->update($validated);
        if(!$role){
            return $this->validationFailedResponse($validated);
        }
        return $this->resourceResponse(new RoleResource($role),'Role updated successfully');
    }


    public function destroy(Role $role): JsonResponse|Response
    {
        $role->delete();
        if(!$role){
            return $this->badRequestResponse('an error occurred while deleting');
        }
        return $this->successResponse('Role deleted');
    }


    public function givePermission(Request $request, Role $role): Response
    {
        if ($role->hasPermissionTo($request->permission)) {
            return $this->forbiddenResponse('conflicting permissions');
        }
        $role->givePermissionTo($request->permission);

        return $this->successResponse('permission given successfully');
    }


    public function revokePermission(Role $role, Permission $permission): Response
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermission($permission);
            return $this->successResponse('permission revoked successfully');
        }
        return $this->notFoundResponse('not found');

    }
}
