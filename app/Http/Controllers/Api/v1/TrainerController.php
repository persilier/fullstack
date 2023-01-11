<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;
use App\Http\Resources\TrainerResource;
use App\Models\Trainer;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
       if (!$trainers =QueryBuilder::for(Trainer::class)
           ->allowedFilters(['first_name'])
           ->latest()->paginate(15)) {
           return $this->notFoundResponse('not found resource');
       }
       return $this->resourceCollectionResponse(TrainerResource::collection($trainers), 'all trainers retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTrainerRequest $request
     * @return JsonResponse
     */
    public function store(StoreTrainerRequest $request)
    {
        if (!$trainer= Trainer::create($request->validated())) {
            return $this->badRequestResponse('an error occurred');
        }
        if ($request->hasFile('picture_url')) {
            $trainer->addMediaFromRequest('picture_url')->toMediaCollection('trainer');
        }
        return $this->createdResponse('trainer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (!$trainer = Trainer::findOrFail($id)) {
            return $this->notFoundResponse('not found trainer');
        }
        return $this->resourceResponse(new TrainerResource($trainer),'resource trainer found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTrainerRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateTrainerRequest $request, $id): JsonResponse
    {
        if (!$trainer = Trainer::findOrFail($id)) {
            return $this->notFoundResponse('not found trainer');
        }
        $trainer->update($request->validated());
        if ($request->hasFile('picture_url')){
            $trainer->addMediaFromRequest('picture_url')->toMediaCollection('trainer');
        }
        return $this->resourceResponse(new TrainerResource($trainer),'trainer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if (!$trainer = Trainer::findOrFail($id)) {
            return $this->notFoundResponse('not found trainer');
        }
        $trainer->delete();
        return $this->noContentResponse();
    }
    public function listTrainers(): JsonResponse
    {
        $trainers = Trainer::all();
        return $this->resourceCollectionResponse(TrainerResource::collection($trainers),'list of trainers available');
    }
}
