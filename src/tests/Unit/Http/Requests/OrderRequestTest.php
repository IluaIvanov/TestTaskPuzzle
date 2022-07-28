<?php

namespace Tests\Unit\Http\Requests;

// use PHPUnit\Framework\TestCase;

use App\Models\Order;
use Tests\TestCase;

class OrderRequestTest extends TestCase
{
    /**
     * @test
     * @throws \Throwable
     */
    public function is_validation_error_create()
    {
        $rulesCheck = [
            'full_name' => [
                'required'=> null,
                'string' => 100
            ],
            'total_cost' => [
                'required' => null,
                'numeric' => 'sssss',
                'min' => 0
            ],
            'address' => [
                'required' => null,
                'string' => 100
            ],
        ];

        foreach ($rulesCheck as $key => $value) {
            $validatedField = $key;

            foreach ($value as $key => $value) {
                $brokenRule = $value;
                $order = Order::factory()->make([
                    $validatedField => $brokenRule
                ]);

                $response = $this->postJson('api/orders', $order->toArray());
                $response->assertStatus(400);
            }
        }
    }
}
