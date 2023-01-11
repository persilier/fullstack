<?php

namespace App\Http\Controllers\Api\v1;

use App\ApiCode;
use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionResource;
use App\Models\User;
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

class PermissionController extends Controller
{


    public function index(): Response
    {
        $permissions = Permission::paginate(15);
        if(!$permissions){
            return $this->notFoundResponse('no permissions found');
        }
        return $this->resourceCollectionResponse(PermissionResource::collection($permissions)
            ,'All permissions retrieve successfully', true, 200);

    }

    public function store(Request $request): Response
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $permission = Permission::create($validated);
        if (!$permission){
            return $this->validationFailedResponse($validated);
        }
        return $this->resourceResponse(new PermissionResource($permission),'permission created successfully', 200);


    }

    public function show($id): Response
    {
       if(!$permission = Permission::findOrFail($id)){
         return $this->notFoundResponse('no permission found with that id')  ;
       }

        return $this->resourceResponse(new PermissionResource($permission),'Permission Found',200);

    }

    public function update(Request $request, $id): Response
    {
        if(!$permission = Permission::findOrFail($id)){
            return $this->notFoundResponse('no permission found with that id')  ;
        }
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $permission->update($validated);
        if(!$validated){
            return $this->validationFailedResponse($validated);
        }
        return $this->resourceResponse(new PermissionResource($permission),'Permission updated successfully');
    }


    public function destroy(Permission $permission): JsonResponse|Response
    {
        $permission->delete();
        if(!$permission){
            return $this->badRequestResponse('an error occurred while deleting the permission');
        }
        return $this->successResponse('Permission deleted');
    }

    public function assignRole(Role $role, Permission $permission): Response
    {
        if($permission->hasRole($role)){
            return $this->badRequestResponse('permission already assigned');
        }
        $permission->assignRole($role);

        return $this->successResponse('role assigned successfully');

    }


    public function removeRole(Role $role, Permission $permission): Response
    {
        if($permission->hasRole($role)){
            $permission->removeRole($role);
            return $this->successResponse('role removed successfully');
        }
        return $this->notFoundResponse('permission not found');
    }
}
