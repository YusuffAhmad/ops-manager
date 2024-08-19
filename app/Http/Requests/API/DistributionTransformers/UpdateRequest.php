<?php

namespace App\Http\Requests\API\DistributionTransformers;

use App\Http\Requests\API\Request;

class UpdateRequest extends Request
{
    /** @return array<mixed> */
    public function rules(): array
    {
        return [
            'store_id' => ['sometimes', 'required', 'exists:stores,id'],
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'lng' => ['sometimes', 'required', 'numeric'],
            'lat' => ['sometimes', 'required', 'numeric'],
            'installation_date' => ['sometimes', 'required', 'date'],
            'capacity' => ['sometimes', 'required', 'integer'],
            'status' => ['sometimes', 'required', 'string', 'in:active,inactive'],
            'rating' => ['sometimes', 'required', 'integer'],
            'maker' => ['sometimes', 'required', 'string', 'max:255'],
            'feeder_pillar_type' => ['sometimes', 'required', 'string', 'max:255'],
        ];
    }
}
