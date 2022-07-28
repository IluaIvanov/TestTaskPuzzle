<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrdersTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function can_get_all_orders()
    {
        $order = Order::factory()->create()->toArray();

        $response = $this->getJson('/api/orders');

        $response->assertOk();
        $response->assertJson([
            'status' => 'SUCCESS',
            'orders' => [
                [
                    'id' => $order['id'],
                    'full_name' => $order['full_name'],
                    'total_cost' => $order['total_cost'],
                    'address' => $order['address'],
                    'created_at' => $order['created_at']
                ]
            ]
        ]);
    }

    /** @test */
    public function can_store_a_order()
    {
        $newOrder = Order::factory()->make()->toArray();

        $response = $this->postJson('/api/orders', $newOrder);
        $response->assertCreated();
        $response->assertJson([
            'status' => 'SUCCESS',
            'order' => [
                'full_name' => $newOrder['full_name'],
                'total_cost' => $newOrder['total_cost'],
                'address' => $newOrder['address'],
            ]
        ]);

        $this->assertDatabaseHas('orders', $newOrder);
    }

    /** @test */
	public function can_update_a_order()
	{
		$existingOrder = Order::factory()->create();
		$newOrder = Order::factory()->make();

		$response = $this->putJson('/api/orders/'.$existingOrder->id, $newOrder->toArray());
		$response->assertJson([
			'status' => 'SUCCESS',
            'order' => [
				'id' => $existingOrder->id,
				'full_name' => $newOrder->full_name,
				'total_cost' => $newOrder->total_cost,
				'address' => $newOrder->address
			]
		]);

		$this->assertDatabaseHas('orders', $newOrder->toArray());
	}

    /** @test */
	public function can_show_a_order()
	{
		$existingOrder = Order::factory()->create();

		$response = $this->get('/api/orders/'.$existingOrder->id);
		$response->assertJson([
			'status' => 'SUCCESS',
            'order' => [
				'id' => $existingOrder->id,
				'full_name' => $existingOrder->full_name,
				'total_cost' => $existingOrder->total_cost,
				'address' => $existingOrder->address
			]
		]);
	}
}
