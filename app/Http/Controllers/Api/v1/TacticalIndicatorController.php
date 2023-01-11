<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTacticalIndicatorRequest;
use App\Http\Requests\UpdateTacticalIndicatorRequest;
use App\Http\Resources\TacticalIndicatorResource;
use App\Models\TacticalIndicator;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;

class TacticalIndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index():JsonResponse
    {
        if (!$tacticalIndicator=QueryBuilder::for(TacticalIndicator::class)
        ->allowedFilters(['code','description','status','responsible','trust'])
        ->with(['tacticalGoal','responsible'])->latest()->paginate(15)) {
            return $this->notFoundResponse('not found tactical indicator');
        }
        return $this->resourceResponse(TacticalIndicatorResource::collection($tacticalIndicator),'All tactcal indicators found');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTacticalIndicatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTacticalIndicatorRequest $request)
    {
        if (! TacticalIndicator::create([
            'code' => IdGenerator::generate([
                'table' => 'tactical_indicators',
                'field' => 'code',
                'length' => 10,
                'prefix' => 'ITO-',
            ]),
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'weight'=>$request->weight,
            'tactical_goal_id'=>$request->tactical_goal_id,
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
        return $this->createdResponse('Tactical Indicator created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$tacticalGoal = TacticalIndicator::with(['tacticalGoal','responsible'])->findOrFail($id)) {
            return $this->notFoundResponse('no found tactical indicator');
        }
        return $this->resourceResponse(new TacticalIndicatorResource($tacticalGoal),'Indicator found successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTacticalIndicatorRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTacticalIndicatorRequest $request, $id)
    {
        if (!$tacticalGoal = TacticalIndicator::with(['tacticalGoal','responsible'])->findOrFail($id)) {
            return $this->notFoundResponse('no found tactical indicator');
        }
        $tacticalGoal->update($request->validated());
        return $this->acceptedResponse('Indicator updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if (!$tacticalGoal = TacticalIndicator::with(['tacticalGoal','responsible'])->findOrFail($id)) {
            return $this->notFoundResponse('no found tactical indicator');
        }
        $tacticalGoal->delete();
        return $this->noContentResponse();
    }
}
