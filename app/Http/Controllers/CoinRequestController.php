<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\CoinRequest;

class CoinRequestController extends Controller
{
    public function userIndex() {
        $coin_requests = CoinRequest::where('user_id', '=', 1)->orderByDesc('created_at')->paginate(20);

        return Inertia::render('User/Coin-Request/Index', [
            'coin_requests'=> $coin_requests
        ]);
    }
    public function create() {
        return Inertia::render('User/Coin-Request/Create', [
        ]);
    }
    public function store(Request $request){
        CoinRequest::create($request->all());
    }
}
