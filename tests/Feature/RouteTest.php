<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Database\Factories\UserFactory;
use App\Models\Product;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_productRoute()
    {
        $response = $this->get('/products');

        $response->assertStatus(302);
    }

    public function test_userForbidden()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('products.edit', $product));

        $response->assertForbidden();
    }

    public function test_adminAllowed()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin'); //Change role to user to get 403
        $product = Product::factory()->create();

        $response = $this->actingAs($admin)
            ->get(route('products.edit', $product));

        $response->assertStatus(200);
    }

    public function test_productCreate()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin'); //Change role to user to get 403
        $product = Product::factory()->create();

        $response = $this->getJson('api/audits');

        $response->assertStatus(200);
    }

}
