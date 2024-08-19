<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseResponse;
use App\Models\DistributionTransformer;
use App\Services\DistributionTransformerService;
use App\Http\Resources\DistributionTransformerResource;
use App\Repositories\DistributionTransformerRepository;
use App\Http\Requests\API\DistributionTransformers\StoreRequest;
use App\Http\Requests\API\DistributionTransformers\UpdateRequest;

class DistributionTransformerController extends Controller
{
    public function __construct(private DistributionTransformerRepository $_distributionTransformerRepository, private DistributionTransformerService $_distributionTransformerService)
    {
    }
    
    public function index()
    {
        $response = DistributionTransformerResource::collection($this->_distributionTransformerRepository->getAll());
        return BaseResponse::sendResponse($response, "Distribution Transformers successfully retrieved");
    }
    
    public function store(StoreRequest $request)
    {
        $response = DistributionTransformerResource::make($this->_distributionTransformerService->create($request));
        return BaseResponse::sendResponse($response, "Distribution Transformer Created successfully.");
    }

    public function update(UpdateRequest $request, DistributionTransformer $distributionTransformer)
    {
        $response = DistributionTransformerResource::make($this->_distributionTransformerService->update($distributionTransformer, $request));
        return BaseResponse::sendResponse($response, "Distribution Transformer Updated successfully.");
    }

    public function destroy(DistributionTransformer $distributionTransformer)
    {
        $this->_distributionTransformerService->delete($distributionTransformer);
        return BaseResponse::sendResponse("Distribution Transformer deleted successfully", "Distribution Transformer deleted successfully");
    }
}
