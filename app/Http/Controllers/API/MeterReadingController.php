<?php

namespace App\Http\Controllers\API;

use App\Models\MeterReading;
use Illuminate\Http\Request;
use App\Services\MeterReadingService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseResponse;
use App\Http\Resources\MeterReadingResource;
use App\Repositories\MeterReadingRepository;
use App\Http\Requests\API\MeterReading\StoreRequest;
use App\Http\Requests\API\MeterReading\UpdateRequest;

class MeterReadingController extends Controller
{
    public function __construct(private MeterReadingRepository $_MeterReadingRepository, private MeterReadingService $_MeterReadingService)
    {
    }

    public function index()
    {
        $response = MeterReadingResource::collection($this->_MeterReadingRepository->getAll());
        return BaseResponse::sendResponse($response, "Meter Reading successfully retrieved");
    }

    public function store(StoreRequest $request)
    {
        $response = MeterReadingResource::make($this->_MeterReadingService->create($request));
        return BaseResponse::sendResponse($response, "Meter Reading Created successfully.");
    }

    public function update(UpdateRequest $request, MeterReading $MeterReading)
    {
        $response = MeterReadingResource::make($this->_MeterReadingService->update($MeterReading, $request));
        return BaseResponse::sendResponse($response, "Meter Reading Updated successfully.");
    }

    public function destroy(MeterReading $MeterReading)
    {
        $this->_MeterReadingService->delete($MeterReading);
        return BaseResponse::sendResponse("Meter Reading deleted successfully", "MeterReading deleted successfully");
    }
}
