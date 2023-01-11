<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDivisionRequest;
use App\Http\Requests\UpdateDivisionRequest;
use App\Http\Resources\DivisionResource;
use App\Models\Division;
use Illuminate\Http\Response;


class DivisionController extends Controller
{
    //TODO:verifier si le composant donne accès
    public function index(): \Symfony\Component\HttpFoundation\Response
    {
        if (!$divisions = Division::with(['city','country','company','manager','users'])->latest()->get()){
            return $this->notFoundResponse('Divisions resource not found');
        }
        return $this->resourceCollectionResponse(DivisionResource::collection($divisions),
            'Divisions collection retrieved successfully', true, 200);
    }


    public function store(StoreDivisionRequest $request): \Symfony\Component\HttpFoundation\Response
    {
        if(!$loc= Division::create($validator=$request->validated())){
            return $this->validationFailedResponse($validator);
        }

        return $this->resourceResponse(new DivisionResource($loc),'Division created successfully', 200, []);
    }


    public function show($id): \Symfony\Component\HttpFoundation\Response
    {
        if (!$division=Division::with(['city','country','company','manager','users'])->findOrFail($id)) {
            return $this->notFoundResponse('Division not found');
        }
        return $this->resourceResponse(new DivisionResource($division),'Division retrieved successfully', 200, []);
    }


    public function update(UpdateDivisionRequest $request, $id): \Symfony\Component\HttpFoundation\Response
    {
        if(!$division=Division::with(['city','country','company','manager'])->findOrFail($id)){
            return $this->notFoundResponse('Division not found');
        }
        $division->update($request->validated());

        return $this->resourceResponse(new DivisionResource($division),'Division updated successfully', 200, []);
    }


    public function destroy($id): \Symfony\Component\HttpFoundation\Response
    {
        if(!$user=Division::findOrFail($id)){
            return $this->notFoundResponse('Division not found');
        }
        $user->delete();
        return $this->successResponse('Division deleted successfully');
    }
}
