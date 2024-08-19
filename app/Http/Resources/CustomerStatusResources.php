<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerStatusResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->uid,
            'attributes' => [
                'account_number' =>$this->account_number,
                'bill_is_distributed' =>$this->bill_is_distributed,
                'last_bill_distributed' =>$this->last_bill_distributed,
                'last_meter_read' =>$this->last_meter_read,
                'meter_is_read' => $this->meter_is_read,
                'last_meter_read' => $this->last_meter_read,
                'customer_is_enumerated' => $this->customer_is_enumerated,
            ],
           

        ];
    }
}
