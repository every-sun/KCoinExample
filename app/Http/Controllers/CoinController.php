<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    public function create(){
        return Inertia::render('Admin/Coin-Manage/Create');
    }
    public function store(Request $request){ // K-Coin 발행 / 사용
    }
}
