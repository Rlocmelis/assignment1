<?php

namespace Tests\Unit;

use Tests\TestCase;
use Database\Factories\ProductFactory;
use App\Models\Product;


class VATTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_isZero()
    {
        $product = Product::factory()->create([
            'name' => 'Something',
            'quantity' => 0,
            'price' => 5,
        ]);
        $vats = $product->VAT($product);
        $this->assertEquals(0, $vats); //Will fail, if you want it to pass, then change the value in vats to -1
    }

    public function test_equals25()
    {
        $product = Product::factory()->create([
          'name' => 'Something',
          'quantity' => 5,
            'price' => 5,
        ]);
        $vats = $product->VAT($product);
        $this->assertEquals(25, $vats);
    }

    public function test_greatThanZero()
    {
        $product = Product::factory()->create();
        $vats = $product->VAT($product);
        $this->assertGreaterThan(0,$vats, 'Pass');
    }

    public function test_notNull(){
        $product = Product::factory()->create();
        $vats = $product->VAT($product);
        $this->assertNotNull($vats);
    }

}
