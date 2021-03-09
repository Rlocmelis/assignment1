<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductAuditController extends Controller
{
    public function index()
    {
        $audits = Product::find(2)->audits;
        return view('products.audit', compact('audits'));
    }

    public function show($id)
    {
        $audits = Product::find($id)->audits;
        return view('products.audit', compact('audits'));
    }

    public function test()
    {

    }

    public function jsonResponse()
    {
        return response()->json(['name' => 'Abigail', 'state' => 'CA']);
    }

}
