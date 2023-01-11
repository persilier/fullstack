<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamMemberRequest;
use App\Http\Requests\UpdateTeamMemberRequest;
use App\Http\Resources\TeamMemberResource;
use App\Models\TeamMember;
use Illuminate\Http\JsonResponse;

class TeamMemberController extends Controller
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
     * @param StoreTeamMemberRequest $request
     * @return JsonResponse
     */
    public function store(StoreTeamMemberRequest $request): JsonResponse
    {
        if (!TeamMember::create($request->validated())) {
            return $this->badRequestResponse('an error occured');
        }
        return $this->createdResponse('a team member has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (!$teamMember= TeamMember::with(['employee','team'])->findOrFail($id)) {
            return $this->notFoundResponse('no team member found');
        }
        return $this->resourceResponse(new TeamMemberResource($teamMember),'team member found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTeamMemberRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateTeamMemberRequest $request, $id): JsonResponse
    {
        if (!$teamMember= TeamMember::with(['employee','team'])->findOrFail($id)) {
            return $this->notFoundResponse('no team member found');
        }
        $teamMember->update($request->validated());
        return $this->acceptedResponse('Team member successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if (!$teamMember= TeamMember::findOrFail($id)) {
            return $this->notFoundResponse('no team member found');
        }
        $teamMember->delete();
        return $this->noContentResponse();
    }
}
