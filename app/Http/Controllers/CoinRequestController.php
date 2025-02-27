<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\CoinRequest;
use App\Models\Product;

class CoinRequestController extends Controller
{
    public function userManageIndex(){ 
        $coin_requests = CoinRequest::with('product')->where('user_id', '=', 1)->orderByDesc('created_at')->paginate(20);

        return Inertia::render('User/Coin-Manage/Index', [
            'coin_requests'=>$coin_requests
        ]);
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

    // 코인 사용
    public function store(Request $request){ 
        $item = CoinRequest::create($request->all());
    }

    public function update($id, Request $request){ 
        $item = CoinRequest::findOrFail($id);  
        $item->status = $request->input('status');
        $item->cancel_request_date = $request->input('cancel_request_date');
        $item->cancel_complete_date = $request->input('cancel_complete_date');
        $item->completed_date = $request->input('completed_date');
        $item->save();
    }
}
