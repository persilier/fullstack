<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAwardRequest;
use App\Http\Requests\UpdateAwardRequest;
use App\Http\Resources\AwardResource;
use App\Models\Award;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class AwardController extends Controller
{

    public function index(): JsonResponse
    {
        if (
            !$awards = QueryBuilder::for (Award::class)->relations()
                ->allowedFilters([
                    'awardType.award_name',
                    'employee.first_name',
                    'department.department',
                    AllowedFilter::scope('starts_before'),
                    AllowedFilter::scope('ends_after')
                ])
                ->latest()->paginate(15)
        ) {
            return $this->notFoundResponse('no awards resource available');
        }
        return $this->resourceCollectionResponse(AwardResource::collection($awards), 'awards resource available');

    }


    public function store(StoreAwardRequest $request): JsonResponse
    {
        if (!$award = Award::create($request->validated())) {
            return $this->badRequestResponse('failed to create award');
        }

        if ($request->hasFile('award_photo')) {
            $award->addMediaFromRequest('award_photo')->toMediaCollection('awards');
        }
        return $this->resourceResponse(new AwardResource($award), 'award created successfully');

    }


    public function show($id): JsonResponse
    {
        if (!$award = Award::relations()->findOrFail($id)) {
            return $this->notFoundResponse('failed to find award');
        }
        return $this->resourceResponse(new AwardResource($award), 'award find successfully');

    }


    public function update(UpdateAwardRequest $request, $id)
    {

        if (!$award = Award::relations()->findOrFail($id)) {
            return $this->notFoundResponse('failed to find award');
        }
        $award->update($request->validated());

        if ($request->hasFile('award_photo')) {
            $award->addMediaFromRequest('award_photo')->toMediaCollection('awards');
        }
        return $this->resourceResponse(new AwardResource($award), 'award updated successfully');

    }


    public function destroy($id)
    {
        if (!$award = Award::relations()->findOrFail($id)) {
            return $this->notFoundResponse('failed to find award');
        }
        $award->delete();
        return $this->noContentResponse();
    }
}
