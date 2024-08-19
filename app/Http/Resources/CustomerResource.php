<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
                'first_name' =>$this->first_name,
                'middle_name' =>$this->middle_name,
                'last_name' =>$this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state,
                'tariff_code' => $this->tariff_code,
                'meter_no' => $this->meter_no,
                'customer_type' => $this->customer_type,
                'account_type' => $this->account_type,
                'lga' => $this->lga,
                'lng' => $this->lng,
                'lat' => $this->lat,

            ],
            // 'relationships' => [
            //     'service_center' => $this->distributionTransformer->store->name,
            //     'bill_is_distributed' => $this->sender->account_number,
            //     // 'customer_status' => new CustomerStatusResources($this->status),
                
            // ]

        ];
    }
}
