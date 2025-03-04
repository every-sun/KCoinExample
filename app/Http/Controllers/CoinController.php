<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Coin;

class CoinController extends Controller
{
    public function index () {
        $coins = Coin::where('user_id', '=', 1)->orderByDesc('created_at')->paginate(10);
        return Inertia::render('User/Coin/Index', [
            'coins'=>$coins
        ]);
    }

    public function create(){
        $users = User::paginate(10);
        return Inertia::render('Admin/Coin-Manage/Create', [
            'users' => $users
        ]);
    }

    public function store(Request $request){ // K-Coin 발행 / 사용
        $type = $request->input('type');
        $amount = $request->input('amount');
        $description = $request->input('description');

        $userIds = $request->input('user_ids');

        foreach($userIds as $userId){
            Coin::create([
                'type' => $type,       
                'amount' => $amount,       
                'description' => $description, 
                'user_id' => $userId,    
            ]);
        }
    }
}
