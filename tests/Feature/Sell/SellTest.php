<?php

namespace Tests\Feature\Sell;

use App\Models\Seller;
use App\Services\Sell\SellService;
use Tests\TestCase;

class SellTest extends TestCase
{
    protected Seller $seller;
    protected SellService $sellService;
    protected int $baseSellValue;
    protected float $baseSellValueSellerCommission;

    public function setUpTraits(): void
    {
        $this->seller = Seller::factory()->createOne();
        $this->sellService = new SellService();
        $this->baseSellValue = 100;
        $this->baseSellValueSellerCommission = 8.5;
    }

    public function testShouldReturnCorrectValueToSellerCommission(): void
    {
        $commissionValue = $this->sellService->getCommission($this->baseSellValue);

        $this->assertSame($this->baseSellValueSellerCommission, $commissionValue);
    }

    public function testSuccessSellNeedsReturnExpectedResponse(): void
    {
        $response = $this->post(route('sell.post', ['seller' => $this->seller->getKey()]), [
            'value' => $this->baseSellValue,
        ]);

        $response->assertOk();
        $response->assertJson([
           'name' => $this->seller->name,
           'email' => $this->seller->email,
           'commission_value' => $this->sellService->getCommission($this->baseSellValue),
        ]);
    }
}
