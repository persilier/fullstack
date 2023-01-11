<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{


    public function index(): Response
    {
        if (!$companies = Company::with(['divisions'])->paginate(2)){
            return $this->notFoundResponse('can not find companies or maybe empty');
        }
        return $this->resourceCollectionResponse(CompanyResource::collection($companies),
            'Company retrieve successfully', true, 200);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    //FIXME: put the code here to store the resource
    public function store(StoreCompanyRequest $request)
    {
        //
    }



    public function show($id): Response
    {
        if (!$company=Company::with('divisions')->findOrFail($id)) {
            return $this->notFoundResponse('can not find company or maybe empty');
        }
        return $this->resourceResponse(new CompanyResource($company), 'Company retrieved successfully', 200, []);
    }


    public function update(UpdateCompanyRequest $request, $id): Response
    {
        if(!$company=Company::findOrFail($id)){
            return $this->notFoundResponse('can not find company or maybe empty');
        }
        $company->updateOrCreate(['id'=>$company->id],$request->all());
        if($request->hasFile('company_logo')){
            $company->addMediaFromRequest('company_logo')->toMediaCollection('logo');
        }
        return $this->resourceResponse(new CompanyResource($company), 'Company updated successfully', 200, []);
    }


    public function destroy(Company $company)
    {
        //
    }
}
