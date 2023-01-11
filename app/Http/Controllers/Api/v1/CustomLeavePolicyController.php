<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomLeavePolicyRequest;
use App\Http\Requests\UpdateCustomLeavePolicyRequest;
use App\Http\Resources\CustomLeavePolicyResource;
use App\Models\CustomLeavePolicy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CustomLeavePolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if (!$leaveType= CustomLeavePolicy::with(['LeaveType','user'])->latest()->get()) {
            return $this->notFoundResponse('not found resource');
        }
        return $this->resourceCollectionResponse(CustomLeavePolicyResource::collection($leaveType),'all resource retrieved');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCustomLeavePolicyRequest $request
     * @return JsonResponse
     */
    public function store(StoreCustomLeavePolicyRequest $request): JsonResponse
    {
        if (! CustomLeavePolicy::create($request->validated())) {
                return $this->badRequestResponse('an error occured');
        }
        return $this->createdResponse('customLeavePolicy created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (!$CustomLeavePolicy = CustomLeavePolicy::with(['LeaveType','user'])->findOrFail($id)) {
            return $this->notFoundResponse('no CustomLeavePolicy found');
        }
        return $this->resourceResponse(new CustomLeavePolicyResource($CustomLeavePolicy),'CustomLeavePolicy found successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCustomLeavePolicyRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateCustomLeavePolicyRequest $request,$id): JsonResponse
    {
        if (!$CustomLeavePolicy= CustomLeavePolicy::with(['user','LeaveType'])->findOrFail($id)) {
            return $this->notFoundResponse('no CustomLeavePolicy found');
        }
        $CustomLeavePolicy->update($request->validated());
        return $this->resourceResponse(new CustomLeavePolicyResource($CustomLeavePolicy),'CustomLeavePolicy updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if (!$CustomLeavePolicy= CustomLeavePolicy::with('user')->findOrFail($id)) {
            return $this->notFoundResponse('no CustomLeavePolicy found');
        }
        $CustomLeavePolicy->delete();
        return $this->noContentResponse();
    }
}
