<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;
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

    public function test_zero()
    {
        $product = Product::factory()->make();
       // $vats = $product->VAT($product);
        $this->assertEquals(0,55);
    }

}
