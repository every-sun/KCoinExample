<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(20);
        return Inertia::render('Admin/User/Index', [
            'users' => $users,
        ]);
    }

    
    public function edit(){
        $user = User::findOrFail(1);
        return Inertia::render('User/Profile/Edit', [
            'user' => $user,
        ]);
    }

    
    public function show($id){
        $user = User::findOrFail($id);

        return Inertia::render('Admin/User/Show', [
            'user' => $user
        ]);
    }

    public function update($id, Request $request){
        $item = User::findOrFail($id);
        if ($request->has('role')) {
            $item->role = $request->input('role');
        }
        $item->save();
    }

}
