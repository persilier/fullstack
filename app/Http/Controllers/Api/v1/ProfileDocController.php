<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfile_DocRequest;
use App\Http\Requests\UpdateProfile_DocRequest;
use App\Http\Resources\ProfileDocResource;
use App\Models\Profile_Doc;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProfileDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if (!$profileDocs= Profile_Doc::with('user')->where('user_id',auth()->user()->id)->get()) {
            return $this->notFoundResponse('not found profiledoc attached to this user');
        }
        return $this->resourceCollectionResponse(ProfileDocResource::collection($profileDocs),'all users profileDoc retrieved');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProfile_DocRequest $request
     * @return JsonResponse
     */
    public function store(StoreProfile_DocRequest $request): JsonResponse
    {
       $profileDoc =Profile_Doc::create([
           "user_id" => Auth::user()->id,
           'name'=>$request->name,
           'description'=>$request->description,
           'filePath'=>$request->filePath,
       ]);
       if (!$profileDoc){
           return $this->badRequestResponse('an error occurred');
       }

        if ($request->hasFile('filePath')) {
           $profileDoc->addMediaFromRequest('filePath')
               ->usingName($profileDoc->name)
               ->toMediaCollection('profileDoc');
        }
        return $this->createdResponse('profileDoc created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (!$profileDoc= Profile_Doc::with('user')->findOrFail($id)) {
            return $this->notFoundResponse('not found ProfileDoc');
        }
        return $this->resourceResponse(new ProfileDocResource($profileDoc), 'profile doc found successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProfile_DocRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateProfile_DocRequest $request, $id): JsonResponse
    {
        if (!$profileDoc= Profile_Doc::with('user')->findOrFail($id)) {
            return $this->notFoundResponse('not found ProfileDoc');
        }
        $profileDoc->update($request->validated());
        if ($request->hasFile('filePath')) {
           $profileDoc->addMediaFromRequest('filePath')->toMediaCollection('profileDoc');
        }
        return $this->resourceResponse(new ProfileDocResource($profileDoc),'profile doc updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if (!$profileDoc= Profile_Doc::with('user')->findOrFail($id)) {
            return $this->notFoundResponse('not found ProfileDoc');
        }
        $profileDoc->delete();
        return $this->noContentResponse();

    }

    public function download($id): BinaryFileResponse
    {
        $document = Profile_Doc::with('user')->findOrFail($id);
        $media = $document->getFirstMedia('profileDoc');
        return response()->download($media->getPath(), $media->file_name);
    }
}
