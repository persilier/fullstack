<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Http\Resources\TrainingResource;
use App\Models\Training;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if (!$trainings=QueryBuilder::for(Training::class)
            ->allowedFilters(['employee.last_name','skill.title','trainer.last_name',
                AllowedFilter::scope('starts_before'),
                AllowedFilter::scope('ends_after')])
            ->with(['employee', 'skill', 'trainer'])
            ->latest()
            ->paginate(15)) {
            return $this->notFoundResponse('not found resource');
        }
        return $this->resourceCollectionResponse(TrainingResource::collection($trainings),'all training retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTrainingRequest $request
     * @return JsonResponse
     */
    public function store(StoreTrainingRequest $request): JsonResponse
    {
        if (! Training::create($request->validated())) {
            return $this->badRequestResponse('an error occurred');
        }
        return $this->createdResponse('training created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (!$training= Training::with(['employee', 'skill', 'trainer'])->findOrFail($id)) {
            return $this->notFoundResponse('not found training');
        }
        return $this->resourceResponse(new TrainingResource($training),'training found successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTrainingRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateTrainingRequest $request, $id)
    {
        if (!$training= Training::with(['employee', 'skill', 'trainer'])->findOrFail($id)) {
            return $this->notFoundResponse('not found training');
        }
        $training->update($request->validated());
        return $this->resourceResponse(new TrainingResource($training),'training updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */

    public function destroy($id): JsonResponse
    {
        if (!$training= Training::with(['employee', 'skill', 'trainer'])->findOrFail($id)) {
            return $this->notFoundResponse('not found training');
        }
        $training->delete();
        return $this->noContentResponse();
    }

}
