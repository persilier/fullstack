<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeaveTypeRequest;
use App\Http\Requests\UpdateLeaveTypeRequest;
use App\Http\Resources\LeaveTypeResource;
use App\Models\LeaveType;
use Illuminate\Http\JsonResponse;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if (!$leaveType= LeaveType::with([
            'customLeavePolicy',
            'customLeavePolicy.users','customLeavePolicy.LeaveType'])->latest()->get()) {
            return $this->notFoundResponse('not found resource');
        }
        return $this->resourceCollectionResponse(LeaveTypeResource::collection($leaveType), 'all leaves types available');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLeaveTypeRequest $request
     * @return JsonResponse
     */
    public function store(StoreLeaveTypeRequest $request): JsonResponse
    {
        if (!$leaveType = LeaveType::create($request->validated())) {
            return $this->badRequestResponse('an error occured');
        }
        return $this->createdResponse('a new leave type created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (!$leaveType = LeaveType::with(['customLeavePolicy','customLeavePolicy.users','customLeavePolicy.LeaveType'])->findOrFail($id)) {
            return $this->notFoundResponse('not found with that ID');
        }
        return $this->resourceResponse(new LeaveTypeResource($leaveType),'found the resource successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLeaveTypeRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateLeaveTypeRequest $request, $id): JsonResponse
    {
        if (!$leaveType = LeaveType::with('customLeavePolicy','customLeavePolicy.users','customLeavePolicy.LeaveType')->findOrFail($id)) {
            return $this->notFoundResponse('not found with that ID');
        }
        $leaveType->update($request->validated());
        return $this->resourceResponse(new LeaveTypeResource($leaveType),'updated the resource successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if (!$leaveType = LeaveType::findOrFail($id)) {
            return $this->notFoundResponse('not found with that ID');
        }
        $leaveType->delete();
        return $this->noContentResponse();
    }
}
