<?php

namespace App\Http\Requests\API\DistributionTransformers;

use App\Http\Requests\API\Request;

class StoreRequest extends Request
{
    /** @return array<mixed> */
    public function rules(): array
    {
        return [
            'store_id' => ['required', 'exists:stores,id'],
            'name' => ['required', 'string', 'max:255'],
            'lng' => ['required', 'numeric'],
            'lat' => ['required', 'numeric'],
            'installation_date' => ['required', 'date'],
            'capacity' => ['required', 'integer'],
            'status' => ['required', 'string', 'in:active,inactive'],
            'rating' => ['required', 'integer'],
            'maker' => ['required', 'string', 'max:255'],
            'feeder_pillar_type' => ['required', 'string', 'max:255'],
        ];
    }
}
