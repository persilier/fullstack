<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStrategicalIndicatorRequest;
use App\Http\Requests\UpdateStrategicalIndicatorRequest;
use App\Http\Resources\StrategicalIndicatorResource;
use App\Models\StrategicalIndicator;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;

class StrategicalIndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if (!$strategicalIndicator=QueryBuilder::for(StrategicalIndicator::class)
            ->with(['strategicalGoal','responsible'])
            ->allowedFilters(['code','description','status','responsible','trust'])
            ->latest()->paginate(15)) {
            return $this->notFoundResponse('not found strategical indicators');
        }
        return $this->resourceCollectionResponse(StrategicalIndicatorResource::collection($strategicalIndicator), 'All strategical indicators found');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStrategicalIndicatorRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(StoreStrategicalIndicatorRequest $request): JsonResponse
    {
        if (! StrategicalIndicator::create([
            'code' => IdGenerator::generate([
                'table' => 'strategical_indicators',
                'field' => 'code',
                'length' => 10,
                'prefix' => 'IKO-',
            ]),
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'weight'=>$request->weight,
            'strategical_goal_id'=>$request->strategical_goal_id,
            'responsible'=>$request->responsible,
            'status'=>$request->status,
            'trust'=>$request->trust,
            'init_value'=>$request->init_value,
            'target'=>$request->target,
            'current_value'=>$request->current_value,
            'progress'=>$request->progress,
            'comments'=>$request->comments,
            'next_step'=>$request->next_step
        ])) {
            return $this->badRequestResponse('an error occurred');
        }
        return $this->createdResponse('Strategical indicator created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (!$strategicalIndicator= StrategicalIndicator::with(['strategicalGoal'=>['responsible'],'responsible'])->findOrFail($id)) {
            return $this->notFoundResponse('No strategical Indicator found');
        }
        return $this->resourceResponse(new StrategicalIndicatorResource($strategicalIndicator),'strategical Indicator found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStrategicalIndicatorRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateStrategicalIndicatorRequest $request, $id): JsonResponse
    {
        if (!$strategicalIndicator= StrategicalIndicator::with(['strategicalGoal','responsible'])->findOrFail($id)) {
            return $this->notFoundResponse('No strategical Indicator found');
        }
        $strategicalIndicator->update($request->validated());
        return $this->acceptedResponse('Strategical Indicator updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if (!$strategicalIndicator= StrategicalIndicator::findOrFail($id)) {
            return $this->notFoundResponse('No strategical Indicator found');
        }
        $strategicalIndicator->delete();
        return $this->noContentResponse();
    }
}
