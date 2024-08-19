<?php

namespace App\Http\Controllers\API;

use App\Models\Tariff;
use Illuminate\Http\Request;
use App\Services\TariffService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseResponse;
use App\Http\Resources\TariffResource;
use App\Repositories\TariffRepository;
use App\Http\Requests\API\Tariffs\StoreRequest;
use App\Http\Requests\API\Tariffs\UpdateRequest;

class TariffController extends Controller
{
    public function __construct(private TariffRepository $_tariffRepository, private TariffService $_tariffService)
    {
    }

    public function index()
    {
        $response = TariffResource::collection($this->_tariffRepository->getAll());
        return BaseResponse::sendResponse($response, "Tariff successfully retrieved");
    }

    public function store(StoreRequest $request)
    {
        $response = TariffResource::make($this->_tariffService->create($request));
        return BaseResponse::sendResponse($response, "Tariff Created successfully.");
    }

    public function update(UpdateRequest $request, Tariff $tariff)
    {
        $response = TariffResource::make($this->_tariffService->update($tariff, $request));
        return BaseResponse::sendResponse($response, "Tariff Updated successfully.");
    }

    public function destroy(Tariff $tariff)
    {
        $this->_tariffService->delete($tariff);
        return BaseResponse::sendResponse("Tariff deleted successfully", "Tariff deleted successfully");
    }
}
