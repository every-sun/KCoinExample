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
            'users' => $users
        ]);
    }
}
