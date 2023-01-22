<?php

namespace Tests\Feature\Seller;


use App\Models\Seller;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SellerTest extends TestCase
{
    use WithFaker;

    public function testShouldCreateAnNewSeller()
    {
        $payload = [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
        ];

        $this->post(route('seller.post'), $payload);

        $this->assertDatabaseHas('seller', $payload);
    }
}
