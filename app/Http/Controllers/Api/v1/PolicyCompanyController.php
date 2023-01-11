<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePolicyCompanyRequest;
use App\Http\Requests\UpdatePolicyCompanyRequest;
use App\Http\Resources\PoliciyCompanyResource;
use App\Models\PolicyCompany;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;

class PolicyCompanyController extends Controller
{

    public function index(): JsonResponse
    {
       if(!$policy =QueryBuilder::for(PolicyCompany::class)
           ->latest()
           ->allowedFilters(['title'])
           ->paginate(15)){
           return $this->notFoundResponse('no policies resource available');
       }
        return $this->resourceResponse(PoliciyCompanyResource::collection($policy),
            'resources policies retrieved successfully');
    }


    public function store(StorePolicyCompanyRequest $request): JsonResponse
    {

        $policyCompany = PolicyCompany::create([
            'title' => $request->title,
            'description' => $request->description,
            'company_id' => $request->company_id,
        ]);
       if(!$policyCompany){
           return $this->badRequestResponse('an error occurred');
       }

        return $this->successResponse('policy company saved successfully');
    }


    public function show($id): JsonResponse
    {
        if(!$policyComp=PolicyCompany::findOrFail($id)){
            return $this->notFoundResponse('policy with id ' . $id . ' not found');
        }

        return $this->resourceResponse(new PoliciyCompanyResource($policyComp),'Policy retrieved successfully');
    }

    public function update(
        UpdatePolicyCompanyRequest $request,
        $id
    ): JsonResponse
    {
        if(!$policyCompany=PolicyCompany::findOrFail($id)){
            return $this->notFoundResponse('policy with id ' . $id . ' not found');
        }
        $policyCompany->update($request->all());

        return $this->resourceResponse(new PoliciyCompanyResource($policyCompany),'Policy updated successfully');
    }


    public function destroy($id): JsonResponse
    {
        if(!$policyCompany=PolicyCompany::findOrFail($id)){
            return $this->notFoundResponse('policy with id ' . $id . ' not found');
        }
        $policyCompany->delete();
        return $this->noContentResponse();
    }
}
