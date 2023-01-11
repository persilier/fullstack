<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;


class CityController extends Controller
{

    /**
     * Summary of listCities
     * @return JsonResponse
     */
    public function listCities(): JsonResponse
    {
       if (!$cities=City::all()) {
           return $this->notFoundResponse('cities collection is not available');
       }
        return $this->resourceCollectionResponse(CityResource::collection($cities),'city retrieved successfully', true, 200);

    }
    public function index(Request $request): Response
    {
        if ( !$cities=QueryBuilder::for(City::class)->allowedFilters(['name'])->paginate(10)){
            return $this->notFoundResponse('cities collection is not available');
        }
        return $this->resourceCollectionResponse(CityResource::collection($cities),'city retrieved successfully', true, 200);
    }


    public function store(StoreCityRequest $request): Response
    {
        $city = City::create(['name' => $request->name,]);

        return $this->resourceResponse(new CityResource($city),'city created successfully');
    }

    /**
     * Summary of show
     * @param mixed $id
     * @return Response
     */
    public function show($id): Response
    {
        if(!$city = City::with(['users'])->findOrFail($id)){
            return $this->notFoundResponse('city not found');
        }
        return $this->resourceResponse(new CityResource($city),'city retrieved successfully');
    }


    public function update(UpdateCityRequest $request, $id): Response
    {
        if(!$city = City::findOrFail($id)){
            return $this->notFoundResponse('city not found');
        }
        $city->update(['name' => $request->input('name')]);
        return $this->resourceResponse(new CityResource($city),'city updated successfully');

    }


    public function destroy($id): Response
    {
        if(!$city = City::findOrFail($id)){
            return $this->notFoundResponse('city not found');
        }
        $city->delete();
        return $this->noContentResponse();
    }


}
