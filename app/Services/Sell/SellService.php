<?php

namespace App\Services\Sell;

class SellService
{
    public function getCommission(int|float $value, bool $inCents = true): int|float
    {
        $value = $inCents ? $value : $value / 100;

        return (config('sell.seller.commission_percentage') * $value) / 100;
    }
}
