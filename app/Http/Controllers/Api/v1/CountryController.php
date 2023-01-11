<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Http\Resources\CountryResource;
use App\Http\Resources\UserResource;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{

    public function listCountries(): JsonResponse
    {
        if(!$countries=Country::all()){
            return $this->notFoundResponse('countries resource not found');
        }
        return $this->resourceCollectionResponse(CountryResource::collection($countries),
            'all countries retrieve successfully', true, 200);

    }
    public function index(): Response
    {

        if (!$countries=QueryBuilder::for(Country::class)->allowedFilters(['name','code'])->latest()->paginate(15)){
            return $this->notFoundResponse('countries resource not found');
        }
        return $this->resourceCollectionResponse(CountryResource::collection($countries),
            'all countries retrieve successfully', true, 200);
    }


    public function store(StoreCountryRequest $request): JsonResponse
    {
        if (!Country::create($request->validated())) {
            return $this->badRequestResponse('an error occurred');
        }
        return $this->createdResponse('Country created successfully', true);
    }

    public function show($id): JsonResponse
    {
        if (!$country= Country::with(['users'])->findOrFail($id)){
            return $this->notFoundResponse('not found country');
        }
        return $this->resourceResponse(new CountryResource($country),'country successfully retrieved');
    }


    public function update(UpdateCountryRequest $request, $id): JsonResponse
    {
        if (!$country= Country::findOrFail($id)){
            return $this->notFoundResponse('not found country');
        }
        $country->update($request->validated());
        return $this->resourceResponse(new CountryResource($country),'country successfully updated');

    }


    public function destroy($id): JsonResponse
    {
        if (!$country= Country::findOrFail($id)){
            return $this->notFoundResponse('not found country');
        }
        $country->delete();
        return $this->noContentResponse();
    }
}
