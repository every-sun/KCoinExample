<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\CoinUseRequest;
use App\Models\Product;
use App\Models\Coin;

class CoinUseRequestController extends Controller
{
    public function userManageIndex(){ 
        $coin_use_requests = CoinUseRequest::with('product')->where('user_id', '=', 1)->orderByDesc('created_at')->paginate(20);

        return Inertia::render('User/Coin-Manage/Index', [
            'coin_use_requests'=>$coin_use_requests
        ]);
    }

    public function adminManageIndex(){ 
        $coin_use_requests = CoinUseRequest::with('product')->with('user')->orderByDesc('created_at')->paginate(20);
        return Inertia::render('Admin/Coin-Manage/Index', [
            'coin_use_requests'=>$coin_use_requests
        ]);
    }

    public function userUseIndex(Request $request){
        $query = Product::orderByDesc('created_at');
        if($request->filled('category')){
            $query->where('category', $request->category);
        }   
        $products = $query->paginate(20);
        return Inertia::render('User/Coin-Use/Index', [
            'products'=>$products
        ]);
    }

    // 코인 사용
    public function store(Request $request){ 
        $item = CoinUseRequest::create($request->all());
        
        $type = "M";
        $amount = $request->input('used_coins');
        $description = $request->input('description');
        Coin::create([
            'type' => $type,       
            'amount' => $amount,       
            'description' => $description, 
            'user_id' => 1,    
        ]);

    }

    public function update($id, Request $request){ 
        $item = CoinUseRequest::findOrFail($id);  
        if ($request->filled('status')) {
            $item->status = $request->input('status');
        }

        if ($request->filled('cancel_request_date')) {
            $item->cancel_request_date = $request->input('cancel_request_date');
        }

        if ($request->filled('cancel_complete_date')) {
            $item->cancel_complete_date = $request->input('cancel_complete_date');
        }

        if ($request->filled('completed_date')) {
            $item->completed_date = $request->input('completed_date');
        }
        $item->save();
    }
}
