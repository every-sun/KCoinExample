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

    public function edit($id){
        $item = Product::findOrFail($id);
        return Inertia::render('Admin/Product/Create', [
            'product' => $item
        ]   );
    }

    public function store(Request $request){ 
        $request->validate([
            'name' => ['required'],
            'description' => [],
            'price' => ['required']
        ]);

        Product::create($request->all());
    }

    public function update($id, Request $request){
        $request->validate([
            'name' => ['required'],
            'description' => [],
            'price' => ['required']
        ]);
        $item = Product::findOrFail($id);
        $item->update($request->all());
    }

    public function destroy($id){
        $item = Product::destroy($id);
        return redirect()->route('admin.product.index');
    }
}
