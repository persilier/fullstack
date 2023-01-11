<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStrategicalGoalRequest;
use App\Http\Requests\UpdateStrategicalGoalRequest;
use App\Http\Resources\StrategicalGoalResource;
use App\Models\StrategicalGoal;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

class StrategicalGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if (!$strategicGoal= QueryBuilder::for(StrategicalGoal::class)
            ->with(['strategicalIndicator','responsible'])
            ->allowedFilters(['code','description','status','responsible'])
            ->latest()
            ->paginate(15)) {
            return $this->notFoundResponse('No resource Found');
        }
        return $this->resourceCollectionResponse(StrategicalGoalResource::collection($strategicGoal), 'All strategics goals found');
    }

    public function listAll(): JsonResponse
    {
        if (!$strategicGoal= StrategicalGoal::all()) {
            return $this->notFoundResponse('No resource Found');
        }
        return $this->resourceCollectionResponse(StrategicalGoalResource::collection($strategicGoal), 'All strategics goals found');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStrategicalGoalRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(StoreStrategicalGoalRequest $request): JsonResponse
    {
        if (! StrategicalGoal::create([
            'code' => IdGenerator::generate([
                'table' => 'strategical_goals',
                'field' => 'code',
                'length' => 10,
                'prefix' => 'STO-',
            ]),
            'description'=>$request->description,
            'start_year'=>$request->start_year,
            'end_year'=>$request->end_year,
            'company_id'=>$request->company_id,
            'weight'=>$request->weight,
            'responsible'=>$request->responsible,
            'status'=>$request->status,
        ])) {
            return $this->badRequestResponse('an error occurred');
        }
        return $this->createdResponse('a new strategical Goal created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (!$strategicalGoal= StrategicalGoal::with(['strategicalIndicator'=>['responsible'],'responsible'])->findOrFail($id)) {
            return $this->notFoundResponse('no strategical Goal found');
        }
        return $this->resourceResponse(new StrategicalGoalResource($strategicalGoal), 'resource found successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStrategicalGoalRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateStrategicalGoalRequest $request, $id): JsonResponse
    {
        if (!$strategicalGoal= StrategicalGoal::with(['strategicalIndicator','responsible'])->findOrFail($id)) {
            return $this->notFoundResponse('no strategical Goal found');
        }
        $strategicalGoal->update($request->validated());
        return $this->acceptedResponse('strategical Goal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if (!$strategicalGoal= StrategicalGoal::findOrFail($id)) {
            return $this->notFoundResponse('no strategical Goal found');
        }
        $strategicalGoal->delete();
        return $this->noContentResponse();
    }
}
