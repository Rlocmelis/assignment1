<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use OwenIt\Auditing\Contracts\Auditable;

class Product extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    protected $auditInclude = [
        'name',
        'price',
        'quantity',
    ];

    public function VAT(Product $product)
    {
        $vat = config('vat.vats.LV');

        return ($product->quantity * $product->price * (1 + $vat));
    }

}
