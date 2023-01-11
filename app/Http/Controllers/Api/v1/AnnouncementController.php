<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use App\Http\Resources\AnnouncementResource;
use App\Models\Announcement;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if (
            !$announcement = QueryBuilder::for (Announcement::class)
                ->allowedFilters([
                    'department.department',
                    'announcer.first_name'
                ])
                ->with([
                    'company',
                    'department',
                    'announcer',
                ])->latest()->paginate(15)
        ) {
            return $this->notFoundResponse('no resource available');
        }
        return $this->resourceCollectionResponse(AnnouncementResource::collection($announcement), 'all announcement available');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAnnouncementRequest $request
     * @return JsonResponse
     */
    public function store(StoreAnnouncementRequest $request): JsonResponse
    {
        if (!Announcement::create($request->validated())) {
            return $this->badRequestResponse('an error occurred');
        }
        return $this->createdResponse('announcement created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (
            !$announcement = Announcement::with([
                'company',
                'department',
                'announcer',
            ])
                ->findOrFail($id)
        ) {
            return $this->notFoundResponse('not found announcement');
        }
        return $this->resourceResponse(new AnnouncementResource($announcement), 'announcement found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAnnouncementRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateAnnouncementRequest $request, $id): JsonResponse
    {
        if (
            !$announcement = Announcement::with([
                'company',
                'department',
                'announcer',
            ])
                ->findOrFail($id)
        ) {
            return $this->notFoundResponse('not found announcement');
        }
        $announcement->update($request->validated());
        return $this->resourceResponse(new AnnouncementResource($announcement), 'announcement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if (
            !$announcement = Announcement::with([
                'company',
                'department',
                'announcer',
            ])
                ->findOrFail($id)
        ) {
            return $this->notFoundResponse('not found announcement');
        }
        $announcement->delete();
        return $this->noContentResponse();
    }


}
