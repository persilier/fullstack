<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use App\Http\Resources\ComplaintResource;
use App\Models\Complaint;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if(!$complaints=QueryBuilder::for(Complaint::class)
            ->allowedFilters(['complaint_from_employee.first_name','complaint_against_employee.first_name'])
            ->with(['company','complaint_from_employee','complaint_against_employee',
                'complaint_from_employee.roles','complaint_against_employee.roles'])
            ->latest()->paginate(15)){
            return $this->notFoundResponse('not found resource');
        }
        return $this->resourceCollectionResponse(ComplaintResource::collection($complaints),
            'all complaints retrieved');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreComplaintRequest $request
     * @return JsonResponse
     */
    public function store(StoreComplaintRequest $request): JsonResponse
    {
        if(!$complaint= Complaint::create($request->validated())){
            return $this->badRequestResponse('an error occurred');
        }
        return $this->createdResponse('complaint created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if(!$complaint= Complaint::with(['company','complaint_from_employee','complaint_against_employee'])
            ->findOrFail($id)){
            return $this->notFoundResponse('not found complaint');
        }
        return $this->resourceResponse(new ComplaintResource($complaint),'complaint retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateComplaintRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateComplaintRequest $request, $id): JsonResponse
    {
        if(!$complaint= Complaint::with(['company','complaint_from_employee','complaint_against_employee'])
            ->findOrFail($id)){
            return $this->notFoundResponse('not found complaint');
        }
        $complaint->update($request->validated());
        return $this->resourceResponse(new ComplaintResource($complaint),'complaint updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if(!$complaint= Complaint::with(['company','complaint_from_employee','complaint_against_employee'])
            ->findOrFail($id)){
            return $this->notFoundResponse('not found complaint');
        }
        $complaint->delete();
        return $this->noContentResponse();
    }
}
