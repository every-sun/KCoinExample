<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Product;

class CoinController extends Controller
{
    public function userManageIndex(){ 
        return Inertia::render('User/Coin-Manage/Index');
    }

    public function adminManageIndex(){ 
        return Inertia::render('Admin/Coin-Manage/Index');
    }

    public function userUseIndex(){
        $products = Product::orderByDesc('created_at')->paginate(20);
        return Inertia::render('User/Coin-Use/Index', [
            'products'=>$products
        ]);
    }

    public function store(Request $request){ // K-Coin 발행
    }
}
