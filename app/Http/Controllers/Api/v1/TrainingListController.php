<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrainingListRequest;
use App\Http\Requests\UpdateTrainingListRequest;
use App\Http\Resources\TrainingListResource;
use App\Models\TrainingList;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TrainingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if (!$type=TrainingList::latest()->get()) {
            return $this->notFoundResponse('not found resource type');
        }
        return $this->resourceCollectionResponse(TrainingListResource::collection($type),'all types retrieved');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTrainingListRequest $request
     * @return JsonResponse
     */
    public function store(StoreTrainingListRequest $request): JsonResponse
    {
        if (!TrainingList::create($request->validated())) {
            return $this->badRequestResponse('an error occurred');
        }
        return $this->createdResponse('training item list created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
       if (!$type= TrainingList::findOrFail($id)) {
           return $this->notFoundResponse('not found resource');
       }
       return $this->resourceResponse(new TrainingListResource($type),'item list found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTrainingListRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateTrainingListRequest $request, $id): JsonResponse
    {
        if (!$type= TrainingList::findOrFail($id)) {
            return $this->notFoundResponse('not found resource');
        }
        $type->update($request->validated());
        return $this->resourceResponse(new TrainingListResource($type),'item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        if (!$type= TrainingList::findOrFail($id)) {
            return $this->notFoundResponse('not found resource');
        }
        $type->delete();
        return $this->noContentResponse();
    }
}
