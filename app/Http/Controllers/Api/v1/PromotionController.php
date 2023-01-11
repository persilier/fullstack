<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Http\Resources\PromotionResource;
use App\Models\Promotion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PromotionController extends Controller
{

    public function index(Request $request): JsonResponse
    {
        if (! $promotions =QueryBuilder::for(Promotion::class)
            ->with(['employee','company'])
            ->allowedFilters(['promotion_title','employee.first_name',
                AllowedFilter::scope('starts_before'),
                AllowedFilter::scope('ends_after')]
            )
            ->latest()
            ->paginate(15)) {
            return $this->notFoundResponse('promotions resource not found');
        }

        return $this->resourceCollectionResponse(PromotionResource::collection($promotions),'Promotion resource retrieved');

    }


    public function store(StorePromotionRequest $request): JsonResponse
    {
       if(!$promotions=Promotion::create($request->validated())){
           return $this->badRequestResponse('an error occurred while creating promotion');
       }
        return $this->resourceResponse(new PromotionResource($promotions),'promotions created successfully');
    }


    public function show($id): JsonResponse
    {
        if(!$promo=Promotion::with(['employee','company','employee.department','employee.designation','employee.supervisor'])->findOrFail($id)){
            return $this->notFoundResponse('promotion with that ID not found');
        }

        return $this->resourceResponse(new PromotionResource($promo),'promotion retrieved successfully') ;
    }


    public function update(
        UpdatePromotionRequest $request,
        $id
    )
    {
        if(!$promo=Promotion::with(['employee','company','employee.department','employee.designation','employee.supervisor'])->findOrFail($id)){
            return $this->notFoundResponse('promotion with that ID not found');
        }
        $promo->update($request->validated());

        return $this->resourceResponse(new PromotionResource($promo),'promotion updated successfully') ;
    }


    public function destroy($id): JsonResponse
    {
        if(!$promo=Promotion::with(['employee','company','employee.department','employee.designation','employee.supervisor'])->findOrFail($id)){
            return $this->notFoundResponse('promotion with that ID not found');
        }
        $promo->delete();
        return $this->noContentResponse();
    }
}
