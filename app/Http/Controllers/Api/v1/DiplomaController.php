<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiplomaRequest;
use App\Http\Requests\UpdateDiplomaRequest;
use App\Http\Resources\DiplomaResource;
use App\Models\Diploma;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if (!$diplomas= Diploma::with('user')->latest()->paginate(15)) {
            return $this->notFoundResponse('not found resource');
        }
        return $this->resourceCollectionResponse(DiplomaResource::collection($diplomas),'all diplomas retrieved');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDiplomaRequest $request
     * @return JsonResponse
     */
    public function store(StoreDiplomaRequest $request): JsonResponse
    {
        $diploma = Diploma::create([
            "user_id" => Auth::user()->id,
            "name" => $request->name,
            "institution" => $request->institution,
            "years" => $request->years,
            "diplomas"=> $request->diplomas,
        ]);
        if (!$diploma) {
            return $this->badRequestResponse('an error occurred');
        }
        if ($request->hasFile('diplomas')) {
            $diploma->addMediaFromRequest('diplomas')->toMediaCollection('diplomas');
        }
        return  $this->createdResponse('diploma created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (!$diploma= Diploma::with('user')->findOrFail($id)) {
            return $this->notFoundResponse('not found diploma with that ID');
        }
        return $this->resourceResponse(new DiplomaResource($diploma),'Diploma found successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDiplomaRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateDiplomaRequest $request, $id): JsonResponse
    {
        if (!$diploma = Diploma::with('user')->findOrFail($id)) {
            return $this->notFoundResponse('not found diploma with that ID');
        }
        $diploma->update($request->validated());

        if ($request->hasFile('diplomas')){
            $diploma->addMediaFromRequest('diplomas')->toMediaCollection('diplomas');
        }
        return $this->resourceResponse(new DiplomaResource($diploma), 'Diploma updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if (!$diploma = Diploma::with('user')->findOrFail($id)) {
            return $this->notFoundResponse('not found diploma with that ID');
        }
        $diploma->delete();
        return $this->noContentResponse();
    }

    public function download($id): BinaryFileResponse
    {
        $diploma = Diploma::findOrFail($id);
        $media = $diploma->getFirstMedia('diplomas');
        return response()->download($media->getPath(), $media->file_name);
    }
}
