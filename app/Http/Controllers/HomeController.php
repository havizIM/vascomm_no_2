<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $newestProduct = Product::whereNotNull('activated_at')->orderBy('created_at', 'desc')->limit(10)->get();
        $summaryProduct = Product::whereNotNull('activated_at')->inRandomOrder()->limit(10)->get();

        return Inertia::render('Home', [
            'newestProduct' => $newestProduct,
            'summaryProduct' => $summaryProduct
        ]);
    }
}
