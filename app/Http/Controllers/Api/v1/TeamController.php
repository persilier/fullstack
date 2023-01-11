<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\JsonResponse;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTeamRequest $request
     * @return JsonResponse
     */
    public function store(StoreTeamRequest $request): JsonResponse
    {
        if (! Team::create($request->validated())) {
            return $this->badRequestResponse('an error occurred');
        }
        return $this->createdResponse('Team created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (!$team= Team::with(['department','teamMembers'=>['employee','team']])->findOrFail($id)) {
            return $this->notFoundResponse('No team found with that ID');
        }
        return $this->resourceResponse(new TeamResource($team),'found team successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTeamRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateTeamRequest $request, $id): JsonResponse
    {
        if (!$team= Team::with(['department','teamMembers'=>['employee','team']])->findOrFail($id)) {
            return $this->notFoundResponse('No team found with that ID');
        }
        $team->update($request->validated());
        return $this->resourceResponse(new TeamResource($team),'updated team successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if (!$team= Team::findOrFail($id)) {
            return $this->notFoundResponse('No team found with that ID');
        }
        $team->delete();
        return $this->noContentResponse();
    }
}
