<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Billing;

class CurrentChargeMatchesBillAmount implements Rule
{
    protected $customerId;

    public function __construct($customerId)
    {
        $this->customerId = $customerId;
    }

    public function passes($attribute, $value)
    {
        $currentCharge = Billing::where('customer_id', $this->customerId)->value('current_charge');
        return $currentCharge == $value;
    }

    public function message()
    {
        return 'The current charge for this customer does not match the bill amount.';
    }
}
