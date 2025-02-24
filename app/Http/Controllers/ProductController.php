<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function adminIndex(){  // 상품 관리 (관리자)
        $products = Product::orderByDesc('created_at')->paginate(20);
        return Inertia::render('Admin/Product/Index', [
            'products' => $products
        ]);
    }

    public function store(Request $request){ // 상품 생성 (관리자)
        $request->validate([
            'name' => ['required'],
            'description' => [],
            'price' => ['required']
        ]);

        Product::create($request->all());
        return;
    }
}
