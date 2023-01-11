<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWarningRequest;
use App\Http\Requests\UpdateWarningRequest;
use App\Http\Resources\WarningResource;
use App\Models\Warning;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

class WarningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if(!$warnings=QueryBuilder::for(Warning::class)
            ->allowedFilters(['WarningTo.first_name','WarningType.warning_title'])
            ->with(['WarningTo','company','WarningType'])->latest()->paginate(15)){
           return $this->notFoundResponse('not found resources');
        }
        return $this->resourceCollectionResponse(WarningResource::collection($warnings),
            'all warnings resources available');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWarningRequest $request
     * @return JsonResponse
     */
    public function store(StoreWarningRequest $request): JsonResponse
    {
        if(!$warning=Warning::create($request->validated())){
            return $this->badRequestResponse('an error occurred');
        }
        return $this->createdResponse('warning created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if(!$warning=Warning::with(['WarningTo','company','WarningType','WarningTo.roles'])->findOrFail($id)){
            return $this->notFoundResponse('not found warning');
        }
        return $this->resourceResponse(new WarningResource($warning),'warning found successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWarningRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateWarningRequest $request, $id): JsonResponse
    {
        if(!$warning=Warning::with(['WarningTo','company','WarningType'])->findOrFail($id)){
            return $this->notFoundResponse('not found warning');
        }
        $warning->update($request->validated());
        return $this->resourceResponse(new WarningResource($warning),'Warning update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if(!$warning=Warning::with(['WarningTo','company','WarningType'])->findOrFail($id)){
            return $this->notFoundResponse('not found warning');
        }
        $warning->delete();
        return $this->noContentResponse();
    }
}
