<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function index()
    {
        // In a real application, you would fetch products from a database
        $products = [
            ['id' => 1, 'name' => 'Organic Apples', 'price' => 2.99],
            ['id' => 2, 'name' => 'Fresh Milk', 'price' => 3.50],
            ['id' => 3, 'name' => 'Free-range Eggs', 'price' => 4.99],
        ];

        return view('marketplace.index', compact('products'));
    }
}
