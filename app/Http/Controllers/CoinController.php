<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\User;

class CoinController extends Controller
{
    public function create(){
        $users = User::paginate(10);
        return Inertia::render('Admin/Coin-Manage/Create', [
            'users' => $users
        ]);
    }
    public function store(Request $request){ // K-Coin 발행 / 사용
    }
}
