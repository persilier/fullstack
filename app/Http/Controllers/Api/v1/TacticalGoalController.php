<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTacticalGoalRequest;
use App\Http\Requests\UpdateTacticalGoalRequest;
use App\Http\Resources\TacticalGoalResource;
use App\Models\TacticalGoal;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;

class TacticalGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if (!$tactGoals=QueryBuilder::for(TacticalGoal::class)
        ->allowedFilters(['code','description','status','responsible','department.department'])
        ->with(['strategicalGoal','department','responsible','tacticalIndicators'])->paginate(15)) {
            return $this->notFoundResponse('no resource found');
        }
        return $this->resourceCollectionResponse(TacticalGoalResource::collection($tactGoals),'All tactical resource found');
    }
    public function listAll()
    {
        if (!$tactGoals=TacticalGoal::all()) {
            return $this->notFoundResponse('no resource found');
        }
        return $this->resourceCollectionResponse(TacticalGoalResource::collection($tactGoals),'All tactical resource found');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTacticalGoalRequest  $request
     * @return JsonResponse
     */
    public function store(StoreTacticalGoalRequest $request)
    {
        if (! TacticalGoal::create([
            'code' => IdGenerator::generate([
                'table' => 'tactical_goals',
                'field' => 'code',
                'length' => 10,
                'prefix' => 'TCO-',
            ]),
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'type'=>$request->type,
            'department_id'=>$request->department_id,
            'strategical_goal_id'=>$request->strategical_goal_id,
            'weight'=>$request->weight,
            'responsible'=>$request->responsible,
            'status'=>$request->status,
        ])) {
            return $this->badRequestResponse('an error occurred');
        }
        return $this->createdResponse('a new tactical Goal created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function show($id):JsonResponse
    {
         if (!$tacticalGoal= TacticalGoal::with(['strategicalGoal','department','responsible','tacticalIndicators'])->findOrfail($id)) {
            return $this->notFoundResponse('not found resource');
        }
        return $this->resourceResponse(new TacticalGoalResource($tacticalGoal),'tactical goal found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTacticalGoalRequest  $request
     * @param  $id
     * @return JsonResponse
     */
    public function update(UpdateTacticalGoalRequest $request, $id):JsonResponse
    {
         if (!$tacticalGoal= TacticalGoal::findOrfail($id)) {
            return $this->notFoundResponse('not found resource');
        }
        $tacticalGoal->update($request->validated());
        return $this->resourceResponse(new TacticalGoalResource($tacticalGoal),'tactical goal updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if (!$tacticalGoal= TacticalGoal::findOrfail($id)) {
            return $this->notFoundResponse('not found resource');
        }
        $tacticalGoal->delete();
        return $this->noContentResponse();
    }
}
