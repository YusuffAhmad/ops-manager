<?php

namespace App\Contracts;

use App\Models\Tariff;
use App\Http\Requests\API\Tariffs\StoreRequest;
use App\Http\Requests\API\Tariffs\UpdateRequest;

interface ITariffService
{
    public function create(StoreRequest $request): Tariff;
    
    public function update(Tariff $role, UpdateRequest $request): Tariff;

    public function delete(Tariff $user): void;
}
