<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseResponse;
use App\Services\BillDistributionService;
use App\Http\Resources\BillDistributionResource;
use App\Http\Requests\API\BillDistributions\StoreRequest;

class BillDistributionController extends Controller
{
    public function __construct(private BillDistributionService $_billDistributionService)
    {
    }

    public function ditribute(StoreRequest $request)
    {
        $response = BillDistributionResource::make($this->_billDistributionService->distribute($request));
        return BaseResponse::sendResponse($response, "Bill Distributed successfully.");
    }
}
