<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use App\Http\Resources\ExperienceResource;
use App\Models\Experience;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {

        if (!$experiences= Experience::where('user_id', auth()->user()->id)->with('user')->paginate(15)) {
            return $this->notFoundResponse('not found resource');
        }
        return $this->resourceCollectionResponse(ExperienceResource::collection($experiences),'all experiences found');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreExperienceRequest $request
     * @return JsonResponse
     */
    public function store(StoreExperienceRequest $request): JsonResponse
    {
        $experience = Experience::create([
            "user_id" => Auth::user()->id,
            "name" => $request->name,
            "institution" => $request->institution,
            "start_date" => $request->start_date,
            "end_date"=> $request->end_date,
        ]);
        if (!$experience) {
            return $this->badRequestResponse(' an error occurred');
        }
        return $this->createdResponse('experience added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (!$experience = Experience::with('user')->findOrFail($id)){
            return $this->notFoundResponse('no experience found with that ID');
        }
        return $this->resourceResponse(new ExperienceResource($experience), 'Experience found successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateExperienceRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateExperienceRequest $request, $id): JsonResponse
    {
        if (!$experience = Experience::with('user')->findOrFail($id)){
            return $this->notFoundResponse('no experience found with that ID');
        }
        $experience->update($request->validated());
        return $this->resourceResponse(new ExperienceResource($experience), 'Experience updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if (!$experience = Experience::with('user')->findOrFail($id)){
            return $this->notFoundResponse('no experience found with that ID');
        }
        $experience->delete();
        return $this->noContentResponse();
    }

}
