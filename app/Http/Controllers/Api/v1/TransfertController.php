<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransfertRequest;
use App\Http\Requests\UpdateTransfertRequest;
use App\Http\Resources\TransfertResource;
use App\Models\Transfert;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

class TransfertController extends Controller
{

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if(!$transfers=QueryBuilder::for(Transfert::class)
            ->allowedFilters(['employee.first_name'])
            ->with(['employee','company','from_department','to_department'])
            ->latest()->paginate(15)){
                return $this->notFoundResponse('resource not found');
        }
        return $this->resourceCollectionResponse(TransfertResource::collection($transfers),
            'all transfers received successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTransfertRequest $request
     * @return JsonResponse
     */
    public function store(StoreTransfertRequest $request): JsonResponse
    {
        if(!$transfer= Transfert::create($request->validated())){
            return $this->badRequestResponse('an error occurred');
        }
        return $this->createdResponse('Transfer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if(!$transfer= Transfert::with(['employee','company','from_department','to_department','employee.roles'])->findOrFail($id)){
            return $this->notFoundResponse('not found');
        }
        return $this->resourceResponse(new TransfertResource($transfer),'Transfer retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTransfertRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateTransfertRequest $request, $id)
    {
        if(!$transfer= Transfert::with(['employee','company','from_department','to_department'])->findOrFail($id)){
            return $this->notFoundResponse('not found');
        }
        $transfer->update($request->validated());
        return $this->resourceResponse(new TransfertResource($transfer),'Transfer update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if(!$transfer= Transfert::with(['employee','company','from_department','to_department','employee.roles'])->findOrFail($id)){
            return $this->notFoundResponse('not found');
        }
        $transfer->delete();
        return $this->noContentResponse();
    }
}
